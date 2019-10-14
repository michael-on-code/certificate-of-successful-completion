<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 03/10/2019
 * Time: 10:25
 */

class Certificate extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('certificate');
        $this->load->model('certificate_model');
        $this->data['clientData'] = [
            'autocompleteUrl' => site_url('certificate/retrieveAutoCompletes/'),
        ];
    }

    public function index(){
        $this->data['pageTitle']= 'Liste des ABE';
        $this->data['certificates'] = $this->certificate_model->getAll();
        $this->data['countries']=getCountries();
        $this->data['tableHeaders']=[
            'N° Interne', 'Désignation', 'Secteur', 'Sous Secteur', 'Date de signature', 'Autorité contractante',
            'Montant total', 'Montant payé', 'Part', "Début période d'execution", "Fin période d'execution", "Pays", "Ville",
            'Source de financement', 'Filiale', "Date d'attribution", "Partenaire/associé", "Adresse maitre d'ouvrage", "Role", "Description du marché","Details des taches exécutés" ,"Ajouté le"
        ];
        $numberColumns = count($this->data['tableHeaders']);
        for($i=7; $i<$numberColumns; $i++){
            $this->data['invisiblesColumns'][]=$i;
        }
        $this->data['visiblesColumns']=[
            0,1,2,3,4,5,6
        ];
        $this->data['clientData']=[
            'invisiblesColumns'=>$this->data['invisiblesColumns'],
            'allColumns'=>array_keys($this->data['tableHeaders'])
        ];
        //var_dump($this->data['certificates']);exit;

        $this->data['headerCss'][] = $this->data['assetsUrl'] . 'lib/sweetalert/sweetalert.css';
        $this->data['footerJs'][] = $this->data['assetsUrl'] . 'lib/sweetalert/sweetalert.min.js';

        $this->data['footerJs'][] = '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js';

        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net/js/jquery.dataTables.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-dt/js/dataTables.dataTables.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive/js/dataTables.responsive.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/select2/js/select2.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'js/line-cutter.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/datatables.net-dt/css/jquery.dataTables.min.css';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/select2/css/select2.min.css';
        $this->render('certificate/index');
    }

    public function retrieveAutoCompletes($fieldName){
        if($fieldName && ($searchTerm = $this->input->get('term'))){
            echo json_encode($this->certificate_model->getAutoCompletes($fieldName, $searchTerm));
            exit;
        }else{
            echo json_encode(null);
            exit;
        }
    }

    public function add(){
        $this->data['pageTitle']='Ajouter une ABE';

        getCertificationAddOrEditValidation();

        $this->data['countries']=getCountries();
        $this->data['activityAreas']= $this->certificate_model->getActivityAreasForSelect2();
        $this->data['affiliateCompanies']= $this->certificate_model->getAffiliateCompaniesForSelect2();
        $this->data['currencies']= ['FCFA', '€', '$'];

        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/select2/js/select2.min.js';
        $this->data['footerJs'][] = '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js';
        $this->data['footerJs'][] = '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/i18n/jquery.ui.datepicker-fr.min.js';
        $this->data['headerCss'][] = '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css';
        //Number formatting
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/cleave.js/cleave.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/cleave.js/addons/cleave-phone.us.js';
        //SummerNote Text Editor
        $this->data['footerJs'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js';
        $this->data['headerCss'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css';
        $this->data['footerJs'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/lang/summernote-fr-FR.js';
        //Dropify File Upload
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/dropify/dist/js/dropify.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/dropify/dist/css/dropify.min.css';

        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/select2/css/select2.min.css';
        $this->render('certificate/add');
    }

    public function edit($certificateSlug){
        $certificateID = (int) $this->certificate_model->getCertificateIDBySlug($certificateSlug);
        redirect_if_id_is_not_valid($certificateID, 'abe', '/');
        $this->data['pageTitle']='Modifier une ABE';

        getCertificationAddOrEditValidation(true, $certificateID,$certificateSlug);
        $this->data['certificate']=$this->certificate_model->get_data_by_id($certificateID);
        $this->data['pageTitle']="Modifier l'ABE N°".$this->data['certificate']['internal_file_number'];
        $this->data['countries']=getCountries();
        $this->data['activityAreas']= $this->certificate_model->getActivityAreasForSelect2();
        $this->data['affiliateCompanies']= $this->certificate_model->getAffiliateCompaniesForSelect2();
        $this->data['currencies']= ['FCFA', '€', '$'];

        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/select2/js/select2.min.js';
        $this->data['footerJs'][] = '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js';
        $this->data['footerJs'][] = '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/i18n/jquery.ui.datepicker-fr.min.js';
        $this->data['headerCss'][] = '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css';
        //Number formatting
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/cleave.js/cleave.min.js';
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/cleave.js/addons/cleave-phone.us.js';
        //SummerNote Text Editor
        $this->data['footerJs'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js';
        $this->data['headerCss'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css';
        $this->data['footerJs'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/lang/summernote-fr-FR.js';
        //Dropify File Upload
        $this->data['footerJs'][] = $this->data['assetsUrl'].'lib/dropify/dist/js/dropify.min.js';
        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/dropify/dist/css/dropify.min.css';

        $this->data['headerCss'][] = $this->data['assetsUrl'].'lib/select2/css/select2.min.css';
        $this->render('certificate/edit');
    }

    public function delete($certificateSlug){
        $certificateID = (int) $this->certificate_model->getCertificateIDBySlug($certificateSlug);
        redirect_if_id_is_not_valid($certificateID, 'abe', 'certificate');
        $this->certificate_model->insertOrUpdate(['active'=>0], $certificateID);
        get_success_message('Suppression avec succès');
        redirect('certificate');
    }

    public function download($certificateSlug){
        $certificateID = (int) $this->certificate_model->getCertificateIDBySlug($certificateSlug);
        redirect_if_id_is_not_valid($certificateID, 'abe', 'certificate');
        $filesNameToBeDownloaded = $this->certificate_model->getFilesMeta($certificateID);
        downloadFiles($filesNameToBeDownloaded);
        exit;
    }

    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }
}