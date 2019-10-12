<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 12/10/2019
 * Time: 00:12
 */
class Affiliate_company_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(){
        return $this->db->query("SELECT * from affiliate_companies order by id desc")->result();
    }

    public function insertOrUpdate($data, $companyID = ''){
        if($companyID == ''){
            $this->db->insert('affiliate_companies', $data);
            $companyID = $this->db->insert_id();
        }else{
            $this->db->update('affiliate_companies', $data, ['id'=>$companyID]);
        }
        return $companyID;
    }

    public function getByID($companyID){
        return $this->db->get_where('affiliate_companies', ['id'=>$companyID])->row();
    }
}