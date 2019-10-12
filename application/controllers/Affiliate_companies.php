<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 12/10/2019
 * Time: 00:05
 */
class Affiliate_companies extends Pro_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('affiliate_company_model');
        $this->load->helper('affiliate_company');
    }

    public function index(){
        $this->data['pageTitle']='Liste des filiales';
        $this->data['companies']=$this->affiliate_company_model->getAll();

        $this->data['headerCss'][] = $this->data['assetsUrl'] . 'lib/sweetalert/sweetalert.css';
        $this->data['footerJs'][] = $this->data['assetsUrl'] . 'lib/sweetalert/sweetalert.min.js';

        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net/js/jquery.dataTables.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-dt/js/dataTables.dataTables.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive/js/dataTables.responsive.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/datatables.net-dt/css/jquery.dataTables.min.css';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css';
        $this->render('affiliate_companies/index');
    }

    public function add(){
        $this->data['pageTitle']='Ajouter une filiale';
        getAddOrEditAffiliateCompaniesValidation();
        $this->render('affiliate_companies/add');
    }

    public function edit($companyID){
        redirect_if_id_is_not_valid($companyID, 'affiliate_companies', 'affiliate-companies');
        $this->data['pageTitle']='Modifier une filiale';
        $this->data['company']=$this->affiliate_company_model->getByID($companyID);
        getAddOrEditAffiliateCompaniesValidation(true, $companyID);
        $this->render('affiliate_companies/edit');
    }

    public function delete($companyID){
        redirect_if_id_is_not_valid($companyID, 'affiliate_companies', 'affiliate-companies');
        delete_in_table('affiliate_companies', $companyID, 'affiliate-companies');
    }

    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }
}