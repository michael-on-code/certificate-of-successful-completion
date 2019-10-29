<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 07/10/2019
 * Time: 15:42
 */

function get_add_edit_certificate_html_form($edit = false, $certificate = [], $activity_areas = [], $countries, $affiliateCompanies, $currencies, $uploadPath)
{
    echo form_open_multipart();
    echo form_hidden('certificate[currency]', set_value('certificate[currency]', maybe_null_or_empty($certificate, 'currency') ? maybe_null_or_empty($certificate, 'currency') : $currencies[0]))
    ?>
    <style>
        .dropify-wrapper {
            height: 160px;
        }
    </style>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo form_label('Désignation', 'title', [
                    'class' => 'd-block'
                ]);
                echo form_input([
                    'name' => 'certificate[title]',
                    'placeholder' => 'Désignation de la mission',
                    'class' => 'form-control',
                    'required' => '',
                    'id' => 'title',
                    'value' => set_value('certificate[title]', maybe_null_or_empty($certificate, 'title'), false)
                ]);
                echo get_form_error('certificate[title]')
                ?>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Secteur d'activité", 'activity_area_id', [
                        'class' => 'd-block'
                    ]);
                    echo form_dropdown('certificate[activity_area_id]', $activity_areas, set_value('certificate[activity_area_id]', maybe_null_or_empty($certificate, 'activity_area_id'), false), [
                        'class' => 'form-control select2',
                        'id' => 'activity_area_id',
                        'required' => '',
                    ]);
                    echo get_form_error('certificate[activity_area_id]')
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <?php
                    echo form_label("N° Interne du dossier", 'internal_file_number', [
                        'class' => 'd-block'
                    ]);
                    echo form_input([
                        'name' => 'certificate[internal_file_number]',
                        'class' => 'form-control',
                        'required' => '',
                        'placeholder' => 'N° Interne du dossier',
                        'id' => 'internal_file_number',
                        'value' => set_value('certificate[internal_file_number]', maybe_null_or_empty($certificate, 'internal_file_number'), false)
                    ]);
                    echo get_form_error('certificate[internal_file_number]');
                    ?>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Partenaire / associé", 'project_partner', [
                        'class' => 'd-block'
                    ]);
                    ?>
                    <?php
                    echo form_input([
                        'name' => 'certificate[project_partner]',
                        'class' => 'form-control my-autocomplete',
                        //'required' => '',
                        'placeholder' => "Partenaire ou associé",
                        'id' => 'project_partner',
                        'data-target' => 'project_partner',
                        'value' => set_value('certificate[project_partner]', maybe_null_or_empty($certificate, 'project_partner') ? maybe_null_or_empty($certificate, 'project_partner') : 'Néant', false)
                    ]);
                    echo get_form_error('certificate[project_partner]');
                    getFieldInfo('Autocomplétion disponible');
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Date de signature du contrat", 'signature_date', [
                        'class' => 'd-block'
                    ]);
                    ?>
                    <?php
                    echo form_input([
                        'name' => 'certificate[signature_date]',
                        'class' => 'form-control datepicker',
                        'required' => '',
                        'placeholder' => 'Date de signature du contrat',
                        'id' => 'signature_date',
                        'value' => set_value('certificate[signature_date]', convert_date_to_french(maybe_null_or_empty($certificate, 'signature_date')), false)
                    ]);
                    echo get_form_error('certificate[signature_date]');
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Sous Secteur d'activité", 'sub_activity_area', [
                        'class' => 'd-block'
                    ]);
                    echo form_input([
                        'name' => 'certificate[sub_activity_area]',
                        'class' => 'form-control my-autocomplete',
                        'data-target' => 'sub_activity_area',
                        'required' => '',
                        'placeholder' => "Sous Secteur d'activité",
                        'id' => 'sub_activity_area',
                        'value' => set_value('certificate[sub_activity_area]', maybe_null_or_empty($certificate, 'sub_activity_area'), false)
                    ]);
                    echo get_form_error('certificate[sub_activity_area]');
                    getFieldInfo('Autocomplétion disponible');
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Filiale ayant éxécuté", 'affiliate_company', [
                        'class' => 'd-block'
                    ]);
                    ?>
                    <?php
                    echo form_dropdown('certificate[affiliate_company_id]', $affiliateCompanies, set_value('certificate[affiliate_company_id]', maybe_null_or_empty($certificate, 'affiliate_company_id'), false), [
                        'class' => 'form-control select2',
                        'id' => 'affiliate_company',
                        'required' => ''
                    ]);
                    echo form_error('certificate[affiliate_company_id]')
                    ?>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Source de financement", 'funding_source', [
                        'class' => 'd-block'
                    ]);
                    ?>
                    <?php
                    echo form_input([
                        'name' => 'certificate[funding_source]',
                        'class' => 'form-control my-autocomplete',
                        //'required' => '',
                        'placeholder' => "Source de financement",
                        'id' => 'funding_source',
                        'data-target' => 'funding_source',
                        'value' => set_value('certificate[funding_source]', maybe_null_or_empty($certificate, 'funding_source'), true)
                    ]);
                    echo get_form_error('certificate[funding_source]');
                    getFieldInfo('Autocomplétion disponible');
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <?= form_label("Rôle de l'entreprise") ?>
                    <?= form_input([
                        'name' => 'certificate[role]',
                        'class' => 'form-control',
                        'placeholder' => "Rôle de l'entreprise",
                        //'required' => '',
                        'value' => set_value('certificate[role]', maybe_null_or_empty($certificate, 'role'), false),
                    ]) ?>
                    <?= get_form_error('certificate[role]') ?>
                </div>
            </div>


            <div class="form-group">
                <?= form_label("Détail des tâches exécutées") ?>
                <?= form_textarea([
                    'name' => 'certificate[detailed_tasks]',
                    'class' => 'my-summernote',
                    'required' => '',
                    'value' => set_value('certificate[detailed_tasks]', maybe_null_or_empty($certificate, 'detailed_tasks'), false),
                ]) ?>
                <?= get_form_error('certificate[detailed_tasks]') ?>
            </div>


        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Nom Autorité contractante", 'customer_name', [
                        'class' => 'd-block'
                    ]);
                    ?>
                    <?php
                    echo form_input([
                        'name' => 'certificate[customer_name]',
                        'class' => 'form-control my-autocomplete',
                        'required' => '',
                        'placeholder' => "Autorité contractante",
                        'id' => 'customer_name',
                        'data-target' => 'customer_name',
                        'value' => set_value('certificate[customer_name]', maybe_null_or_empty($certificate, 'customer_name'), false)
                    ]);
                    echo get_form_error('certificate[customer_name]');
                    getFieldInfo('Autocomplétion disponible');
                    ?>
                </div>

                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Adresse autorité contractante", 'customer_adress', [
                        'class' => 'd-block'
                    ]);
                    ?>
                    <?php
                    echo form_input([
                        'name' => 'certificate[customer_adress]',
                        'class' => 'form-control ',
                        'required' => '',
                        'placeholder' => "Adresse de l'autorité contractante",
                        'id' => 'customer_adress',
                        'value' => set_value('certificate[customer_adress]', maybe_null_or_empty($certificate, 'customer_adress'), false)
                    ]);
                    echo get_form_error('certificate[customer_adress]');
                    ?>
                </div>

            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Montant prestation", 'total_amount', [
                        'class' => 'd-block'
                    ]);
                    ?>
                    <div class="input-group">
                        <?php
                        getCurrencyInputGroupHTML($currencies, maybe_null_or_empty($certificate, 'currency'));
                        echo form_input([
                            'name' => 'certificate[total_amount]',
                            'class' => 'form-control currencyInput',
                            'required' => '',
                            'placeholder' => "Montant de la prestation",
                            'id' => 'total_amount',
                            'value' => set_value('certificate[total_amount]', maybe_null_or_empty($certificate, 'total_amount'), false)
                        ]);
                        echo get_form_error('certificate[total_amount]');
                        ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Montant payé à l'entreprise", 'amount_received', [
                        'class' => 'd-block'
                    ]);
                    ?>
                    <div class="input-group">
                        <?php
                        getCurrencyInputGroupHTML($currencies, maybe_null_or_empty($certificate, 'currency'));
                        echo form_input([
                            'name' => 'certificate[amount_received]',
                            'class' => 'form-control currencyInput',
                            'required' => '',
                            'placeholder' => "Montant payé à l'entreprise",
                            'id' => 'amount_received',
                            'value' => set_value('certificate[amount_received]', maybe_null_or_empty($certificate, 'amount_received'), false)
                        ]);
                        echo get_form_error('certificate[amount_received]');
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Date d'attribution/Notification du Marché", 'project_awarded_date', [
                        'class' => 'd-block cutter',
                        'data-toggle' => 'tooltip',
                        'title' => "Date d'attribution/Notification du Marché"
                    ]);
                    ?>
                    <?php
                    echo form_input([
                        'name' => 'certificate[project_awarded_date]',
                        'class' => 'form-control datepicker',
                        'required' => '',
                        'placeholder' => "Date d'attribution/Notification du Marché",
                        'id' => 'project_awarded_date',
                        'value' => set_value('certificate[project_awarded_date]', convert_date_to_french(maybe_null_or_empty($certificate, 'project_awarded_date')), false)
                    ]);
                    echo get_form_error('certificate[project_awarded_date]');
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Part", 'akasi_share', [
                        'class' => 'd-block'
                    ]);
                    ?>
                    <div class="input-group">
                        <?php
                        echo form_input([
                            'name' => 'certificate[akasi_share]',
                            'class' => 'form-control number-input',
                            'required' => '',
                            //'type' => 'number',
                            'placeholder' => "Part",
                            'id' => 'akasi_share',
                            'value' => set_value('certificate[akasi_share]', maybe_null_or_empty($certificate, 'akasi_share'), false)
                        ]);
                        echo get_form_error('certificate[akasi_share]');
                        ?>
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Pays d’exécution du projet", 'country', [
                        'class' => 'd-block'
                    ]);
                    ?>
                    <?php
                    echo form_dropdown('certificate[country][]', $countries, set_value('certificate[country][]', maybe_null_or_empty($certificate, 'country'), false), [
                        'class' => 'form-control select2',
                        'id' => 'country',
                        'required' => '',
                        'multiple' => '',
                    ]);
                    echo form_error('certificate[country][]')
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <?php
                    echo form_label("Ville", 'city', [
                        'class' => 'd-block'
                    ]);
                    ?>
                    <?php
                    echo form_input([
                        'name' => 'certificate[city]',
                        'class' => 'form-control my-autocomplete',
                        'required' => '',
                        'placeholder' => "Ville",
                        'id' => 'city',
                        'data-target' => 'city',
                        'value' => set_value('certificate[city]', maybe_null_or_empty($certificate, 'city'), false)
                    ]);
                    echo get_form_error('certificate[city]');
                    getFieldInfo('Autocomplétion disponible');
                    ?>
                </div>


            </div>
            <div class="row">

                <div class="col-md-12">
                    <?php
                    echo form_label("Période d'éxécution du projet", 'dateFrom', [
                        'class' => 'd-block'
                    ]);
                    ?>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <?php
                            echo form_input([
                                'name' => 'certificate[project_execution_start_date]',
                                'class' => 'form-control dateRanger',
                                //'required' => '',
                                'placeholder' => "Début",
                                'id' => 'dateFrom',
                                'value' => set_value('certificate[project_execution_start_date]', convert_date_to_french(maybe_null_or_empty($certificate, 'project_execution_start_date')), false)
                            ]);
                            echo get_form_error('certificate[project_execution_start_date]');
                            getFieldInfo("Début période d'exécution");
                            ?>
                        </div>
                        <div class="form-group col-sm-6">
                            <?php
                            echo form_input([
                                'name' => 'certificate[project_execution_end_date]',
                                'class' => 'form-control dateRanger',
                                //'required' => '',
                                'placeholder' => "Fin",
                                'id' => 'dateTo',
                                'value' => set_value('certificate[project_execution_end_date]', convert_date_to_french(maybe_null_or_empty($certificate, 'project_execution_end_date')), false)
                            ]);
                            echo get_form_error('certificate[project_execution_end_date]');
                            getFieldInfo("Fin période d'exécution");
                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <?= form_label("Description du marché") ?>
                <?= form_textarea([
                    'name' => 'certificate[project_description]',
                    'class' => 'my-summernote',
                    'required' => '',
                    'value' => set_value('certificate[project_description]', maybe_null_or_empty($certificate, 'project_description'), false),
                ]) ?>
                <?= get_form_error('certificate[project_description]') ?>
            </div>


        </div>


    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo form_label('Attacher le PV de réception');
            $file = set_value('certificate[minuteFile]',maybe_null_or_empty($certificate, 'minuteFile', true));
            ?>
            <a class="my-file-preview-btn" data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
               data-placement="top" title="Visualiser le PV de réception" target="_blank"
               href="<?= $file ?  $uploadPath . $file : '#' ?>"> <i data-feather='external-link' style='width: 15px'></i></a>
            <?php
            $data = [
                'attributes' => [
                    'data-target' => 'minuteFile',
                    'data-target-name' => 'certificate[minuteFile]',
                ],
                'name' => '',
                'title' => 'Attacher le PV de réception',
            ];
            if ($file) {
                $data['value'] = $uploadPath . $file;
            } else {
                $data['value'] = '';
            }
            echo form_hidden('certificate[minuteFile]', set_value('certificate[minuteFile]', $file));
            get_form_upload($data, $extensions = 'jpg jpeg png pdf doc docx', '5M', false, 'auto-upload');
            echo get_form_error('certificate[minuteFile]');
            getFieldInfo('Format : JPG|PNG|JPEG|PDF|DOC|DOCX Taille Max : 5M');
            ?>
        </div>
        <div class="form-group col-md-4">
            <?php echo form_label("Attacher la Copie de l'ABE ");
            $file = set_value('certificate[certificateFile]', maybe_null_or_empty($certificate, 'certificateFile', true));
            ?>
            <a class="my-file-preview-btn" data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
               data-placement="top" title="Visualiser la copie de l'ABE" target="_blank"
               href="<?= $file ?  $uploadPath . $file : '#' ?>"> <i data-feather='external-link' style='width: 15px'></i></a>
            <?php
            $data = [
                'name' => '',
                'attributes' => [
                    'data-target' => 'certificateFile',
                    'data-target-name' => 'certificate[certificateFile]',
                ],
                'title' => "Attacher la Copie de l'ABE",
            ];
            if ($file) {
                $data['value'] = $uploadPath . $file;
            } else {
                $data['value'] ='';
            }
            echo form_hidden('certificate[certificateFile]', set_value('certificate[certificateFile]', $file));
            get_form_upload($data, $extensions = 'jpg jpeg png pdf doc docx', '5M', true, 'auto-upload');
            echo get_form_error('certificate[certificateFile]');
            getFieldInfo('Format : JPG|PNG|JPEG|PDF|DOC|DOCX Taille Max : 5M');
            ?>
        </div>
        <div class="form-group col-md-4">
            <?php echo form_label('Attacher le Contrat');
            $file = set_value('certificate[contractFile]',maybe_null_or_empty($certificate, 'contractFile', true));
            ?>
            <a class="my-file-preview-btn" data-toggle="tooltip" <?=  $file ? '' : 'style="display:none;"' ?>
               data-placement="top" title="Visualiser le contrat" target="_blank"
               href="<?= $file ?  $uploadPath . $file : '#' ?>"> <i data-feather='external-link' style='width: 15px'></i></a>
            <?php
            $data = [
                'name' => '',
                'attributes' => [
                    'data-target' => 'contractFile',
                    'data-target-name' => 'certificate[contractFile]',
                ],
                'title' => 'Attacher le Contrat',
            ];
            if ($file) {
                $data['value'] = $uploadPath . $file;
            } else {
                $data['value'] = '';
            }
            echo form_hidden('certificate[contractFile]', set_value('certificate[contractFile]', $file));
            get_form_upload($data, $extensions = 'jpg jpeg png pdf doc docx', '5M', false, 'auto-upload');
            echo get_form_error('contractFile');
            getFieldInfo('Format : JPG|PNG|JPEG|PDF|DOC|DOCX Taille Max : 5M');

            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 ">
            <?php
            if ($edit) {
                ?>
                <div class="clearfix mg-t-15 float-left">
                    <a href="<?= site_url('certificate') ?>"><i data-feather="arrow-left"></i> Retour à la liste</a>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="col-sm-6">
            <?php getFormSubmit($edit ? 'Modifier' : 'Ajouter', 'float-right');

            ?>
        </div>
    </div>
    <?php
    echo form_close();
}

function getCurrencyInputGroupHTML($currencies, $currency = '')
{

    if ($currency == '' || !$currency) {
        $currency = $currencies[0];
    }
    $actualCurrencyKey = array_keys($currencies, $currency)[0];
    ?>
    <div class="input-group-prepend">
        <?php
        ?>
        <button class="btn btn-outline-light dropdown-toggle" type="button" data-toggle="dropdown"
                aria-haspopup="false" aria-expanded="false"><?= $currency ?>
        </button>
        <?php
        unset($currencies[$actualCurrencyKey]);
        ?>
        <div class="dropdown-menu tx-13 currency-dropdown">
            <?php
            foreach ($currencies as $key => $currency) {
                ?>
                <a class="dropdown-item" href="#"><?= $currency ?></a>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}

function getCertificationAddOrEditValidation($edit = false, $certificateID = '', $certificateSlug = '')
{
    $ci =& get_instance();
    if ($ci->input->post('certificate')) {
        setFormValidationRules([
            [
                'name' => 'certificate[title]',
                'label' => 'Désignation de la mission',
                'rules' => 'trim|required'
            ],
            [
                'name' => 'certificate[activity_area_id]',
                'label' => "Secteur d'activité",
                'rules' => 'trim|required|is_natural_no_zero|max_length[3]'
            ],
            [
                'name' => 'certificate[sub_activity_area]',
                'label' => "Sous Secteur d'activité",
                'rules' => 'trim|required|max_length[100]'
            ],
            [
                'name' => 'certificate[internal_file_number]',
                'label' => "N° Interne du dossier",
                'rules' => [
                    'trim', 'required', /*[$ci->option_model, 'removeSpacesAndConvertToInt'],*/
                    'max_length[25]', $edit ? "callback_is_unique_on_update[abe.internal_file_number.$certificateID]" : 'is_unique[abe.internal_file_number]'
                ],
            ], [
                'name' => 'certificate[signature_date]',
                'label' => "Date de signature du contrat",
                'rules' => 'trim|required|max_length[10]'
            ],
            [
                'name' => 'certificate[project_awarded_date]',
                'label' => "Date d'attribution/Notification du Marché",
                'rules' => 'trim|required|max_length[10]'
            ],
            [
                'name' => 'certificate[project_execution_start_date]',
                'label' => "Début période d'éxécution",
                'rules' => 'trim|max_length[10]'
            ],
            [
                'name' => 'certificate[project_execution_end_date]',
                'label' => "Fin période d'éxécution",
                'rules' => 'trim|max_length[10]'
            ],
            [
                'name' => 'certificate[customer_name]',
                'label' => "Autorité contractante",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'certificate[country][]',
                'label' => "Pays d’exécution du projet",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'certificate[city]',
                'label' => "Ville",
                'rules' => 'trim|required|max_length[35]'
            ],
            [
                'name' => 'certificate[customer_adress]',
                'label' => "Adresse de l'autorité contractante",
                'rules' => 'trim|required'
            ], [
                'name' => 'certificate[currency]',
                'label' => "Devise",
                'rules' => 'trim|required|in_list[' . implode(',', $ci->data['currencies']) . ']'
            ],
            [
                'name' => 'certificate[total_amount]',
                'label' => "Montant de la prestation",
                'rules' => [
                    'trim', 'required', [$ci->option_model, 'removeSpacesAndConvertToInt'], 'is_natural_no_zero',
                    'max_length[20]'
                ],
            ],
            [
                'name' => 'certificate[amount_received]',
                'label' => "Montant payé à l'entreprise",
                'rules' => [
                    'trim', 'required', [$ci->option_model, 'removeSpacesAndConvertToInt'], 'is_natural_no_zero',
                    'max_length[20]'
                ],
            ],
            [
                'name' => 'certificate[funding_source]',
                'label' => "Source de financement",
                'rules' => 'trim|max_length[100]'
            ],
            [
                'name' => 'certificate[akasi_share]',
                'label' => "Part",
                'rules' => [
                    'trim', 'required', [$ci->option_model, 'removeSpacesAndConvertToInt'], 'is_natural_no_zero',
                    'less_than_equal_to[100]'
                ],
            ],
            [
                'name' => 'certificate[affiliate_company_id]',
                'label' => "Filiale ayant éxécuté",
                'rules' => 'trim|required|is_natural_no_zero'
            ],
            [
                'name' => 'certificate[project_partner]',
                'label' => "Partenaire / associé",
                'rules' => 'trim|max_length[100]'
            ],
            [
                'name' => 'certificate[role]',
                'label' => "Rôle de l'entreprise",
                'rules' => 'trim'
            ],
            [
                'name' => 'certificate[project_description]',
                'label' => "Description du marché",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'certificate[detailed_tasks]',
                'label' => "Détail des tâches exécutées",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'certificate[minuteFile]',
                'label' => "PV de réception",
                'rules' => 'trim'
            ],
            [
                'name' => 'certificate[certificateFile]',
                'label' => "Copie de l'ABE",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'certificate[contractFile]',
                'label' => "Contrat",
                'rules' => 'trim'
            ],



        ]);
        if ($ci->form_validation->run()) {
            $certificate = $ci->input->post('certificate');
            //var_dump($certificate);exit;
            if (maybe_null_or_empty($certificate, 'signature_date', true)) {
                $certificate['signature_date'] = convert_date_to_english($certificate['signature_date']);
            }
            if (maybe_null_or_empty($certificate, 'project_awarded_date', true)) {
                $certificate['project_awarded_date'] = convert_date_to_english($certificate['project_awarded_date']);
            }
            if (maybe_null_or_empty($certificate, 'project_execution_start_date', true)) {
                $certificate['project_execution_start_date'] = convert_date_to_english($certificate['project_execution_start_date']);
            }
            if (maybe_null_or_empty($certificate, 'project_execution_end_date', true)) {
                $certificate['project_execution_end_date'] = convert_date_to_english($certificate['project_execution_end_date']);
            }
            $ci->certificate_model->insertOrUpdate($certificate, $certificateID);
            /*if ($certificateSlug == '') {
                $certificateSlug = $ci->certificate_model->getCertificateFieldByID($certificateID, 'slug');
            }*/
            get_success_message($edit ? 'ABE modifiée avec succès' : 'ABE ajoutée avec succès');
            //redirect("certificate/edit/$certificateSlug");
            redirect("certificate");
        } else {
            get_error_message();
        }
    }
}

function downloadFiles(array $filesToBeDownloaded)
{
    $zip = new ZipArchive();
    $filename = "fichier-" . uniqid() . ".zip";

    if ($zip->open($filename, ZipArchive::CREATE) !== TRUE) {
        exit("cannot open <$filename>\n");
    }

    $dir = 'uploads/';

    // Create zip
    createZip($zip, $dir, $filesToBeDownloaded);

    $zip->close();

    if (file_exists($filename)) {
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Content-Length: ' . filesize($filename));
        flush();
        readfile($filename);
        unlink($filename);
    } else {
        get_error_message("Telechargement échoué <br> Une erreur s'est produite");
        redirect('certificate');
    }
}

// Create zip
function createZip($zip, $dir, array $filesWithExtensions)
{
    if (is_dir($dir) && !empty($filesWithExtensions)) {

        if ($dh = opendir($dir)) {
            foreach ($filesWithExtensions as $file) {
                if (is_file($dir . $file)) {
                    if ($file != '' && $file != '.' && $file != '..') {

                        $zip->addFile($dir . $file, $file);
                    }
                }
            }

            /*while (($file = readdir($dh)) !== false){

                // If file
                if (is_file($dir.$file)) {
                    if($file != '' && $file != '.' && $file != '..'){

                        $zip->addFile($dir.$file);
                    }
                }else{
                    // If directory
                    if(is_dir($dir.$file) ){

                        if($file != '' && $file != '.' && $file != '..'){

                            // Add empty directory
                            $zip->addEmptyDir($dir.$file);

                            $folder = $dir.$file.'/';

                            // Read data of the folder
                            createZip($zip,$folder);
                        }
                    }

                }

            }*/
            closedir($dh);
        }
    }
}

function getGlobalPreview($certificate, $index, $uploadPath, $countries)
{
    $signature_date = convert_date_to_french($certificate->signature_date);
    $startProjectExcution = convert_date_to_french($certificate->project_execution_start_date);
    $endProjectExcution = convert_date_to_french($certificate->project_execution_end_date);
    //$country = $countries[$certificate->country];
    $projectAwardedDate = convert_date_to_french($certificate->project_awarded_date);
    $createdAt = convert_date_to_french($certificate->created_at);
    $preview = "
    <div id='globalPreviewContent$index' class='my-preview-content w-100'>

    <div class='row'>
        <div class='col-md-12'>
            <div class='divider-text'>Désignation</div>
            <div class='innerContent'>
                $certificate->title
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-6'>
            <div class='row'>
                <div class='col-md-6'>
                    <div class='divider-text'>N° Interne</div>
                    <div class='innerContent'>
                        $certificate->internal_file_number
                    </div>
                    <div class='divider-text'>Date de signature du contrat</div>
                    <div class='innerContent'>
                        $signature_date
                    </div>
                    <div class='divider-text'>Montant total</div>
                    <div class='innerContent'>
                        <span class='is-currency'>$certificate->total_amount</span> $certificate->currency
                    </div>
                    <div class='divider-text'>Montant payé</div>
                    <div class='innerContent'>
                        <span class='is-currency'>$certificate->amount_received</span> $certificate->currency
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='divider-text'>Secteur d'activité</div>
                    <div class='innerContent'>
                        $certificate->activity_area_name
                    </div>
                    <div class='divider-text'>Sous Secteur d'activité</div>
                    <div class='innerContent'>
                        $certificate->sub_activity_area
                    </div>
                    <div class='divider-text'>Autorité contractante</div>
                    <div class='innerContent'>
                        $certificate->customer_name
                    </div>

                    <div class='divider-text'>ABE ajoutée le</div>
                    <div class='innerContent'>
                        $createdAt
                    </div>

                </div>
            </div>
            <div class='row'>

                <div class='col-md-12'>
                    <div class='divider-text'>Partenaire / Associé</div>
                    <div class='innerContent'>
                        $certificate->project_partner
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='divider-text'>Adresse de l'autorité contractante</div>
                    <div class='innerContent'>
                        $certificate->customer_adress
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='divider-text'>Description du projet</div>
                    <div class='innerContent'>
                        $certificate->project_description
                    </div>
                </div>
                 <div class='col-md-12'>
                    <div class='divider-text'>PV de réception</div>
                    <div class='innerContent'>";
    if ($minuteFile = maybe_null_or_empty($certificate, 'minuteFile', true)) {
        $preview .= "
                    <a target='_blank' href='$uploadPath$minuteFile'>$minuteFile</a>
                    ";
    }
    $preview .= "</div>
                </div>
                
            </div>
        </div>
        <div class='col-md-6'>
            <div class='row'>
                <div class='col-md-6'>
                    <div class='divider-text'>Début Période Execution</div>
                    <div class='innerContent'>
                        $startProjectExcution
                    </div>

                    <div class='divider-text'>Pays d’exécution du projet</div>
                    <div class='innerContent'>
                        $certificate->country
                    </div>
                    <div class='divider-text'>Part</div>
                    <div class='innerContent'>
                        $certificate->akasi_share %
                    </div>
                    
                    <div class='divider-text'>Filiale</div>
                    <div class='innerContent'>
                        $certificate->affiliate_company_name
                    </div>

                </div>
                <div class='col-md-6'>
                    <div class='divider-text'>Fin Période Execution</div>
                    <div class='innerContent'>
                        $endProjectExcution
                    </div>
                    <div class='divider-text'>Ville</div>
                    <div class='innerContent'>
                        $certificate->city
                    </div>
                    
                    <div class='divider-text'>Source financement</div>
                    <div class='innerContent'>
                        $certificate->funding_source
                    </div>
                    <div class='divider-text'>Date d'attribution/Notification du Marché</div>
                    <div class='innerContent'>
                        $projectAwardedDate
                    </div>

                </div>

            </div>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='divider-text'>Rôle</div>
                    <div class='innerContent'>
                        $certificate->role
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='divider-text'>Tâches détaillées</div>
                    <div class='innerContent'>
                        $certificate->detailed_tasks
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='divider-text'>Copie ABE</div>
                    <div class='innerContent'>";
    if ($certificateFile = maybe_null_or_empty($certificate, 'certificateFile', true)) {
        $preview .= "
                    <a target='_blank' href='$uploadPath$certificateFile'>$certificateFile</a>
                    ";
    }
    $preview .= "</div>
                </div> 
                <div class='col-md-12'>
                    <div class='divider-text'>Contrat</div>
                    <div class='innerContent'>";
    if ($contractFile = maybe_null_or_empty($certificate, 'contractFile', true)) {
        $preview .= "
                    <a target='_blank' href='$uploadPath$contractFile'>$contractFile</a>
                    ";
    }
    $preview .= "</div>
                </div>
                
                
                </div>
        </div>

    </div>
</div>
    ";
    return $preview;

}

function getMinifiedView($certificate, $index, $uploadPath, $countries)
{
    $preview = "<div id='popoverContent$index' class='my-popover-content'>
        <table style='width: 100%;' class='table table-bordered table-striped'>
            <tr>
                <td class='headies'>N° Interne</td>
                <td>$certificate->internal_file_number</td>
            </tr>
            <tr>
                <td class='headies'>Désignation</td>
                <td>$certificate->title</td>
            </tr>
            <tr>
                <td class='headies'>Secteur</td>
                <td>$certificate->activity_area_name </td>
            </tr>
            <tr>
                <td class='headies'>Sous Secteur d'activité</td>
                <td>$certificate->sub_activity_area </td>
            </tr>
            <tr>
                <td class='headies'>Date de signature du contrat</td>
                <td>" . convert_date_to_french($certificate->signature_date) . "</td>
            </tr>
            <tr>
                <td class='headies'>Autorité contractante</td>
                <td>$certificate->customer_name </td>
            </tr>
            <tr>
                <td class='headies'>Montant total</td>
                <td><span class='is-currency'>$certificate->total_amount</span> $certificate->currency</td>
            </tr>
            <tr>
                <td class='headies'>Montant payé</td>
                <td><span class='is-currency'>$certificate->amount_received</span> $certificate->currency</td>
            </tr>
            <tr>
                <td class='headies'>Part</td>
                <td>$certificate->akasi_share %</td>
            </tr>
            <tr>
                <td class='headies'>Pays d’exécution du projet</td>
                <td>$certificate->country</td>
            </tr>
            <tr>
                <td class='headies'>Ville</td>
                <td>$certificate->city </td>
            </tr>
            <tr>
                <td class='headies'>Filiale</td>
                <td>$certificate->affiliate_company_name </td>
            </tr>
            
            ";
    if ($certificateFile = maybe_null_or_empty($certificate, 'certificateFile', true)) {
        $preview .= "
        <tr>
                <td class='headies'>Copie ABE</td>
                <td> <a target='_blank' href='$uploadPath$certificateFile'>$certificateFile</a> </td>
            </tr>
        ";
    }
    if ($minuteFile = maybe_null_or_empty($certificate, 'minuteFile', true)) {
        $preview .= "
        <tr>
                <td class='headies'>PV de réception</td>
                <td> <a target='_blank' href='$uploadPath$minuteFile'>$minuteFile</a> </td>
            </tr>
        ";
    }
    if ($contractFile = maybe_null_or_empty($certificate, 'contractFile', true)) {
        $preview .= "
        <tr>
                <td class='headies'>Contrat</td>
                <td> <a target='_blank' href='$uploadPath$contractFile'>$contractFile</a> </td>
            </tr>
        ";
    }

    $preview .= "
        </table>
    </div>";
    return $preview;
}