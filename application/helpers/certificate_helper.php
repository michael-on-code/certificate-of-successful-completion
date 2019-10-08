<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 07/10/2019
 * Time: 15:42
 */

function get_add_edit_certificate_html_form($edit=false, $certifcate=[], $activity_areas=[], $countries=[]){
     echo form_open() ?>
    <div class="form-group">
        <?php echo form_label('Désignation', 'title', [
            'class' => 'd-block'
        ]);
        echo form_input([
            'name' => 'certificate[title]',
            'placeholder' => 'Désignation de la mission',
            'class'=>'form-control',
            'required'=>'',
            'id'=>'title',
            'value'=>set_value('certificate[title]', maybe_null_or_empty($certifcate, 'title'), true)
        ]);
        echo get_form_error('certificate[title]')
        ?>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php
            echo form_label("Secteur d'activité", 'activity_area_id', [
                'class' => 'd-block'
            ]);
            echo form_dropdown('certificate[activity_area_id]', $activity_areas, maybe_null_or_empty($certifcate, 'activity_area_id'), [
                'class'=>'form-control select2',
                'id'=>'activity_area_id'
            ]);
            echo get_form_error('certificate[activity_area_id]')
            ?>
        </div>
        <div class="form-group col-md-4">
            <?php
            echo form_label("Sous Secteur d'activité", 'sub_activity_area', [
                'class' => 'd-block'
            ]);
            echo form_input([
                'name'=>'certificate[sub_activity_area]',
                'class'=>'form-control my-autocomplete',
                'data-target'=>'sub_activity_areas',
                'required'=>'',
                'placeholder'=>"Sous Secteur d'activité",
                'id'=>'sub_activity_area',
                'value'=>set_value('certificate[sub_activity_area]', maybe_null_or_empty($certifcate, 'sub_activity_area'), true)
            ]);
            echo get_form_error('certificate[sub_activity_area]');
            getFieldInfo('Autocomplétion disponible');
            ?>
        </div>
        <div class="form-group col-md-4">
            <?php
            echo form_label("N° Interne du dossier", 'internal_file_id', [
                'class' => 'd-block'
            ]);
            echo form_input([
                'name'=>'certificate[internal_file_id]',
                'class'=>'form-control',
                'required'=>'',
                'placeholder'=>'N° Interne du dossier',
                'id'=>'internal_file_id',
                'value'=>set_value('certificate[internal_file_id]', maybe_null_or_empty($certifcate, 'internal_file_id'), true)
            ]);
            echo get_form_error('certificate[internal_file_id]');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-3">
            <?php
            echo form_label("Date de signature", 'signature_date', [
                'class' => 'd-block'
            ]);
            ?>
            <?php
            echo form_input([
                'name'=>'certificate[signature_date]',
                'class'=>'form-control datepicker',
                'required'=>'',
                'placeholder'=>'Date de signature',
                'id'=>'signature_date',
                'value'=>set_value('certificate[signature_date]', maybe_null_or_empty($certifcate, 'signature_date'), true)
            ]);
            echo get_form_error('certificate[signature_date]');
            ?>
        </div>
        <div class="form-group col-md-3">
            <?php
            echo form_label("Date d'attribution", 'project_awarded_date', [
                'class' => 'd-block'
            ]);
            ?>
            <?php
            echo form_input([
                'name'=>'certificate[project_awarded_date]',
                'class'=>'form-control datepicker',
                'required'=>'',
                'placeholder'=>"Date d'attribution",
                'id'=>'project_awarded_date',
                'value'=>set_value('certificate[project_awarded_date]', maybe_null_or_empty($certifcate, 'project_awarded_date'), true)
            ]);
            echo get_form_error('certificate[project_awarded_date]');
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo form_label("Période d'éxécution du projet", 'dateFrom', [
                'class' => 'd-block'
            ]);
            ?>
            <div class="row">
                <div class="form-group col-md-6">
                    <?php
                    echo form_input([
                        'name'=>'certificate[project_execution_start_date]',
                        'class'=>'form-control dateRanger',
                        'required'=>'',
                        'placeholder'=>"Début",
                        'id'=>'dateFrom',
                        'value'=>set_value('certificate[project_execution_start_date]', maybe_null_or_empty($certifcate, 'project_execution_start_date'), true)
                    ]);
                    echo get_form_error('certificate[project_execution_start_date]');
                    getFieldInfo("Début période d'exécution");
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <?php
                    echo form_input([
                        'name'=>'certificate[project_execution_end_date]',
                        'class'=>'form-control dateRanger',
                        'required'=>'',
                        'placeholder'=>"Fin",
                        'id'=>'dateTo',
                        'value'=>set_value('certificate[project_execution_end_date]', maybe_null_or_empty($certifcate, 'project_execution_end_date'), true)
                    ]);
                    echo get_form_error('certificate[project_execution_end_date]');
                    getFieldInfo("Fin période d'exécution");
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-3">
            <?php
            echo form_label("Nom Autorité contractante", 'customer_name', [
                'class' => 'd-block'
            ]);
            ?>
            <?php
            echo form_input([
                'name'=>'certificate[customer_name]',
                'class'=>'form-control my-autocomplete',
                'required'=>'',
                'placeholder'=>"Autorité contractante",
                'id'=>'customer_name',
                'data-target'=>'customer_names',
                'value'=>set_value('certificate[customer_name]', maybe_null_or_empty($certifcate, 'customer_name'), true)
            ]);
            echo get_form_error('certificate[customer_name]');
            getFieldInfo('Autocomplétion disponible');
            ?>
        </div>
        <div class="form-group col-md-3">
            <?php
            echo form_label("Pays", 'country', [
                'class' => 'd-block'
            ]);
            ?>
            <?php
            echo form_dropdown('certificate[country]', $countries, maybe_null_or_empty($certifcate, 'country'), [
                'class' => 'form-control select2',
                'id'=>'country'
            ]);
            ?>
        </div>
        <div class="form-group col-md-2">
            <?php
            echo form_label("Ville", 'city', [
                'class' => 'd-block'
            ]);
            ?>
            <?php
            echo form_input([
                'name'=>'certificate[city]',
                'class'=>'form-control my-autocomplete',
                'required'=>'',
                'placeholder'=>"Ville",
                'id'=>'city',
                'data-target'=>'cities',
                'value'=>set_value('certificate[city]', maybe_null_or_empty($certifcate, 'city'), true)
            ]);
            echo get_form_error('certificate[city]');
            getFieldInfo('Autocomplétion disponible');
            ?>
        </div>
        <div class="form-group col-md-4">
            <label class="d-block">Adresse maître d'ouvrage</label>
            <input placeholder="Adresse maître d'ouvrage" type="text" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label class="d-block">Montant prestation</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">FCFA
                    </button>
                    <div class="dropdown-menu tx-13 currency-dropdown">
                        <a class="dropdown-item" href="#">$</a>
                        <a class="dropdown-item" href="#">€</a>
                    </div>
                </div>
                <input type="text" class="form-control currencyInput" placeholder="Montant de la prestation">
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="d-block">Montant payé à l'entreprise</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">FCFA
                    </button>
                    <div class="dropdown-menu tx-13 currency-dropdown">
                        <a class="dropdown-item" href="#">$</a>
                        <a class="dropdown-item" href="#">€</a>
                    </div>
                </div>
                <input type="text" class="form-control currencyInput" placeholder="Montant payé à l'entreprise">
            </div>
        </div>

        <div class="form-group col-md-4">
            <label class="d-block">Source de financement</label>
            <input placeholder="Source de financement" type="text" class="form-control my-autocomplete">
            <span class="form-text text-muted">Autocomplétion disponible</span>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label class="d-block">Part</label>
            <div class="input-group">
                <input placeholder="Part" type="text" class="number-input form-control">
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>
        <div class="form-group col-md-5">
            <label class="d-block">Filiale ayant éxécuté</label>
            <select class="form-control select2" id="">
                <option value=""></option>
                <option value="BTP">AKASI Bénin</option>
                <option value="BTP">AKASI Togo</option>
                <option value="BTP">AKASI Rwanda</option>
                <option value="BTP">AKASI USA</option>
            </select>
        </div>
        <div class="form-group col-md-5">
            <label class="d-block">Partenaire / associé</label>
            <input placeholder="Partenaire ou associé" type="text" class="form-control my-autocomplete">
            <span class="form-text text-muted">Autocomplétion disponible</span>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <?= form_label("Rôle de l'entreprise") ?>
            <?= form_textarea([
                //'name' => 'global_settings[siteFooterDescription]',
                'class' => 'my-summernote',
                'required' => '',
                //'value' => set_value('global_settings[siteFooterDescription]', maybe_null_or_empty($settings, 'siteFooterDescription'), false),
            ]) ?>
            <?= get_form_error('global_settings[siteFooterDescription]') ?>
        </div>
        <div class="form-group col-md-6">
            <?= form_label("Description du marché") ?>
            <?= form_textarea([
                //'name' => 'global_settings[siteFooterDescription]',
                'class' => 'my-summernote',
                'required' => '',
                //'value' => set_value('global_settings[siteFooterDescription]', maybe_null_or_empty($settings, 'siteFooterDescription'), false),
            ]) ?>
            <?= get_form_error('global_settings[siteFooterDescription]') ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <?= form_label("Détail des tâches exécutées") ?>
            <?= form_textarea([
                //'name' => 'global_settings[siteFooterDescription]',
                'class' => 'my-summernote',
                'required' => '',
                //'value' => set_value('global_settings[siteFooterDescription]', maybe_null_or_empty($settings, 'siteFooterDescription'), false),
            ]) ?>
            <?= get_form_error('global_settings[siteFooterDescription]') ?>
        </div>
        <div class="form-group col-md-6">
            <?php echo form_label('Copie ABE');
            $data = [
                'name' => 'siteFavicon',
                'title' => 'Copie ABE',
            ];
            /*if ($userPic = maybe_null_or_empty($options, 'siteFavicon', true)) {
                $data['value'] = $uploadPath . $userPic;
            }*/
            get_form_upload($data, $extensions = 'pdf doc docx');
            getFieldInfo('Format : PDF|DOC|DOCX Taille Max : 5M');
            echo get_form_error('settings[siteFavicon]');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <?php echo form_label('PV de réception');
            $data = [
                'name' => 'siteFavicon',
                'title' => 'PV de réception',
            ];
            /*if ($userPic = maybe_null_or_empty($options, 'siteFavicon', true)) {
                $data['value'] = $uploadPath . $userPic;
            }*/
            get_form_upload($data, $extensions = 'pdf doc docx');
            getFieldInfo('Format : PDF|DOC|DOCX Taille Max : 5M');
            echo get_form_error('settings[siteFavicon]');
            ?>
        </div>
        <div class="form-group col-md-6">
            <?php echo form_label('Contrat');
            $data = [
                'name' => 'siteFavicon',
                'title' => 'Contrat',
            ];
            /*if ($userPic = maybe_null_or_empty($options, 'siteFavicon', true)) {
                $data['value'] = $uploadPath . $userPic;
            }*/
            get_form_upload($data, $extensions = 'pdf doc docx');
            getFieldInfo('Format : PDF|DOC|DOCX Taille Max : 5M');
            echo get_form_error('settings[siteFavicon]');
            ?>
        </div>
    </div>
    <?php getFormSubmit('Ajouter') ?>

    <?php echo form_close() ?>
    <?php
}