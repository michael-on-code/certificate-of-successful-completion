<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 29/01/2018
 * Time: 13:56
 */
defined('BASEPATH') OR exit('No direct script access allowed');

function get_current_user_id()
{
    $ci = &get_instance();
    return $ci->ion_auth->user()->row()->id;
}

function getUserPhotoUrl($picFileName = '')
{
    if ($picFileName == '') {
        $CI = &get_instance();
        return base_url("uploads/") . maybe_null_or_empty($CI->data['options'], 'siteDefaultAvatar');
    }
    return base_url("uploads/$picFileName");
}

function get_user_menu($user_groups)
{
    if (!empty($user_groups)) {
        $temp = array();
        foreach ($user_groups as $group) {
            $temp[] = (get_menu_by_group($group->name));
        }
        $menuss = array();
        if (!empty($temp)) {
            foreach ($temp as $menus) {
                foreach ($menus as $menu) {
                    $menuss[] = $menu;
                }
            }
        }
        $menus = array();
        for ($i = 1; $i < 9; $i++) {
            foreach ($menuss as $menu) {
                if ($menu['order'] == $i)
                    $menus[] = $menu;
            }
        }
        return $menus;
    }
}

function getUserRolesInString(array $userRoles)
{
    $temp = [];
    if (!empty($userRoles)) {
        foreach ($userRoles as $role) {
            $temp[] = maybe_null_or_empty($role, 'description');
        }
    }
    return implode(', ', $temp);
}

function get_menu_by_group($group)
{
    //$ci = &get_instance();
    $ci = &get_instance();
    switch ($group) {
        case 'admin':
            return array(
                array(
                    'title' => 'Paramètres',
                    'url' => site_url('settings'),
                    'order' => 6,
                    'icon' => 'settings'
                ),
                array(
                    'url' => site_url('users'),
                    'title' => 'Utilisateurs',
                    'order' => 3,
                    'icon' => 'users',
                    'submenus' => [
                        [
                            'title' => 'Liste',
                            'url' => site_url('users')
                        ],
                        [
                            'title' => 'Ajouter',
                            'url' => site_url('users/add')
                        ],
                    ]
                ),

            );
            break;
        default://or member
            return array(
                array(
                    'title' => 'Mon compte',
                    'url' => site_url('account'),
                    'order' => 7,
                    'icon' => 'user'
                ), array(
                    'title' => 'Déconnexion',
                    'url' => site_url('logout'),
                    'order' => 8,
                    'icon' => 'log-out'
                ), array(
                    'title' => 'Attestations',
                    'url' => site_url('certificate'),
                    'order' => 2,
                    'icon' => 'layers',
                    'submenus' => [
                        [
                            'title' => 'Liste',
                            'url' => site_url('certificate')
                        ],
                        [
                            'title' => 'Ajouter',
                            'url' => site_url('certificate/add')
                        ],
                    ]
                ),array(
                    'title' => 'Filiales',
                    'url' => site_url('affiliate-companies'),
                    'order' => 4,
                    'icon' => 'map-pin',
                    'submenus' => [
                        [
                            'title' => 'Liste',
                            'url' => site_url('affiliate-companies')
                        ],
                        [
                            'title' => 'Ajouter',
                            'url' => site_url('affiliate-companies/add')
                        ],
                    ]
                ),array(
                    'title' => "Secteur d'activité",
                    'url' => site_url('activity-area'),
                    'order' => 5,
                    'icon' => 'share-2',
                    'submenus' => [
                        [
                            'title' => 'Liste',
                            'url' => site_url('activity-area')
                        ],
                        [
                            'title' => 'Ajouter',
                            'url' => site_url('activity-area/add')
                        ],
                    ]
                ),
                array(
                    'url' => site_url('dashboard'),
                    'title' => 'Tableau de bord',
                    'order' => 1,
                    'icon' => 'layout'
                ),
            );
    }
}

function redirect_if_not_logged_in($to = 'login')
{
    $CI = &get_instance();
    if (!$CI->ion_auth->logged_in()) {
        get_info_message('Veuillez vous authentifier');
        redirect($to);
    }

}

function redirect_if_is_banned($to = '/')
{
    $CI = &get_instance();
    //var_dump($CI->data['user']);exit;
    if ($CI->data['user']->active == 2) {
        $CI->ion_auth->logout();
        get_error_message("Vous avez été banni. <br> Veuillez contacter l'administrateur");
        redirect($to);
    }elseif($CI->data['user']->active == 0){
        $CI->ion_auth->logout();
        get_error_message("Veuillez finaliser votre inscription à la plateforme avant de vous logger");
        redirect($to);
    }

}



function redirect_if_logged_in($to = 'dashboard')
{
    $CI = &get_instance();
    if ($CI->ion_auth->logged_in()) {
        redirect($to);
    }
}

function redirect_if_user_cannot($group_name, $redirect = 'dashboard')
{
    if (!user_can($group_name)) {
        get_warning_message();
        redirect($redirect);
    }
}


function getCountries()
{
    return array(
        '' => '',
        "AF" => "Afghanistan",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AS" => "American Samoa",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctica",
        "AG" => "Antigua and Barbuda",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Australia",
        "AT" => "Austria",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas",
        "BH" => "Bahrain",
        "BD" => "Bangladesh",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Belgium",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BA" => "Bosnia and Herzegovina",
        "BW" => "Botswana",
        "BV" => "Bouvet Island",
        "BR" => "Brazil",
        "IO" => "British Indian Ocean Territory",
        "BN" => "Brunei Darussalam",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Cambodia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CV" => "Cape Verde",
        "KY" => "Cayman Islands",
        "CF" => "Central African Republic",
        "TD" => "Chad",
        "CL" => "Chile",
        "CN" => "China",
        "CX" => "Christmas Island",
        "CC" => "Cocos (Keeling) Islands",
        "CO" => "Colombia",
        "KM" => "Comoros",
        "CG" => "Congo",
        "CD" => "Congo, the Democratic Republic of the",
        "CK" => "Cook Islands",
        "CR" => "Costa Rica",
        "CI" => "Cote D'Ivoire",
        "HR" => "Croatia",
        "CU" => "Cuba",
        "CY" => "Cyprus",
        "CZ" => "Czech Republic",
        "DK" => "Denmark",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Dominican Republic",
        "EC" => "Ecuador",
        "EG" => "Egypt",
        "SV" => "El Salvador",
        "GQ" => "Equatorial Guinea",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FK" => "Falkland Islands (Malvinas)",
        "FO" => "Faroe Islands",
        "FJ" => "Fiji",
        "FI" => "Finland",
        "FR" => "France",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "TF" => "French Southern Territories",
        "GA" => "Gabon",
        "GM" => "Gambia",
        "GE" => "Georgia",
        "DE" => "Germany",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GR" => "Greece",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GN" => "Guinea",
        "GW" => "Guinea-Bissau",
        "GY" => "Guyana",
        "HT" => "Haiti",
        "HM" => "Heard Island and Mcdonald Islands",
        "VA" => "Holy See (Vatican City State)",
        "HN" => "Honduras",
        "HK" => "Hong Kong",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "India",
        "ID" => "Indonesia",
        "IR" => "Iran, Islamic Republic of",
        "IQ" => "Iraq",
        "IE" => "Ireland",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Japan",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KP" => "Korea, Democratic People's Republic of",
        "KR" => "Korea, Republic of",
        "KW" => "Kuwait",
        "KG" => "Kyrgyzstan",
        "LA" => "Lao People's Democratic Republic",
        "LV" => "Latvia",
        "LB" => "Lebanon",
        "LS" => "Lesotho",
        "LR" => "Liberia",
        "LY" => "Libyan Arab Jamahiriya",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MO" => "Macao",
        "MK" => "Macedonia, the Former Yugoslav Republic of",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "MX" => "Mexico",
        "FM" => "Micronesia, Federated States of",
        "MD" => "Moldova, Republic of",
        "MC" => "Monaco",
        "MN" => "Mongolia",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "MM" => "Myanmar",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "MP" => "Northern Mariana Islands",
        "NO" => "Norway",
        "OM" => "Oman",
        "PK" => "Pakistan",
        "PW" => "Palau",
        "PS" => "Palestinian Territory, Occupied",
        "PA" => "Panama",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn",
        "PL" => "Poland",
        "PT" => "Portugal",
        "PR" => "Puerto Rico",
        "QA" => "Qatar",
        "RE" => "Reunion",
        "RO" => "Romania",
        "RU" => "Russian Federation",
        "RW" => "Rwanda",
        "SH" => "Saint Helena",
        "KN" => "Saint Kitts and Nevis",
        "LC" => "Saint Lucia",
        "PM" => "Saint Pierre and Miquelon",
        "VC" => "Saint Vincent and the Grenadines",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "ST" => "Sao Tome and Principe",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "CS" => "Serbia and Montenegro",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SK" => "Slovakia",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia",
        "ZA" => "South Africa",
        "GS" => "South Georgia and the South Sandwich Islands",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SD" => "Sudan",
        "SR" => "Suriname",
        "SJ" => "Svalbard and Jan Mayen",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland",
        "SY" => "Syrian Arab Republic",
        "TW" => "Taiwan, Province of China",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania, United Republic of",
        "TH" => "Thailand",
        "TL" => "Timor-Leste",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinidad and Tobago",
        "TN" => "Tunisia",
        "TR" => "Turkey",
        "TM" => "Turkmenistan",
        "TC" => "Turks and Caicos Islands",
        "TV" => "Tuvalu",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "AE" => "United Arab Emirates",
        "GB" => "United Kingdom",
        "US" => "United States",
        "UM" => "United States Minor Outlying Islands",
        "UY" => "Uruguay",
        "UZ" => "Uzbekistan",
        "VU" => "Vanuatu",
        "VE" => "Venezuela",
        "VN" => "Viet Nam",
        "VG" => "Virgin Islands, British",
        "VI" => "Virgin Islands, U.s.",
        "WF" => "Wallis and Futuna",
        "EH" => "Western Sahara",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe"
    );
}

function get_add_edit_user_html_form($edit = false, $user = [], $roles, $options, $uploadPath, $memberRoleID)
{
    ?>
    <div class="row">
        <div class="col-md-10">
            <?php
            echo form_open_multipart();
            ?>
            <form>
                <div class="row">
                    <div class="form-group col-md-6">
                        <?php
                        echo form_label('Nom', 'last_name');
                        echo form_input([
                            'name' => "user[last_name]",
                            'class' => 'form-control',
                            'id' => 'last_name',
                            'required' => '',
                            'placeholder' => 'Nom',
                            'value' => set_value('user[last_name]', maybe_null_or_empty($user, 'last_name'), true)
                        ]);
                        echo get_form_error("user[last_name]");
                        //getFieldInfo('')
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php
                        echo form_label('Prénom(s)', 'first_name');
                        echo form_input([
                            'name' => "user[first_name]",
                            'class' => 'form-control',
                            'id' => 'first_name',
                            'rows' => 3, 'required' => '',
                            'placeholder' => 'Prénom(s)',
                            'value' => set_value('user[first_name]', maybe_null_or_empty($user, 'first_name'), false)
                        ]);
                        echo get_form_error("user[first_name]");
                        //getFieldInfo('')
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <?php
                        echo form_label('Adresse Email', 'email');
                        echo form_input([
                            'name' => "user[email]",
                            'class' => 'form-control',
                            'type' => 'email',
                            'id' => 'email',
                            'required' => '',
                            'placeholder' => 'Adresse Email',
                            'value' => set_value('user[email]', maybe_null_or_empty($user, 'email'), false)
                        ]);
                        echo get_form_error("user[email]");
                        //getFieldInfo('')
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php
                        echo form_label("Rôle(s) sur la plateforme", 'role');
                        echo form_dropdown('user[roles][]', $roles, set_value('user[roles][]', $edit ? maybe_null_or_empty($user, 'roles') : $memberRoleID), [
                            'class' => 'form-control select2',
                            'id' => 'role',
                            'required' => '',
                            'multiple' => '',
                        ]);
                        getFieldInfo('Sélectionner les rôles du nouvel utilisateur. Par défaut, ce sera <strong>Modérateur</strong>');
                        echo get_form_error("user[roles][]");
                        //getFieldInfo('')
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo form_label('Avatar utilisateur');
                    $data = [
                        'name' => 'user_photo',
                        'title' => 'Avatar utilisateur',
                    ];
                    if ($userPic = maybe_null_or_empty($options, 'siteDefaultAvatar', true)) {
                        $data['value'] = $uploadPath . $userPic;
                    }
                    if ($edit) {
                        if ($userPic = maybe_null_or_empty($user, 'user_photo', true)) {
                            $data['value'] = $uploadPath . $userPic;
                        }
                    }
                    get_form_upload($data, $extensions = 'png jpg jpeg', '1M', false);
                    getFieldInfo('Format : PNG|JPG Taille Max : 1M');
                    echo get_form_error('user_photo');
                    ?>
                </div>

                <?php getFormSubmit($edit ? 'Modifier' : 'Ajouter');
                if($edit){
                    ?>
                    <div class="clearfix mg-t-15">
                        <a href="<?= site_url('users') ?>"><i data-feather="arrow-left"></i> Retour à la liste</a>
                    </div>
                    <?php
                }
                ?>
                <?php echo form_close() ?>
            </form>

        </div>
    </div>
    <?php
}

function getUsersAddOrEditValidation($edit = false, $userID = '', $username = '', $memberRoleID)
{
    $ci =& get_instance();
    if ($user = $ci->input->post('user')) {
        setFormValidationRules([
            [
                'name' => 'user[last_name]',
                'label' => 'Nom',
                'rules' => 'trim|required|max_length[50]'
            ],
            [
                'name' => 'user[first_name]',
                'label' => 'Prénom(s)',
                'rules' => 'trim|required|max_length[50]'
            ],
            [
                'name' => 'user[email]',
                'label' => 'Email',
                'rules' => 'trim|required|max_length[100]' . $edit ? "callback_is_unique_on_update[users.email.$userID]" : 'is_unique[users.email]'
            ],
            [
                'name' => 'user[roles][]',
                'label' => "Role(s) du nouvel utilisateur",
                'rules' => 'required',
                [
                    'checking_roles', [$ci->user_model, 'checkpoint_do_role_exist']
                ]
            ],
        ]);
        if ($ci->form_validation->run()) {
            $uploadNames = [
                'user_photo',
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
            if (!in_array($memberRoleID, $user['roles'])) {
                //add member role in case, member role not in array
                $user['roles'][] = $memberRoleID;
            }
            $groupArray = $user['roles'];
            unset($user['roles']);
            if ($edit) {
                //on update
                $user['updated_by'] = get_current_user_id();
                $ci->user_model->update($userID, $user, $groupArray);
                get_success_message("Informations d'utilisateur mises à jour avec succès");
                redirect("users/edit/$username");
            } else {
                $user['added_by'] = get_current_user_id();
                if ($userData = $ci->user_model->insert($user, $groupArray)) {
                    $userData = (object)$userData;
                    $data = (object)$user;
                    $siteName = $ci->data['options']['siteName'];
                    $groupArray =  $this->ion_auth->get_users_groups($userData->id)->result();
                    $userRolesInString = '';
                    $temp=[];
                    if(!empty($groupArray)){
                        foreach ($groupArray as $role){
                            $temp[]=$role->description;
                        }
                    }
                    $userRolesInString = implode(', ', $temp);
                    //send user mail
                    sendActivationMail($data, $userData, $siteName);
                    sendNotificationMail("Bonjour Team <br><br> Un utilisateur vient d'être ajouté à la plateforme",
                        "Ajout d'un nouvel utilisateur",
                        "<tr>
<td> <strong>Nom</strong> </td>
<td> <strong>$data->first_name</strong> </td>
</tr>
<tr>
<td> <strong>Prénom(s)</strong> </td>
<td> <strong>$data->last_name</strong> </td>
</tr>
<tr>
<td> <strong>Roles</strong> </td>
<td> <strong>$userRolesInString</strong> </td>
</tr>

");
                    //TODO send mail to administrator
                    get_success_message("L'utilisateur a été créé avec succès <br> Un mail de confirmation a été envoyé à $userData->email", 10000);
                    redirect('users/edit/' . $ci->user_model->getUserFieldByID($userData->id, 'username'));
                }else {
                    get_error_message('Oops... Une erreur a été rencontrée');
                }
            }


        } else {
            get_error_message();
        }
    }
}

function sendActivationMail($data, $userData=[], $siteName){
    if(empty($userData)){
        $userData = $data;
    }
    $mail['title'] = "Finaliser inscription";
    $mail['message'] = "Bonjour Mr/Mme $data->last_name $data->first_name. <br> Vous avez été désignés pour administrer la plateforme de $siteName. 
Veuillez finaliser votre inscription en cliquant sur le bouton ci-dessous";
    $mail['btnLabel'] = "Finaliser inscription";
    $mail['btnLink'] = site_url('login/activate/') . "$userData->id/$userData->activation";
    $mail['destination'] = $userData->email;
    sendMail($siteName . ' <no-reply@akasigroup.com>', $mail);
}