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

    public function activate($userID, $activationCode){
        if ($userID && $activationCode) {
            $activate = $this->ion_auth->activate($userID, $activationCode);
            if ($activate) {
                $this->load->model('user_model');
                $this->user_model->update_meta($userID, 'completionToken', $token=md5(uniqid()));
                //TODO $this->sendAdminNotificationMail($user_id);
                get_info_message('Veuillez définir à présent votre mot de passe pour finaliser votre inscription', 10000);
                redirect("login/complete/$userID/$token");
            } else {
                get_error_message('Action non authorisée');
                redirect('/');
            }

        } else {
            get_error_message('Action non authorisée');
            redirect('/');
        }
    }

    public function complete($userID, $token){
        $this->load->model('user_model');
        if($userID && $token && $dbToken = $this->user_model->get_meta($userID, 'completionToken')){
            //$dbToken = $this->user_model->get_meta($userID, 'completionToken');
            if($dbToken == $token){
                $this->data['pageTitle']='Définissez mot de passe';
                $this->data['user']=$this->user_model->get_data_by_id($userID);
                //var_dump($this->data['user']);exit;
                if(($password = $this->input->post('password')) && $recaptchaToken = $this->input->post('g-recaptcha-response')){
                    setFormValidationRules([
                        [
                            'name'=>'password[new]',
                            'label'=>'Nouveau mot de passe',
                            'rules'=>'trim|required|min_length[8]',
                        ],
                        [
                            'name'=>'password[confirm]',
                            'label'=>'Confirmer mot de passe',
                            'rules'=>'trim|required|matches[password[new]]',
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
                            $this->ion_auth->update($userID, array(
                                'password' => $password['new']
                            ));
                            $this->user_model->update_meta($userID, 'completionToken', null);
                            get_success_message('Inscription finalisée avec succès <br> Vous pouvez vous connecter à présent avec vos identifiants', 10000);
                            redirect('/');
                        }else{
                            get_error_message("Google Recaptcha n'autorise pas votre connexion <br> Veuillez rééssayer");
                        }
                    }else{
                        get_error_message();
                    }
                }
                $this->render('complete');
            }else{
                get_error_message('Action non authorisée');
                redirect('/');
            }
        }else{
            get_error_message('Action non authorisée');
            redirect('/');
        }
    }
}