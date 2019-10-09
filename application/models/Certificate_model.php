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
        );
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
        var_dump($data);exit;
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
        //creation
        if($certificateID==''){
            $data['created_at']=date('Y-m-d G:i:s');
            $data['slug']=substr(getSlugifyString($data['title']), 0, 35).uniqid();
            //var_dump($data);exit;
            $this->db->insert('abe', $data);
            $certificateID = $this->db->insert_id();
        }else{
            $data['updated_at']=date('Y-m-d G:i:s');
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
}