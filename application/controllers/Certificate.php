<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 03/10/2019
 * Time: 10:25
 */

class Certificate extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('certificate');
    }

    public function index(){
        $this->data['pageTitle']= 'Liste des ABE';

        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net/js/jquery.dataTables.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-dt/js/dataTables.dataTables.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive/js/dataTables.responsive.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/select2/js/select2.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/datatables.net-dt/css/jquery.dataTables.min.css';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/select2/css/select2.min.css';
        $this->render('certificate/index');
    }

    public function add(){
        $this->data['pageTitle']='Ajouter une ABE';
        $this->data['countries']=getCountries();


        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/select2/js/select2.min.js';
        $this->data['footerJs'][] = '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js';
        $this->data['headerCss'][] = '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css';
        //Number formatting
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/cleave.js/cleave.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/cleave.js/addons/cleave-phone.us.js';
        //SummerNote Text Editor
        $this->data['footerJs'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js';
        $this->data['headerCss'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css';
        $this->data['footerJs'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/lang/summernote-fr-FR.js';
        //Dropify File Upload
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/dropify/dist/js/dropify.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/dropify/dist/css/dropify.min.css';

        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/select2/css/select2.min.css';
        $this->render('certificate/add');
    }
}