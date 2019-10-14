<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 09/10/2019
 * Time: 09:20
 */

class Users extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        redirect_if_user_cannot('admin', 'dashboard');
    }

    public function index(){
        $this->data['pageTitle']='Liste des utilisateurs';

        $this->data['users'] = $this->user_model->getUsers(false, false, 'desc');

        $this->data['headerCss'][] = $this->data['assetsUrl'] . 'lib/sweetalert/sweetalert.css';
        $this->data['footerJs'][] = $this->data['assetsUrl'] . 'lib/sweetalert/sweetalert.min.js';
        //var_dump($this->data['users']);exit;
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net/js/jquery.dataTables.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-dt/js/dataTables.dataTables.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive/js/dataTables.responsive.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/datatables.net-dt/css/jquery.dataTables.min.css';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css';
        $this->render('users/index');
    }

    public function add(){
        $this->data['pageTitle']='Ajouter un utilisateur';
        $this->data['roleMembersID'] = $memberRoleID = $this->user_model->getGroupByName('members')->id;
        getUsersAddOrEditValidation(false, '', '', $memberRoleID);

        $this->data['roles']=$this->user_model->getRoleForSelect2();

        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/dropify/dist/js/dropify.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/dropify/dist/css/dropify.min.css';

        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/select2/js/select2.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/select2/css/select2.min.css';
        $this->render('users/add');
    }

    public function edit($username){
        $userID = (int)$this->user_model->getUserIDByUsername($username);
        redirect_if_id_is_not_valid($userID, 'users', 'users');
        $this->data['pageTitle']='Modifier un utilisateur';
        $this->data['roleMembersID'] = $memberRoleID = $this->user_model->getGroupByName('members')->id;
        getUsersAddOrEditValidation(true, $userID, $username, $memberRoleID);

        $this->data['userdata'] = $this->user_model->get_data_by_id($userID, true);
        $this->data['roles']=$this->user_model->getRoleForSelect2();

        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/dropify/dist/js/dropify.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/dropify/dist/css/dropify.min.css';

        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/select2/js/select2.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/select2/css/select2.min.css';
        $this->render('users/edit');
    }

    public function activate($username)
    {
        $userID = (int)$this->user_model->getUserIDByUsername($username);
        redirect_if_id_is_not_valid($userID, 'users', 'users');
        if ($this->user_model->activateUser($userID, true)) {
            $user =  $this->ion_auth->user($userID)->row();
            $adminName = maybe_null_or_empty($this->data['user'], 'first_name'). ' '.maybe_null_or_empty($this->data['user'], 'last_name');
            sendNotificationMail("L'administrateur <strong>$adminName</strong> vient de reactiver le compte de <strong>$user->first_name $user->last_name</strong>");
            get_success_message('Utilisateur activé avec succès');
        } else {
            get_warning_message('Action non authorisée');
        }
        get_success_message('Utilisateur activé avec succès');
        redirect('users');
    }

    public function resend_activation($username)
    {
        $userID = (int)$this->user_model->getUserIDByUsername($username);
        redirect_if_id_is_not_valid($userID, 'users', 'users');
        $data = (object)$this->user_model->get_data_by_id($userID);
        if($data->active==0){
            $siteName = $this->data['options']['siteName'];
            sendActivationMail($data, [], $siteName);
            get_success_message("Le mail d'activation a été renvoyé à $data->email", 10000);
        }elseif($data->active==1){
            get_info_message("Renvoie du mail d'activation impossible <br> L'utilisateur est déja actif");
        }else{
            get_info_message("Renvoie du mail d'activation impossible <br> L'utilisateur est déjà actif mais banni");
        }

        redirect('users');
    }

    public function ban($username)
    {
        $userID = (int)$this->user_model->getUserIDByUsername($username);
        redirect_if_id_is_not_valid($userID, 'users', 'users');
        //if user to be banned is current user
        if ($userID == maybe_null_or_empty($this->data['user'], 'id')) {
            get_warning_message('Action non authorisée');
        } else {
            if ($this->user_model->banUser($userID, true)) {
                $user =  $this->ion_auth->user($userID)->row();
                $adminName = maybe_null_or_empty($this->data['user'], 'first_name'). ' '.maybe_null_or_empty($this->data['user'], 'last_name');
                sendNotificationMail("L'administrateur <strong>$adminName</strong> vient de bannir le compte de <strong>$user->first_name $user->last_name</strong>");
                get_success_message('Utilisateur banni avec succès');
            } else {
                get_warning_message('Action non authorisée');
            }
        }
        redirect('users');
    }

    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }
}