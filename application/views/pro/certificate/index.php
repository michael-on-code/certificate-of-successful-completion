<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 03/10/2019
 * Time: 10:27
 */
?>
<p class="df-lead">Liste des Attestation de Bonnes Fin d'Execution délivrées à AKASI Group
</p>
<div class="position-absolute" style="z-index: 9999">
    <a href="<?= site_url('certificate/add') ?>" class="btn btn-lg btn-primary btn-uppercase mg-l-5"><i
                data-feather="plus" class="wd-10 mg-r-5"></i> Ajouter ABE</a>
</div>
<table id="certificateTable" class="table table-bordered table-hover" data-order-column="1" style="font-size: 15px;">
    <?php
    if (isset($tableHeaders) && !empty($tableHeaders)) {
        ?>
        <thead class="thead-light">
        <tr>
            <?php
            foreach ($tableHeaders as $header) {
                ?>
                <th><?= $header ?></th> <?php
            }
            ?>
            <th class="wd-15p-f">Actions</th>
        </tr>
        </thead>
        <?php

    }
    ?>
    <!--<thead class="thead-light">
    <tr>
        <th>N° Interne</th>
        <th>Désignation</th>
        <th>Secteur</th>
        <th>Sous Secteur</th>
        <th>Date de signature</th>
        <th>Autorité contractante</th>
        <th class="wd-15p-f">Actions</th>
    </tr>
    </thead>-->
    <tbody>
    <?php if (isset($certificates) && !empty($certificates)) {
        foreach ($certificates as $key => $certificate) {
            ?>
            <tr>
                <td><a href="<?= site_url("certificate/edit/$certificate->slug") ?>">
                        <?= $certificate->internal_file_number ?>
                    </a></td>
                <td><?= $certificate->title ?></td>
                <td><?= $certificate->activity_area_name ?></td>
                <td><?= $certificate->sub_activity_area ?></td>
                <td><?= convert_date_to_french($certificate->signature_date) ?></td>
                <td><?= $certificate->customer_name ?></td>
                <td><?= $certificate->total_amount ?></td>
                <td><?= $certificate->amount_received ?></td>
                <td><?= $certificate->akasi_share ?>%</td>
                <td><?= convert_date_to_french($certificate->project_execution_start_date) ?></td>
                <td><?= convert_date_to_french($certificate->project_execution_end_date) ?></td>
                <td><?= $countries[$certificate->country] ?></td>
                <td><?= $certificate->city ?></td>
                <td><?= $certificate->funding_source ?></td>
                <td><?= $certificate->affiliate_company_name ?></td>
                <td><?= convert_date_to_french($certificate->project_awarded_date) ?></td>
                <td><?= $certificate->project_partner ?></td>
                <td><?= $certificate->customer_adress ?></td>
                <td><?= $certificate->role ?></td>
                <td><?= $certificate->project_description ?></td>
                <td><?= $certificate->detailed_tasks ?></td>
                <td><?= convert_date_to_french($certificate->created_at) ?></td>
                <td class="text-center">
                    <!--<a data-toggle="tooltip" data-placement="top" title="Aperçu rapide" class="btn btn-light btn-icon">
                        <i data-feather="eye"></i>
                    </a>-->
                    <a href="<?= site_url("certificate/edit/$certificate->slug") ?>" data-toggle="tooltip"
                       data-placement="top" title="Modifier ABE" class="btn btn-primary btn-icon">
                        <i data-feather="edit"></i>
                    </a>
                    <a href="<?= site_url("certificate/download/$certificate->slug") ?>" data-toggle="tooltip"
                       data-placement="top" title="Télécharger pièces jointes" class="btn btn-warning btn-icon">
                        <i data-feather="download"></i>
                    </a>
                    <a data-confirm-message="Voulez-vous vraiment supprimer l'ABE N°<?= $certificate->internal_file_number ?> ?"
                       title="Supprimer"
                       href="#"
                       data-href="<?= site_url("certificate/delete/$certificate->slug") ?>" data-toggle="tooltip"
                       data-placement="top" title="Supprimer ABE" class="btn btn-danger btn-icon prompt">
                        <i data-feather="trash-2"></i>
                    </a>

                </td>
            </tr>
            <?php
        }
    } ?>

    </tbody>
</table>
<div class="wd-md-60p mg-t-15 mg-md-auto mg-t-15-f">
    <div data-label="Afficher / Masquer des colonnes" class="df-example demo-forms">
        <?php
        echo form_dropdown('', $tableHeaders, $visiblesColumns, [
            'class' => 'form-control select2',
            'multiple'=>'',
            'id'=>'columnToggle'
        ]);
        ?>
    </div>
</div>
<!--<div>
    Toggle column: <a class="toggle-vis" data-column="0">Name</a> - <a class="toggle-vis" data-column="1">Position</a> - <a class="toggle-vis" data-column="2">Office</a> - <a class="toggle-vis" data-column="3">Age</a> - <a class="toggle-vis" data-column="4">Start date</a> - <a class="toggle-vis" data-column="5">Salary</a>
</div>-->