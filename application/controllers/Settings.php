<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 02/10/2019
 * Time: 09:26
 */

class Settings extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        redirect_if_user_cannot('admin', 'dashboard');
    }

    public function index(){
        $this->data['pageTitle']='Paramètres généraux';
        if($settings = $this->input->post('settings')){
            setFormValidationRules([
                [
                    'name'=>'settings[siteName]',
                    'label'=>'Nom de la plateforme',
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'settings[siteDescription]',
                    'label'=>'Description de la plateforme',
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'settings[siteFooterDescription]',
                    'label'=>'Pied de page de la plateforme',
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'settings[notificationEmails]',
                    'label'=>'Emails de notification',
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'settings[googleRecaptchaPublicKey]',
                    'label'=>'Clé publique Google Recaptcha',
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'settings[googleRecaptchaSecretKey]',
                    'label'=>'Clé privé Google Recaptcha',
                    'rules'=>'trim|required'
                ],

            ]);
            if($this->form_validation->run()){
                $uploadNames = [
                    'siteFavicon', 'siteDefaultAvatar'
                ];
                if ($data = upload_data(array(
                    'upload_path' => FCPATH . 'uploads',
                    'allowed_types' => 'jpg|png|jpeg|ico',
                    'max_size' => 1024,
                ), $uploadNames)) {
                    foreach ($uploadNames as $name) {
                        if (isset($data[$name]) && maybe_null_or_empty($data[$name], 'raw_name')) {
                            $settings[$name] = $data[$name]['raw_name'] . $data[$name]['file_ext'];
                        }
                    }
                }
                $this->option_model->update_all_options($settings);
                //var_dump($globalSettings);exit;
                get_success_message('Paramètres généraux de la plateforme mis à jour avec succès');
                redirect('settings');
            }else{
                get_error_message();
            }
        }
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/dropify/dist/js/dropify.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/dropify/dist/css/dropify.min.css';
        $this->render('settings/index');
    }
}