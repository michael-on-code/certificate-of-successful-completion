<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 01/10/2019
 * Time: 15:21
 */
class Dashboard extends Pro_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']='Tableau de bord';
        $this->render('dashboard/index');
    }
}