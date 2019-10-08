<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 07/10/2019
 * Time: 09:13
 */
class Password_forgotten extends Login_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']= 'Mot de passe oublié';
        $this->render('password_forgotten');
    }
}