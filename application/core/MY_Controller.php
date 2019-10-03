<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{

    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->data['assetsUrl']=base_url('assets/');
        $this->data['options']=$this->option_model->get_options();
        $this->data['uploadPath']=base_url('uploads/');

    }

    protected function render($the_view = NULL, $template = 'home')
    {
        if ($template == 'json' || $this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode($this->data);
        } else {
            $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);

            $this->load->view('templates/' . $template . '_view', $this->data);
        }
    }
}
class Public_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['ion_auth', 'session', 'form_validation']);
    }


    protected function render($the_view = NULL, $template = 'public')
    {
        parent:: render("$template/".$the_view, $template);
    }
}

class Login_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['ion_auth', 'session', 'form_validation']);

        $this->data['secretCode']='6Lc6F7sUAAAAAN6_3HU4Fz8SWPNaQ0QtBRU01-zE';
    }


    protected function render($the_view = NULL, $template = 'login')
    {
        parent:: render("$template/".$the_view, $template);
    }
}

class Pro_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['ion_auth', 'session', 'form_validation']);
        $this->load->helper('user');
        redirect_if_not_logged_in('login');
        $this->load->model('user_model');
        $this->data['user']= (object) $this->user_model->get_data_by_id(null);
        redirect_if_is_banned();
        $user_groups = $this->ion_auth->get_users_groups()->result();
        if (!empty($user_groups)) {
            $this->data['menus'] = get_user_menu($user_groups);
            $this->data['userRole']=getUserRolesInString($user_groups);
        }
    }


    protected function render($the_view = NULL, $template = 'pro')
    {
        parent:: render("$template/".$the_view, $template);
    }
}