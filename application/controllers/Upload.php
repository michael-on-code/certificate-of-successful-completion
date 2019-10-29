<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 29/10/2019
 * Time: 11:25
 */

class Upload extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function doAjaxUpload(){
        if($this->input->is_ajax_request()){
            $status = false;
            $fileName = '';
            if($data = upload_data(array(
                'upload_path' => FCPATH . 'uploads',
                'allowed_types' => 'jpg|png|jpeg|pdf|doc|docx',
                'max_size' => 1024 * 5,
            ), $uploadNames=[$this->input->post('name')], false, false)){
                foreach ($uploadNames as $name) {
                    if (isset($data[$name]) && maybe_null_or_empty($data[$name], 'raw_name')) {
                        $status = true;
                        $fileName = $data[$name]['raw_name'] . $data[$name]['file_ext'];
                    }
                }
            }
            echo json_encode([
                'status' => $status,
                'csrf_token_name' => $this->security->get_csrf_token_name(),
                'csrf_hash' => $this->security->get_csrf_hash(),
                'fileName'=>$fileName,
            ]);
        }
        die();
    }
}