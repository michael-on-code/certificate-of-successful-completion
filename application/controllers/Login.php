<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 30/09/2019
 * Time: 13:14
 */

class Login extends Login_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']='Connexion';
        if(($login = $this->input->post('login')) && $recaptchaToken = $this->input->post('g-recaptcha-response')){
            setFormValidationRules([
                [
                    'name'=>'login[email]',
                    'label'=>'Adresse Email',
                    'rules'=>'trim|required|valid_email'
                ],
                [
                    'name'=>'login[password]',
                    'label'=>'Mot de passe',
                    'rules'=>'trim|required'
                ],
                [
                    'name' => 'g-recaptcha-response',
                    'label' => 'Code de vérification Google Recaptcha',
                    'rules' => 'trim|required'
                ]
            ]);
            if($this->form_validation->run()){
                $successRecaptchaResult = true;
                if(ENVIRONMENT=='production'){
                    //Recaptcha verification working properly
                    $recaptChaResult= json_decode(googleRecaptchaCurl1([
                        'secret'=>maybe_null_or_empty($this->data['options'], 'googleRecaptchaSecretKey'),
                        'response'=>$recaptchaToken,
                        'remoteip'=>$this->input->ip_address()
                    ]));
                    //var_dump($recaptChaResult);exit;
                    $successRecaptchaResult = maybe_null_or_empty($recaptChaResult, 'success', true);
                }
                if($successRecaptchaResult){
                    $login['remember']=(bool) maybe_null_or_empty($login, 'remember');
                    if($this->ion_auth->login($login['email'], $login['password'], $login['remember'])){
                        redirect('dashboard');
                    }else{
                        get_error_message('Informations de connexion incorrectes');
                    }
                }else{
                    get_error_message("Google Recaptcha n'autorise pas votre connexion <br> Veuillez rééssayer");
                }
            }else{
                get_error_message();
            }
        }
        $this->render('index');
    }
}