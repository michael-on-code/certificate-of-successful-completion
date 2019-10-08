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
        //Updating Profil
        if($user = $this->input->post('user')){
            setFormValidationRules([
                [
                    'name'=>'user[last_name]',
                    'label'=>'Nom',
                    'rules'=>'trim|required|max_length[50]'
                ],
                [
                    'name'=>'user[first_name]',
                    'label'=>'Prénom(s)',
                    'rules'=>'trim|required|max_length[50]'
                ],
            ]);
            if($this->form_validation->run()){
                $uploadNames = [
                    'user_photo'
                ];
                if ($data = upload_data(array(
                    'upload_path' => FCPATH . 'uploads',
                    'allowed_types' => 'jpg|png|jpeg|ico',
                    'max_size' => 1024,
                ), $uploadNames)) {
                    foreach ($uploadNames as $name) {
                        if (isset($data[$name]) && maybe_null_or_empty($data[$name], 'raw_name')) {
                            $user[$name] = $data[$name]['raw_name'] . $data[$name]['file_ext'];
                        }
                    }
                }
                $this->user_model->update($this->data['user']->id, $user);
                get_success_message('Informations personnelles mis à jour avec succès');
                redirect('account');
            }else{
                get_error_message();
            }
        }

        //Updating password
        if($password = $this->input->post('password')){
            setFormValidationRules([
                [
                    'name'=>'password[actual]',
                    'label'=>'Mot de passe actuel',
                    'rules'=>[
                        'trim', 'required', array('password_check', array($this->user_model, 'old_password_check'))
                    ]
                ],
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
            ]);
            if($this->form_validation->run()){
                $this->ion_auth->update($this->data['user']->id, array(
                    'password' => $password['new']
                ));
                get_success_message('Mot de passe modifié avec succès');
                redirect('account');
            }
        }
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/dropify/dist/js/dropify.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/dropify/dist/css/dropify.min.css';
        $this->render('account/index');
    }
}