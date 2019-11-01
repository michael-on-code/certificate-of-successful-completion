<?php

/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 08/10/2019
 * Time: 09:26
 */
class Certificate_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    private function get_metas_group()
    {
        return array(
            'customer_adress',
            'role',
            'certificateFile',
            'minuteFile',
            'contractFile',
            'detailed_tasks',
            'project_description',
            'updated_by',
        );
    }

    public function getNumberOfCertificateAddedByUserID($userID = null, $onlyActiveOnes = true)
    {
        $sql = 'SELECT COUNT(id) as num FROM abe';
        $sql = $userID ? $sql . " where user_id=$userID" : $sql;
        $sql = $onlyActiveOnes ? $sql . ($userID ? ' AND ' : ' where ') . 'active=1' : $sql;
        return $this->db->query($sql)->row()->num;
    }

    public function updateCertificateCountries($certificateID, array $countries=[], $returnInsertedData = true)
    {
        $allCountries = getCountries();
        $data = [];
        $countryNames = [];
        if (!empty($countries)) {
            $this->db->delete('abe_country_groups', array('abe_id' => $certificateID));
            foreach ($countries as $countryCode) {
                $data[] = [
                    'country_code' => $countryCode,
                    'abe_id' => $certificateID
                ];
                $countryNames[] = $allCountries[$countryCode];
            }
            $this->db->insert_batch('abe_country_groups', $data);
        }
        if ($returnInsertedData) {
            return implode(' | ', $countryNames);
        }
        return false;
    }

    public function getCertificateCountries($certificateID, $returnInString = true)
    {
        if ($returnInString) {
            $results = $this->db->query("SELECT countries.name as countries from abe_country_groups join countries ON 
abe_country_groups.country_code = countries.code where abe_country_groups.abe_id = $certificateID")->result_array();
            if (!empty($results)) {
                $temp = [];
                foreach ($results as $result) {
                    $temp[] = $result['countries'];
                }
                return implode(' | ', $temp);
            }
            return false;
        } else {
            $this->db->select('country_code');
            $results = $this->db->get_where('abe_country_groups', ['abe_id' => $certificateID])->result_array();
            $temp=[];
            if(!empty($results)){
                foreach ($results as $result){
                    $temp[]=$result['country_code'];
                }
            }
            return $temp;
        }

    }

    public function getNumberOfCertificateAddedLastWeekByUserID($userID = null, $onlyActiveOnes = true)
    {
        $sql = 'SELECT count(id) as num from abe WHERE created_at >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
AND created_at < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY';
        $sql = $userID ? $sql . " AND user_id=$userID" : $sql;
        $sql = $onlyActiveOnes ? $sql . ' AND active=1' : $sql;
        return $this->db->query($sql)->row()->num;
    }

    public function getAll($onlyActiveOnes = true, $onlyUnactiveOnes=false)
    {
        $sql = "SELECT abe.*, activity_area.name as activity_area_name, affiliate_companies.name as affiliate_company_name FROM abe 
join activity_area on activity_area.id = abe.activity_area_id join affiliate_companies on affiliate_companies.id = abe.affiliate_company_id";
        if ($onlyActiveOnes) {
            $sql = $sql . " where abe.active = 1";
        }elseif($onlyUnactiveOnes){
            $sql = $sql . " where abe.active = 0";
        }
        $sql = $sql . ' order by abe.id desc';
        $certificates = $this->db->query($sql)->result_array();
        if (!empty($certificates)) {
            $countries = getCountries();
            foreach ($certificates as $key => $certificate) {
                $certificates[$key]['country'] = $this->getCertificateCountries($certificate['id'], true);
                $certificates[$key] = (object)$this->getCertificateMeta($certificates[$key]);
                $certificates[$key]->minifiedPreview = getMinifiedView($certificates[$key], $key, $this->data['uploadPath'], $countries);
                $certificates[$key]->globalPreview = getGlobalPreview($certificates[$key], $key, $this->data['uploadPath'], $countries);
            }

        }
        return $certificates;
    }

    public function getActivityAreasForSelect2()
    {
        $temp = ['' => ''];
        $activityAreas = $this->db->query("SELECT id, name from activity_area")->result();
        if (!empty($activityAreas)) {
            foreach ($activityAreas as $area) {
                $temp[$area->id] = $area->name;
            }
        }
        return $temp;
    }

    public function getAffiliateCompaniesForSelect2()
    {
        $temp = ['' => ''];
        $affiliateCompanies = $this->db->query("SELECT id, name from affiliate_companies")->result();
        if (!empty($affiliateCompanies)) {
            foreach ($affiliateCompanies as $company) {
                $temp[$company->id] = $company->name;
            }
        }
        return $temp;
    }

    public function get_meta($certificate_id, $key)
    {
        return get_meta($certificate_id, $key, 'abe_meta', 'abe_id');
    }

    public function update_meta($certificate_id, $key, $value)
    {
        update_meta($certificate_id, $key, $value, 'abe_meta', 'abe_id');
    }

    public function insertOrUpdate($data, $certificateID = '')
    {
        $metas = $this->get_metas_group();
        $data['updated_by'] = $userID = get_current_user_id();
        $meta_datas = [];
        if (!empty($metas)) {
            foreach ($metas as $meta) {
                if (isset($data[$meta])) {
                    $meta_datas[$meta] = $data[$meta];
                    unset($data[$meta]);
                }
            }
        }
        $adminName = maybe_null_or_empty($this->data['user'], 'first_name') . ' ' . maybe_null_or_empty($this->data['user'], 'last_name');
        $certificateCountry = maybe_null_or_empty($data, 'country') ? maybe_null_or_empty($data, 'country') : [];
        unset($data['country']);
        //creation
        if ($certificateID == '') {
            $data['active'] = 1;
            $data['user_id'] = $userID;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['slug'] = substr(getSlugifyString($data['title']), 0, 20) . uniqid();
            //var_dump($data);exit;
            $this->db->insert('abe', $data);
            $certificateID = $this->db->insert_id();
            $data['country'] = $this->updateCertificateCountries($certificateID, $certificateCountry);

            $data = (object)$data;
            sendCertificateNotificationMail($data, "Enregistrement d'une ABE", "Dear Akasi Group Members,<br><br>
                                    Une ABE vient d'être publiée sur la plateforme AKASI-ABE");
            //sendNotificationMail("L'administrateur <strong>$adminName</strong> vient d'ajouter une nouvelle ABE avec pour désignation <strong>$data->title</strong> et pour numéro interne <strong>$data->internal_file_number</strong> ");
        } else {
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->db->update('abe', $data, ['id' => $certificateID]);
            $data['country'] = $this->updateCertificateCountries($certificateID, $certificateCountry);
            //var_dump($data['country']);exit;
            $data = (object)$data;
            sendCertificateNotificationMail($data, "Mise à jour d'une ABE", "Dear Akasi Group Members,<br><br>
                                    Une ABE vient d'être mise à jour sur la plateforme AKASI-ABE");
            //sendNotificationMail("L'administrateur <strong>$adminName</strong> vient d'ajouter quelques modifications à l'ABE ayant pour désignation <strong>$data->title</strong> et pour numéro interne <strong>$data->internal_file_number</strong> ");
        }
        if (!empty($meta_datas) && $certificateID) {
            require(APPPATH . '/third_party/HTMLPurifier/HTMLPurifier.auto.php');
            $config = HTMLPurifier_Config::createDefault();
            $purifier = new HTMLPurifier($config);
            foreach ($meta_datas as $key => $meta_data) {
                $this->update_meta($certificateID, $key, $purifier->purify($meta_data));
            }
        }
        return $certificateID;
    }

    public function update($data, $id)
    {
        $this->db->update('abe', $data, ['id' => $id]);
    }

    public function getCertificateFieldByID($certificateID, $field)
    {
        $this->db->select($field);
        $user = $this->db->get_where('abe', ['id' => $certificateID])->row();
        return maybe_null_or_empty($user, $field);
    }

    public function getCertificateIDBySlug($certificateSlug)
    {
        $this->db->select('id');
        $user = $this->db->get_where('abe', ['slug' => $certificateSlug])->row();
        return maybe_null_or_empty($user, 'id');
    }

    private function getCertificateMeta(array $certificateArrayData)
    {
        if (!empty($certificateArrayData)) {
            $metas = $this->get_metas_group();
            if (!empty($metas)) {
                foreach ($metas as $meta) {
                    $certificateArrayData[$meta] = $this->get_meta($certificateArrayData['id'], $meta);
                }
            }
        }
        return $certificateArrayData;
    }

    public function get_data_by_id($certificateID)
    {
        $certificate = $this->db->get_where('abe', ['id' => $certificateID])->row_array();
        if (!empty($certificate)) {
            $certificate['country']=$this->getCertificateCountries($certificate['id'], false);
            $certificate = $this->getCertificateMeta($certificate);
        }
        return $certificate;
    }

    public function getFilesMeta($certificateID)
    {
        $metas = [
            'certificateFile', 'minuteFile', 'contractFile'
        ];
        $temp = [];
        foreach ($metas as $meta) {
            $temp[$meta] = utf8_encode($this->get_meta($certificateID, $meta));
        }
        return $temp;
    }

    public function getAutoCompletes($field, $term)
    {
        $autoCompletes = $this->db->query("SELECT DISTINCT $field from abe where $field LIKE '%$term%' LIMIT 10")->result();
        //var_dump($autoCompletes);exit;
        $temp = [];
        if (!empty($autoCompletes)) {
            foreach ($autoCompletes as $autoComplete) {
                $temp[] = $autoComplete->$field;
            }
        }
        return $temp;

    }
}