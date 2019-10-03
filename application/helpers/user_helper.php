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
function getUserPhotoUrl($picFileName=''){
    if($picFileName==''){
        $CI = &get_instance();
        return base_url("uploads/").maybe_null_or_empty($CI->data['options'], 'siteDefaultAvatar');
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
        for ($i = 1; $i < 7; $i++) {
            foreach ($menuss as $menu) {
                if ($menu['order'] == $i)
                    $menus[] = $menu;
            }
        }
        return $menus;
    }
}

function getUserRolesInString(array $userRoles){
    $temp=[];
    if(!empty($userRoles)){
        foreach ($userRoles as $role){
            $temp[]=maybe_null_or_empty($role, 'description');
        }
    }
    return implode(', ', $temp);
}

function get_menu_by_group($group)
{
    //$ci = &get_instance();
    $ci = & get_instance();
    switch ($group) {
        case 'admin':
            return array(
                array(
                    'title' => 'Paramètres',
                    'url' => site_url('settings'),
                    'order' => 4,
                    'icon'=>'settings'
                ),
                array(
                    'url' => site_url('users'),
                    'title' => 'Utilisateurs',
                    'order' => 3,
                    'icon'=>'users',
                    'submenus'=>[
                        [
                            'title'=>'Liste',
                            'url'=>site_url('users')
                        ],
                        [
                            'title'=>'Ajouter',
                            'url'=>site_url('users/add')
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
                    'order' => 5,
                    'icon'=>'user'
                ),array(
                    'title' => 'Déconnexion',
                    'url' => site_url('logout'),
                    'order' => 6,
                    'icon'=>'log-out'
                ),array(
                    'title' => 'Attestations',
                    'url' => site_url('abe'),
                    'order' => 2,
                    'icon'=>'layers',
                    'submenus'=>[
                        [
                            'title'=>'Liste',
                            'url'=>site_url('abe')
                        ],
                        [
                            'title'=>'Ajouter',
                            'url'=>site_url('abe/add')
                        ],
                    ]
                ),
                array(
                    'url' => site_url('dashboard'),
                    'title' => 'Tableau de bord',
                    'order' => 1,
                    'icon'=>'layout'
                ),
            );
    }
}

function redirect_if_not_logged_in($to='login')
{
    $CI = &get_instance();
    if (!$CI->ion_auth->logged_in()) {
        get_info_message('Veuillez vous authentifier');
        redirect($to);
    }

}
function redirect_if_is_banned($to='web-login/logout')
{
    $CI = &get_instance();
    //var_dump($CI->data['user']);exit;
    if ($CI->data['user']->active ==2 || $CI->data['user']->active ==0) {
        get_error_message("Vous avez été banni. <br> Veuillez contacter l'administrateur");
        redirect($to);
    }

}


function redirect_if_logged_in($to='dashboard')
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
