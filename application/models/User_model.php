<?php
/**
 * Created by PhpStorm.
 * User: MICHAEL
 * Date: 28/10/2017
 * Time: 11:42
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private function get_metas_group()
    {
        return array(
            'user_photo',
            'added_by',//user who created user
            'updated_by'//user who created user
        );
    }

    public function checkpoint_do_role_exist($roles){
        $allRoles = $this->ion_auth->groups()->result();
        $rolesIDs=[];
        if(!empty($allRoles)){
            foreach ($allRoles as $key=> $role){
                $rolesIDs[]=$role->id;
            }
            if(!empty($roles)){
                foreach ($roles as $role){
                    if(!in_array($role, $rolesIDs)){
                        $this->form_validation->set_message('checking_roles', "Veuillez sélectionner les rôles d'utilisateur disponibles");
                        return false;
                    }
                }
            }
        }
        return true;

    }

    public function do_email_exist($email){
        $exist = (bool) $this->db->query("SELECT COUNT(id) as num from users where email='$email'")->row()->num;
        if(!$exist){
            $this->form_validation->set_message('email_check', "Aucun compte avec cette adresse email n'existe sur la plateforme");
            return false;
        }
        return true;
    }

    public function old_password_check($password)
    {
        if ($this->ion_auth->hash_password_db($this->data['user']->id, $password)) {
            return true;
        } else {
            $this->form_validation->set_message('password_check', 'Mot de passe actuel incorrect');
            return false;
        }
    }

    public function getIDByUsername($username){
        $id = $this->db->query("SELECT id from users where username = '$username'")->row();
        return maybe_null_or_empty($id, 'id');
    }

    public function getIDByEmail($email){
        $id = $this->db->query("SELECT id from users where email = '$email'")->row();
        return maybe_null_or_empty($id, 'id', true);
    }

    public function getActiveByEmail($email){
        $return = $this->db->query("SELECT active from users where email = '$email'")->row();
        return maybe_null_or_empty($return, 'active');
    }



    public function getList($offSet=1, $search='', $exceptAdmins = true, $exceptCurrentUser = true, $offset = 1, $onlyActiveUsers = false)
    {
        $limit=$this->config->item('tableLimit');
        $offSet=($offSet-1)*$limit;
        $additionalCond = "";
        $conditionsStarted = false;
        if(!empty($search) && is_string($search)){
            $additionalCond = ($conditionsStarted ? ' and ' : ' where '). "(users.first_name LIKE '%$search%' OR users.last_name LIKE '%$search%' OR users.email LIKE '%$search%')";
            $conditionsStarted = true;
        }
        if ($exceptAdmins) {
            $additionalCond = $additionalCond. ($conditionsStarted ? ' and ' : ' where ') . "users.id NOT IN (SELECT user_id from users_groups where group_id in 
            (select id from groups where name='admin'))";
            $conditionsStarted = true;
        }
        if ($exceptCurrentUser) {
            $userID = get_current_user_id();
            $additionalCond = $additionalCond . ($conditionsStarted ? ' and ' : ' where ') . "users.id <> $userID";
            $conditionsStarted = true;
        }
        if ($onlyActiveUsers) {
            $additionalCond = $additionalCond . ($conditionsStarted ? ' and ' : ' where ') . "active=1";
            $conditionsStarted = true;
        }

        $users = $this->db->query("SELECT users.* from users$additionalCond order by users.id desc LIMIT $offSet, $limit")->result_array();
        //var_dump($this->db->last_query());exit;
        if (!empty($users)) {
            foreach ($users as $key => $user) {
                $users[$key] = $this->getUserMeta($user);
                $statusArray = $this->ion_auth->get_users_groups($user['id'])->result();
                $temp = [];
                if (!empty($statusArray)) {
                    foreach ($statusArray as $status) {
                        $temp[] = lang($status->name);
                    }
                }
                $users[$key]['roles'] = implode(', ', $temp);
            }

        }
        return $users;
    }

    public function getTotalNumber($onlyActiveOnes=true){
        $sql="SELECT COUNT(id) as num from users";
        $sql = $onlyActiveOnes ? $sql." where active=1" : $sql;
        return $this->db->query($sql)->row()->num;
    }

    public function getUsers($exceptCurrentUser = true, $onlyActiveUsers = false, $order = 'asc')
    {
        $additionalCond = "";
        $conditionsStarted = false;
        if ($exceptCurrentUser) {
            $userID = get_current_user_id();
            $additionalCond = $additionalCond . ($conditionsStarted ? ' and ' : ' where ') . "users.id <> $userID";
            $conditionsStarted = true;
        }
        if ($onlyActiveUsers) {
            $additionalCond = $additionalCond . ($conditionsStarted ? ' and ' : ' where ') . "active <> 0";
            $conditionsStarted = true;
        }

        $users = $this->db->query("SELECT users.* from users$additionalCond order by users.id $order")->result_array();
        //var_dump($this->db->last_query());exit;
        if (!empty($users)) {
            foreach ($users as $key => $user) {
                $users[$key] = $this->getUserMeta($user);
                $groups = $this->ion_auth->get_users_groups($user['id'])->result();
                if($users[$key]['added_by'] && is_numeric($users[$key]['added_by'])){
                    $addedBy = $this->get_data_by_id($users[$key]['added_by']);
                    if(!empty($addedBy)){
                        $users[$key]['added_by']= (object)$addedBy;
                    }else{
                        $users[$key]['added_by']=null;
                    }

                }
                if(!empty($groups)){
                    $tempGroup=[];
                    foreach ($groups as $group){
                        $tempGroup[]=$group->description;
                    }
                    $users[$key]['roles'] = implode(', ',$tempGroup);
                }
            }
        }
        return $users;
    }

    public function getRoleForSelect2()
    {
        $roles = $this->ion_auth->groups()->result();
        //var_dump($roles);exit;
        //$memberId = $this->getGroupByName('members')->id;
//        $temp = ['' => ''];
        if (!empty($roles)) {
            foreach ($roles as $role) {
                /*if ($role->id == $memberId)
                    continue;*/
                $temp[$role->id] = $role->description;
            }
        }
        return $temp;
    }

    public function getUserRoleName($userId)
    {
        $roles = $this->ion_auth->get_users_groups($userId)->result();
        $memberId = $this->getGroupByName('members')->id;
        $temp = [];
        if (!empty($roles)) {
            foreach ($roles as $role) {
                if ($role->id == $memberId)
                    continue;
                $temp[] = $role->description;
            }
        }
        return implode(', ', $temp);

    }


    public function getUserRole($userId, $retreiveValue = 'id', $withoutGroupName = '')
    {
        $user_groups = $this->ion_auth->get_users_groups($userId)->result();
        $temp = [];
        if (!empty($user_groups)) {
            foreach ($user_groups as $user_group) {
                if ($withoutGroupName != '') {
                    if ($user_group->name == $withoutGroupName) {
                        continue;
                    }
                }
                $temp[] = $user_group->$retreiveValue;
            }
        }
        return $temp;
    }

    public function getUserIDByUsername($username){
        $this->db->select('id');
        $user = $this->db->get_where('users', ['username'=>$username])->row();
        return maybe_null_or_empty($user, 'id');
    }

    public function getUserFieldByID($userID, $field){
        $this->db->select($field);
        $user = $this->db->get_where('users', ['id'=>$userID])->row();
        return maybe_null_or_empty($user, $field);
    }


    public function update($user_id, $data, $groupArray=[])
    {
        $metas = $this->get_metas_group();
        $meta_datas = [];
        if (!empty($metas)) {
            foreach ($metas as $meta) {
                if (isset($data[$meta])) {
                    $meta_datas[$meta] = $data[$meta];
                    unset($data[$meta]);
                }
            }
        }
        if(!empty($groupArray)){
            $this->ion_auth->remove_from_group(NULL, $user_id);
            $this->ion_auth->add_to_group($groupArray, $user_id);
        }
        $this->ion_auth->update($user_id, $data);
        if (!empty($meta_datas)) {
            foreach ($meta_datas as $key => $meta_data) {
                $this->update_meta($user_id, $key, $meta_data);
            }
        }
    }

    public function insert(array $data, array $group)
    {
        $metas = $this->get_metas_group();
        $meta_datas = [];
        if (!empty($metas)) {
            foreach ($metas as $meta) {
                if (isset($data[$meta])) {
                    $meta_datas[$meta] = $data[$meta];
                    unset($data[$meta]);
                }
            }
        }
        $username = $data['last_name'].$data['first_name'] . uniqid();
        $username = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/', '', $username));
        $username = substr($username, 0, 100);
        //temporary password
        $password = uniqid();
        $email = $data['email'];
        unset($data['email']);
        $userData = $this->ion_auth->register($username, $password, $email, $data, $group);
        if ($userData && !empty($userData)) {
            if (!empty($meta_datas)) {
                foreach ($meta_datas as $key => $meta_data) {
                    $this->update_meta((int)$userData['id'], $key, $meta_data);
                }
            }
            return $userData;
        }
        return false;

    }


    public function updateRole($roles, $userId)
    {
        $memberGroupId = $this->getGroupByName('members')->id;
        $this->ion_auth->remove_from_group(null, $userId);
        if (!in_array($memberGroupId, $roles)) {
            $roles[] = $memberGroupId;
        }
        $this->ion_auth->add_to_group($roles, $userId);
    }

    public function getGroupByName($groupName)
    {
        return $this->db->get_where('groups', ['name' => $groupName])->row();
    }

    public function get_data_by_id($user_id, $withRoles = false)
    {
        $user = $this->ion_auth->user($user_id)->row_array();
        if(!empty($user)){
            $user = $this->getUserMeta($user);
            if ($withRoles) {
                $user['roles'] = $this->getUserRole($user_id, 'id');
            }
        }
        return $user;
    }

    public function activateUser($userID, $mustBeBanned=false)
    {
        if($mustBeBanned){
            $this->db->select('active');
            $active = $this->db->get_where('users', ['id'=>$userID])->row();
            $active = maybe_null_or_empty($active, 'active');
            if($active!=2){
                return false;
            }
        }
        return $this->ion_auth->update($userID, ['active' => 1]);
    }

    public function deActivateUser($userID)
    {
        return $this->ion_auth->update($userID, ['active' => 0]);
    }
    public function banUser($userID, $mustBeActive=false)
    {
        if($mustBeActive){
            $this->db->select('active');
            $active = $this->db->get_where('users', ['id'=>$userID])->row();
            $active = maybe_null_or_empty($active, 'active');
            if($active!=1){
                return false;
            }
        }
        return $this->ion_auth->update($userID, ['active' => 2]);
    }



    public function getUserMeta(array $userArrayData)
    {
        if (!empty($userArrayData)) {
            $metas = $this->get_metas_group();
            if (!empty($metas)) {
                foreach ($metas as $meta) {
                    $userArrayData[$meta] = $this->get_meta($userArrayData['id'], $meta);
                }
            }
        }
        return $userArrayData;
    }

    public function getMailsByRole($groupName)
    {
        if (is_array($groupName)) {
            foreach ($groupName as $key => $name) {
                $groupName[$key] = "'$name'";
            }
            $groupName = implode(', ', $groupName);
        } else {
            $groupName = "'$groupName'";
        }
        $emails = $this->db->query("SELECT DISTINCT email from users where id IN (SELECT user_id from users_groups where group_id IN (SELECT id from groups where name IN ($groupName)))")->result_array();
        $temp = [];
        if (!empty($emails)) {
            foreach ($emails as $email) {
                $temp[] = $email['email'];
            }
        }
        return $temp;
    }


    public function get_meta($user_id, $key)
    {
        return get_meta($user_id, $key, 'user_meta', 'user_id');
    }

    public function update_meta($user_id, $key, $value)
    {
        update_meta($user_id, $key, $value, 'user_meta', 'user_id');
    }


}