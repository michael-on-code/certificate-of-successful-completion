<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 03/10/2019
 * Time: 15:21
 */
?>
<form action="">
    <div class="form-group">
        <label class="d-block">Désignation</label>
        <input placeholder="Désignation de la mission" type="text" class="form-control">
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label class="d-block">Secteur d'activité</label>
            <select class="form-control select2" id="">
                <option value=""></option>
                <option value="BTP">BTP</option>
                <option value="BTP">Electricité</option>
                <option value="BTP">Informatique & Télécom</option>
                <option value="BTP">Numérique</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label class="d-block">Sous Secteur d'activité</label>
            <input placeholder="Sous Secteur d'activité" type="text" class="form-control my-autocomplete"
                   data-target="sub_activity_area">
            <span class="form-text text-muted">Autocomplétion disponible</span>
        </div>
        <div class="form-group col-md-4">
            <label class="d-block">N° Interne du dossier</label>
            <input placeholder="N° Interne du dossier" type="text" class="form-control">
        </div>

    </div>
    <div class="row">
        <div class="form-group col-md-3">
            <label class="d-block">Date de signature</label>
            <input placeholder="Date de signature" type="text" class="form-control datepicker">
        </div>
        <div class="form-group col-md-3">
            <label class="d-block">Date d'attribution</label>
            <input placeholder="Date d'attribution" type="text" class="form-control datepicker">
        </div>
        <div class="col-md-6">
            <label class="d-block">Période d'éxécution du projet</label>
            <div class="row">
                <div class="form-group col-md-6">
                    <input id="dateFrom" placeholder="Début" type="text" class="form-control dateRanger">
                    <span class="form-text text-muted">Début période d'exécution</span>
                </div>
                <div class="form-group col-md-6">
                    <input id="dateTo" placeholder="Fin" type="text" class="form-control dateRanger">
                    <span class="form-text text-muted">Fin période d'exécution</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-3">
            <label class="d-block">Nom Autorité contractante</label>
            <input placeholder="Autorité contractante" type="text" class="form-control my-autocomplete">
            <span class="form-text text-muted">Autocomplétion disponible</span>
        </div>
        <div class="form-group col-md-3">
            <label class="d-block">Pays</label>
            <?php
            echo form_dropdown('country', getCountries(), [], [
                'class' => 'form-control select2'
            ]);
            ?>
        </div>
        <div class="form-group col-md-2">
            <label class="d-block">Ville</label>
            <input placeholder="Ville" type="text" class="form-control my-autocomplete">
            <span class="form-text text-muted">Autocomplétion disponible</span>
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

</form>
