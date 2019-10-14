<?php

/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 07/10/2019
 * Time: 09:13
 */
class Password_forgotten extends Login_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['pageTitle'] = 'Mot de passe oublié';
        if (($email = $this->input->post('email')) && $recaptchaToken = $this->input->post('g-recaptcha-response')) {
            $this->load->model('user_model');
            setFormValidationRules([
                [
                    'name' => 'email',
                    'label' => 'Adresse Email',
                    'rules' => [
                        'trim', 'required', 'valid_email', ['email_check', [$this->user_model, 'do_email_exist']]
                    ]
                ], [
                    'name' => 'g-recaptcha-response',
                    'label' => 'Code de vérification Google Recaptcha',
                    'rules' => 'trim|required'
                ]
            ]);
            if ($this->form_validation->run()) {
                $successRecaptchaResult = true;
                if (ENVIRONMENT == 'production') {
                    //Recaptcha verification working properly
                    $recaptChaResult = json_decode(googleRecaptchaCurl1([
                        'secret' => maybe_null_or_empty($this->data['options'], 'googleRecaptchaSecretKey'),
                        'response' => $recaptchaToken,
                        'remoteip' => $this->input->ip_address()
                    ]));
                    //var_dump($recaptChaResult);exit;
                    $successRecaptchaResult = maybe_null_or_empty($recaptChaResult, 'success', true);
                }
                if ($successRecaptchaResult) {
                    $active = $this->user_model->getActiveByEmail($email);
                    //var_dump($active);exit;
                    if ($active == 0) {
                        get_warning_message("Veuillez finaliser votre inscription sur la plateforme ou demander à l'administrateur de vous renvoyer un email d'activation");
                    } elseif ($active == 2) {
                        get_warning_message("Vous avez été bannis de la plateforme. <br> Veuillez contacter l'administrateur");
                    } else {
                        $forgotten = $this->ion_auth->forgotten_password($email);
                        //var_dump($forgotten);exit;
                        if (!empty($forgotten)) { //if there were no errors
                            $siteName = maybe_null_or_empty($this->data['options'], 'siteName');
                            $mail['title'] = "Réinitialiser mot de passe";
                            $mail['message'] = "Bonjour <br> Vous avez demandé à réinitialiser votre mot de passe. Si vous êtes l'auteur de cette demande, 
veuillez cliquez sur le bouton ci-dessous. Dans le cas échéant, veuillez s'il vous plait ignorer ce courriel";
                            $mail['btnLabel'] = "Réinitialiser mot de passe";
                            $mail['btnLink'] = site_url('password-forgotten/complete/') . $forgotten['forgotten_password_code'];
                            $mail['destination'] = $forgotten['identity'];
                            sendMail($siteName . ' <no-reply@akasigroup.com>', $mail);
                            get_success_message("Réinitialisation de mot de passe réussie. Un mail de réinitialisation a été envoyé à " . $forgotten['identity'], 10000);
                            redirect('password-forgotten');

                        } else {
                            get_error_message("Demande de réinitialisation de mot de passe échouée. Veuillez réessayer");
                        }
                    }
                } else {
                    get_error_message("Google Recaptcha n'autorise pas votre connexion <br> Veuillez rééssayer");
                }
            } else {
                get_error_message();
            }
        }
        $this->render('password_forgotten');
    }

    public function complete($code)
    {
        $reset = $this->ion_auth->forgotten_password_complete($code);
        if ($reset && !empty($reset)) {  //if the reset worked then send them to the login page
            $this->load->model('user_model');
            $userID = $this->user_model->getIDByEmail($reset['identity']);
            $this->user_model->update_meta($userID, 'completionToken', $token = md5(uniqid()));
            get_info_message('Veuillez définir à présent votre nouveau mot de passe', 10000);
            redirect("login/complete/$userID/$token", 'refresh');
        } else { //if the reset didnt work then send them back to the forgot password page
            get_warning_message("Operation de réinitialisation échouée. Veuillez reessayer");
            redirect("login");
        }
    }
}