<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 01/10/2019
 * Time: 16:03
 */

class Logout extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->ion_auth->logout();
        get_info_message('Vous vous êtes déconnectés');
        redirect('/');
    }
}