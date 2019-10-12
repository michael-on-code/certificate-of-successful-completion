<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 12/10/2019
 * Time: 03:36
 */

class Activity_area_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(){
        return $this->db->query("SELECT * from activity_area order by id desc")->result();
    }

    public function insertOrUpdate($data, $activityID = ''){
        if($activityID == ''){
            $this->db->insert('activity_area', $data);
            $activityID = $this->db->insert_id();
        }else{
            $this->db->update('activity_area', $data, ['id'=>$activityID]);
        }
        return $activityID;
    }

    public function getByID($activityID){
        return $this->db->get_where('activity_area', ['id'=>$activityID])->row();
    }
}