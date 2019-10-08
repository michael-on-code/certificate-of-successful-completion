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
}