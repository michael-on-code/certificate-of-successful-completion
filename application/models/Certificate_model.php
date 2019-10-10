<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 08/10/2019
 * Time: 09:26
 */
class Certificate_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private function get_metas_group()
    {
        return array(
            'customer_adress',
            'role',
            'certificateFile',
            'minuteFile',
            'contractFile',
            'detailed_tasks',
            'project_description',
            'updated_by',
        );
    }

    public function getAll($onlyActiveOnes = true){
        $sql = "SELECT abe.*, activity_area.name as activity_area_name, affiliate_companies.name as affiliate_company_name FROM abe 
join activity_area on activity_area.id = abe.activity_area_id join affiliate_companies on affiliate_companies.id = abe.affiliate_company_id";
        if($onlyActiveOnes){
            $sql = $sql. " where abe.active = 1";
        }
        $certificates = $this->db->query($sql)->result_array();
        if(!empty($certificates)){
            foreach ($certificates as $key=>$certificate){
                $certificates[$key]= (object) $this->getCertificateMeta($certificate);
            }
        }
        return $certificates;
    }

    public function getActivityAreasForSelect2(){
        $temp=[''=>''];
        $activityAreas = $this->db->query("SELECT id, name from activity_area")->result();
        if(!empty($activityAreas)){
            foreach ($activityAreas as $area){
                $temp[$area->id]=$area->name;
            }
        }
        return $temp;
    }

    public function getAffiliateCompaniesForSelect2(){
        $temp=[''=>''];
        $affiliateCompanies = $this->db->query("SELECT id, name from affiliate_companies")->result();
        if(!empty($affiliateCompanies)){
            foreach ($affiliateCompanies as $company){
                $temp[$company->id]=$company->name;
            }
        }
        return $temp;
    }

    public function get_meta($certificate_id, $key)
    {
        return get_meta($certificate_id, $key, 'abe_meta', 'abe_id');
    }

    public function update_meta($certificate_id, $key, $value)
    {
        update_meta($certificate_id, $key, $value, 'abe_meta', 'abe_id');
    }

    public function insertOrUpdate($data, $certificateID=''){
        $metas = $this->get_metas_group();
        $data['updated_by']=$userID = get_current_user_id();
        $meta_datas = [];
        if (!empty($metas)) {
            foreach ($metas as $meta) {
                if (isset($data[$meta])) {
                    $meta_datas[$meta] = $data[$meta];
                    unset($data[$meta]);
                }
            }
        }
        //creation
        if($certificateID==''){
            $data['active']=1;
            $data['user_id']=$userID;
            $data['created_at']=date('Y-m-d H:i:s');
            $data['slug']=substr(getSlugifyString($data['title']), 0, 20).uniqid();
            //var_dump($data);exit;
            $this->db->insert('abe', $data);
            $certificateID = $this->db->insert_id();
        }else{
            $data['updated_at']=date('Y-m-d H:i:s');
            $this->db->update('abe', $data, ['id'=>$certificateID]);
        }
        if (!empty($meta_datas) && $certificateID) {
            foreach ($meta_datas as $key => $meta_data) {
                $this->update_meta($certificateID, $key, $meta_data);
            }
        }
        return $certificateID;
    }

    public function update($data, $id){
        $this->db->update('abe', $data, ['id'=>$id]);
    }

    public function getCertificateFieldByID($certificateID, $field){
        $this->db->select($field);
        $user = $this->db->get_where('abe', ['id'=>$certificateID])->row();
        return maybe_null_or_empty($user, $field);
    }

    public function getCertificateIDBySlug($certificateSlug){
        $this->db->select('id');
        $user = $this->db->get_where('abe', ['slug'=>$certificateSlug])->row();
        return maybe_null_or_empty($user, 'id');
    }

    private function getCertificateMeta(array $certificateArrayData){
        if (!empty($certificateArrayData)) {
            $metas = $this->get_metas_group();
            if (!empty($metas)) {
                foreach ($metas as $meta) {
                    $certificateArrayData[$meta] = $this->get_meta($certificateArrayData['id'], $meta);
                }
            }
        }
        return $certificateArrayData;
    }

    public function get_data_by_id($certificateID)
    {
        $certificate = $this->db->get_where('abe', ['id'=>$certificateID])->row_array();
        if(!empty($certificate)){
            $certificate = $this->getCertificateMeta($certificate);
        }
        return $certificate;
    }

    public function getFilesMeta($certificateID){
        $metas = [
            'certificateFile', 'minuteFile', 'contractFile'
        ];
        $temp = [];
        foreach ($metas as $meta){
            $temp[$meta]=$this->get_meta($certificateID, $meta);
        }
        return $temp;
    }

    public function getAutoCompletes($field, $term){
        $autoCompletes = $this->db->query("SELECT DISTINCT $field from abe where $field LIKE '%$term%' LIMIT 10")->result();
        //var_dump($autoCompletes);exit;
        $temp=[];
        if(!empty($autoCompletes)){
            foreach ($autoCompletes as $autoComplete){
                $temp[]=$autoComplete->$field;
            }
        }
        return $temp;

    }
}