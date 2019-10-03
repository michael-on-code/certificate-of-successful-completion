<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 02/10/2019
 * Time: 14:44
 */

class Account extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']='Mon compte';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/dropify/dist/js/dropify.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/dropify/dist/css/dropify.min.css';
        $this->render('account/index');
    }
}