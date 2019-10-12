<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 12/10/2019
 * Time: 03:34
 */

class Activity_area extends Pro_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('activity_area_model');
        $this->load->helper('activity_area');
    }

    public function index(){
        $this->data['pageTitle']="Liste des secteurs d'activités";
        $this->data['activities']=$this->activity_area_model->getAll();

        $this->data['headerCss'][] = $this->data['assetsUrl'] . 'lib/sweetalert/sweetalert.css';
        $this->data['footerJs'][] = $this->data['assetsUrl'] . 'lib/sweetalert/sweetalert.min.js';

        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net/js/jquery.dataTables.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-dt/js/dataTables.dataTables.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive/js/dataTables.responsive.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/datatables.net-dt/css/jquery.dataTables.min.css';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css';
        $this->render('activity_area/index');
    }

    public function add(){
        $this->data['pageTitle']="Ajouter un secteur d'activité";
        getAddOrEditActivityAreaValidation();
        $this->render('activity_area/add');
    }

    public function edit($companyID){
        redirect_if_id_is_not_valid($companyID, 'activity_area', 'activity-area');
        $this->data['pageTitle']="Modifier un secteur d'activité";
        $this->data['activity']=$this->activity_area_model->getByID($companyID);
        getAddOrEditActivityAreaValidation(true, $companyID);
        $this->render('activity_area/edit');
    }

    public function delete($companyID){
        redirect_if_id_is_not_valid($companyID, 'activity_area', 'activity-area');
        delete_in_table('activity_area', $companyID, 'activity-area');
    }

    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }
}