<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 07/10/2019
 * Time: 15:42
 */

function get_add_edit_certificate_html_form($edit=false, $certificate=[], $activity_areas=[], $countries, $affiliateCompanies, $currencies, $uploadPath){
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
            'value'=>set_value('certificate[title]', maybe_null_or_empty($certificate, 'title'), true)
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
            echo form_dropdown('certificate[activity_area_id]', $activity_areas, maybe_null_or_empty($certificate, 'activity_area_id'), [
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
                'value'=>set_value('certificate[sub_activity_area]', maybe_null_or_empty($certificate, 'sub_activity_area'), true)
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
                'value'=>set_value('certificate[internal_file_id]', maybe_null_or_empty($certificate, 'internal_file_id'), true)
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
                'value'=>set_value('certificate[signature_date]', maybe_null_or_empty($certificate, 'signature_date'), true)
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
                'value'=>set_value('certificate[project_awarded_date]', maybe_null_or_empty($certificate, 'project_awarded_date'), true)
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
                        'value'=>set_value('certificate[project_execution_start_date]', maybe_null_or_empty($certificate, 'project_execution_start_date'), true)
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
                        'value'=>set_value('certificate[project_execution_end_date]', maybe_null_or_empty($certificate, 'project_execution_end_date'), true)
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
                'value'=>set_value('certificate[customer_name]', maybe_null_or_empty($certificate, 'customer_name'), true)
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
            echo form_dropdown('certificate[country]', $countries, maybe_null_or_empty($certificate, 'country'), [
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
                'value'=>set_value('certificate[city]', maybe_null_or_empty($certificate, 'city'), true)
            ]);
            echo get_form_error('certificate[city]');
            getFieldInfo('Autocomplétion disponible');
            ?>
        </div>
        <div class="form-group col-md-4">
            <?php
            echo form_label("Adresse maître d'ouvrage", 'customer_adress', [
                'class' => 'd-block'
            ]);
            ?>
            <?php
            echo form_input([
                'name'=>'certificate[customer_adress]',
                'class'=>'form-control ',
                'required'=>'',
                'placeholder'=>"Adresse maître d'ouvrage",
                'id'=>'signature_date',
                'value'=>set_value('certificate[customer_adress]', maybe_null_or_empty($certificate, 'customer_adress'), true)
            ]);
            echo get_form_error('certificate[customer_adress]');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php
            echo form_label("Montant prestation", 'total_amount', [
                'class' => 'd-block'
            ]);
            ?>
            <div class="input-group">
                <?php
                getCurrencyInputGroupHTML($currencies);
                echo form_input([
                    'name'=>'certificate[total_amount]',
                    'class'=>'form-control currencyInput',
                    'required'=>'',
                    'placeholder'=>"Montant de la prestation",
                    'id'=>'total_amount',
                    'value'=>set_value('certificate[total_amount]', maybe_null_or_empty($certificate, 'total_amount'), true)
                ]);
                echo get_form_error('certificate[total_amount]');
                ?>
            </div>
        </div>
        <div class="form-group col-md-4">
            <?php
            echo form_label("Montant payé à l'entreprise", 'amount_received', [
                'class' => 'd-block'
            ]);
            ?>
            <div class="input-group">
                <?php
                getCurrencyInputGroupHTML($currencies);
                echo form_input([
                    'name'=>'certificate[amount_received]',
                    'class'=>'form-control currencyInput',
                    'required'=>'',
                    'placeholder'=>"Montant payé à l'entreprise",
                    'id'=>'total_amount',
                    'value'=>set_value('certificate[amount_received]', maybe_null_or_empty($certificate, 'amount_received'), true)
                ]);
                echo get_form_error('certificate[amount_received]');
                ?>
            </div>
        </div>

        <div class="form-group col-md-4">
            <?php
            echo form_label("Source de financement", 'funding_source', [
                'class' => 'd-block'
            ]);
            ?>
            <?php
            echo form_input([
                'name'=>'certificate[funding_source]',
                'class'=>'form-control my-autocomplete',
                'required'=>'',
                'placeholder'=>"Source de financement",
                'id'=>'funding_source',
                'data-target'=>'funding_sources',
                'value'=>set_value('certificate[funding_source]', maybe_null_or_empty($certificate, 'funding_source'), true)
            ]);
            echo get_form_error('certificate[funding_source]');
            getFieldInfo('Autocomplétion disponible');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <?php
            echo form_label("Part", 'akasi_share', [
                'class' => 'd-block'
            ]);
            ?>
            <div class="input-group">
                <?php
                echo form_input([
                    'name'=>'certificate[akasi_share]',
                    'class'=>'form-control number-input',
                    'required'=>'',
                    'placeholder'=>"Part",
                    'id'=>'akasi_share',
                    'value'=>set_value('certificate[akasi_share]', maybe_null_or_empty($certificate, 'akasi_share'), true)
                ]);
                echo get_form_error('certificate[akasi_share]');
                ?>
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>
        <div class="form-group col-md-5">
            <?php
            echo form_label("Filiale ayant éxécuté", 'affiliate_company', [
                'class' => 'd-block'
            ]);
            ?>
            <?php
            echo form_dropdown('certificate[affiliate_company_id]', $affiliateCompanies, maybe_null_or_empty($certificate, 'affiliate_company_id'), [
                'class' => 'form-control select2',
                'id'=>'affiliate_company'
            ]);
            ?>
        </div>
        <div class="form-group col-md-5">
            <?php
            echo form_label("Partenaire / associé", 'project_partner', [
                'class' => 'd-block'
            ]);
            ?>
            <?php
            echo form_input([
                'name'=>'certificate[project_partner]',
                'class'=>'form-control my-autocomplete',
                'required'=>'',
                'placeholder'=>"Partenaire ou associé",
                'id'=>'project_partner',
                'data-target'=>'project_partners',
                'value'=>set_value('certificate[project_partner]', maybe_null_or_empty($certificate, 'project_partner'), true)
            ]);
            echo get_form_error('certificate[project_partner]');
            getFieldInfo('Autocomplétion disponible');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <?= form_label("Rôle de l'entreprise") ?>
            <?= form_textarea([
                'name'=>'certificate[role]',
                'class' => 'my-summernote',
                'required' => '',
                'value' => set_value('certificate[role]', maybe_null_or_empty($certificate, 'role'), false),
            ]) ?>
            <?= get_form_error('certificate[role]') ?>
        </div>
        <div class="form-group col-md-6">
            <?= form_label("Description du marché") ?>
            <?= form_textarea([
                'name'=>'certificate[project_description]',
                'class' => 'my-summernote',
                'required' => '',
                'value' => set_value('certificate[project_description]', maybe_null_or_empty($certificate, 'project_description'), false),
            ]) ?>
            <?= get_form_error('certificate[project_description]') ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <?= form_label("Détail des tâches exécutées") ?>
            <?= form_textarea([
                'name'=>'certificate[detailed_tasks]',
                'class' => 'my-summernote',
                'required' => '',
                'value' => set_value('certificate[detailed_tasks]', maybe_null_or_empty($certificate, 'detailed_tasks'), false),
            ]) ?>
            <?= get_form_error('certificate[detailed_tasks]') ?>
        </div>
        <div class="form-group col-md-6">
            <?php echo form_label('Copie ABE');
            $data = [
                'name' => 'certificateFile',
                'title' => 'Copie ABE',
            ];
            if ($file = maybe_null_or_empty($certificate, 'certificateFile', true)) {
                $data['value'] = $uploadPath . $file;
            }
            get_form_upload($data, $extensions = 'pdf doc docx', '5M');
            getFieldInfo('Format : PDF|DOC|DOCX Taille Max : 5M');
            echo get_form_error('certificate[certificateFile]');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <?php echo form_label('PV de réception');
            $data = [
                'name' => 'minuteFile',
                'title' => 'PV de réception',
            ];
            if ($file = maybe_null_or_empty($certificate, 'minuteFile', true)) {
                $data['value'] = $uploadPath . $file;
            }
            get_form_upload($data, $extensions = 'pdf doc docx', '5M');
            getFieldInfo('Format : PDF|DOC|DOCX Taille Max : 5M');
            echo get_form_error('certificate[minuteFile]');
            ?>
        </div>
        <div class="form-group col-md-6">
            <?php echo form_label('Contrat');
            $data = [
                'name' => 'contractFile',
                'title' => 'Contrat',
            ];
            if ($file = maybe_null_or_empty($certificate, 'contractFile', true)) {
                $data['value'] = $uploadPath . $file;
            }
            get_form_upload($data, $extensions = 'pdf doc docx', '5M');
            getFieldInfo('Format : PDF|DOC|DOCX Taille Max : 5M');
            echo get_form_error('certificate[contractFile]');
            ?>
        </div>
    </div>
    <?php getFormSubmit('Ajouter') ?>

    <?php echo form_close() ?>
    <?php
}

function getCurrencyInputGroupHTML($currencies){
    ?>
    <div class="input-group-prepend">
        <?php
        ?>
        <button class="btn btn-outline-light dropdown-toggle" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><?= $currencies[0] ?>
        </button>
        <?php
        unset($currencies[0]);
        ?>
        <div class="dropdown-menu tx-13 currency-dropdown">
            <?php
            foreach ($currencies as $key=>$currency){
                ?>
                <a class="dropdown-item" href="#"><?= $currency ?></a>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}