<?php

/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 01/10/2019
 * Time: 15:21
 */
class Dashboard extends Pro_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('certificate_model');
        $this->data['addedByMe'] = (int) $this->certificate_model->getNumberOfCertificateAddedByUserID(get_current_user_id());
        $this->data['addedLastWeekByMe'] = (int) $this->certificate_model->getNumberOfCertificateAddedLastWeekByUserID(get_current_user_id());
        $this->data['isAdmin']=$isAdmin=user_can('admin');
        if($isAdmin){
            $this->load->model('user_model');
            $this->data['totalUsers'] = (int) $this->user_model->getTotalNumber(false);
            $this->data['totalActiveUsers'] = (int) $this->user_model->getTotalNumber(true);
            $this->data['totalCertificates'] = (int) $this->certificate_model->getNumberOfCertificateAddedByUserID();
            $this->data['totalCertificatesLastWeek'] = (int) $this->certificate_model->getNumberOfCertificateAddedLastWeekByUserID();
        }
        $this->data['pageTitle'] = 'Tableau de bord';
        $this->render('dashboard/index');
    }
}