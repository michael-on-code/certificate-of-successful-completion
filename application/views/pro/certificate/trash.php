<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 03/10/2019
 * Time: 10:27
 */
?>
<p class="df-lead">Liste des Attestation de Bonnes Fin d'Execution délivrées à AKASI Group qui ont été deplacées à la corbeille
</p>
<div class="position-absolute" style="z-index: 1000">
    <a href="<?= site_url('certificate/add') ?>" class="btn btn-lg btn-primary btn-uppercase mg-l-5"><i
                data-feather="plus" class="wd-10 mg-r-5"></i> Ajouter ABE</a>
</div>
<style>
    .popover{
        max-width: fit-content;
    }
</style>
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
    <?php
    $contents='';
    if (isset($certificates) && !empty($certificates)) {
        foreach ($certificates as $key => $certificate) {
            //$contents.=getGlobalPreview($certificate, $key, $uploadPath, $coun);
            ?>

            <tr>
                <td><a tabindex="0" data-trigger="focus" data-target="<?= $key ?>" data-toggle="popover" data-html="true" href="javascript:void(0)">
                        <?= $certificate->internal_file_number ?>
                    </a></td>
                <td data-toggle="tooltip"
                    data-placement="top" title="<?= $certificate->title ?>" class="cutter"><?= $certificate->title ?></td>
                <td><?= $certificate->activity_area_name ?></td>
                <td><?= $certificate->sub_activity_area ?></td>
                <td data-sort="<?= strtotime($certificate->signature_date) ?>"><?= convert_date_to_french($certificate->signature_date) ?></td>
                <td data-toggle="tooltip" class="cutter"
                    data-placement="top" title="<?= $certificate->customer_name ?>"><?= $certificate->customer_name ?></td>
                <td data-sort="<?= $certificate->total_amount ?>"><span class="is-currency"><?= $certificate->total_amount ?></span> <?= $certificate->currency ?></td>
                <td><span class="is-currency"><?= $certificate->amount_received ?></span> <?= $certificate->currency ?></td>
                <td><?= $certificate->akasi_share ?>%</td>
                <td><?= convert_date_to_french($certificate->project_execution_start_date) ?></td>
                <td><?= convert_date_to_french($certificate->project_execution_end_date) ?></td>
                <td><?= $certificate->country ?></td>
                <td><?= $certificate->city ?></td>
                <td data-toggle="tooltip" class="cutter"
                    data-placement="top" title="<?= $certificate->funding_source ?>"><?= $certificate->funding_source ?></td>
                <td><?= $certificate->affiliate_company_name ?></td>
                <td><?= convert_date_to_french($certificate->project_awarded_date) ?></td>
                <td><?= $certificate->project_partner ?></td>
                <td><?= $certificate->customer_adress ?></td>
                <td data-toggle="tooltip" class="cutter"
                    data-placement="top"  title="<?= $certificate->role ?>"><?= $certificate->role ?></td>
                <td data-html="true" data-toggle="tooltip" class="cutter"
                    data-placement="top" title="<?= $certificate->project_description ?>"><?= $certificate->project_description ?></td>
                <td data-html="true" data-toggle="tooltip" class="cutter"
                    data-placement="top" title="<?= $certificate->detailed_tasks ?>"><?= $certificate->detailed_tasks ?></td>
                <td><?= convert_date_to_french($certificate->created_at) ?></td>
                <td class="text-center">
                    <a href="#" data-target="<?= $key ?>" data-toggle="tooltip" data-placement="top" title="Aperçu globale" class="btn btn-light btn-icon my-global-preview-btn">
                        <i data-feather="eye"></i>
                    </a>
                    <?php
                    if(maybe_null_or_empty($certificate, 'certificateFile', true) || maybe_null_or_empty($certificate, 'minuteFile', true) || maybe_null_or_empty($certificate, 'contractFile', true)){
                        ?>
                        <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip"
                                 class="btn btn-warning btn-icon dropdown-toggle no-caret">
                            <i data-feather="download"></i>
                        </button>
                        <div class="dropdown-menu tx-13" aria-labelledby="dropdownMenuButton">
                            <h6 class="dropdown-header tx-uppercase tx-12 tx-bold tx-inverse">Fichiers</h6>
                            <?php if($certificateFile=maybe_null_or_empty($certificate, 'certificateFile', true)){
                                ?>
                                <a data-toggle="tooltip" data-placement="top" title="Visualiser Copie de l' ABE" class="dropdown-item" target="_blank" href="<?= $uploadPath.$certificateFile ?>">Copie de l' ABE</a>
                                <?php
                            } ?>
                            <?php if($minuteFile=maybe_null_or_empty($certificate, 'minuteFile', true)){
                                ?>
                                <a data-toggle="tooltip" data-placement="top" title="Visualiser PV de réception" class="dropdown-item" target="_blank" href="<?= $uploadPath.$minuteFile ?>">PV de réception</a>
                                <?php
                            } ?>
                            <?php if($contractFile=maybe_null_or_empty($certificate, 'contractFile', true)){
                                ?>
                                <a data-toggle="tooltip" data-placement="top" title="Visualiser Contrat" class="dropdown-item" target="_blank" href="<?= $uploadPath.$contractFile ?>">Contrat</a>
                                <?php
                            } ?>
                            <div class="dropdown-divider"></div>
                            <a data-toggle="tooltip" data-placement="top" title="Télécharger toutes pieces jointes" class="dropdown-item" href="<?= site_url("certificate/download/$certificate->slug") ?>">Télécharger tout</a>
                        </div>
                        <?php
                    }
                    ?>
                    <a data-href="<?= site_url("certificate/activate/$certificate->slug") ?>"
                       data-confirm-message="Voulez-vous vraiment réactiver l'ABE N°<?= $certificate->internal_file_number ?>"
                       title="Réactiver l'ABE"
                       href="#"
                       data-toggle="tooltip" data-placement="top" class="btn btn-success btn-icon prompt">
                        <i data-feather="check"></i>
                    </a>
                    <a data-confirm-message="Voulez-vous vraiment supprimer définitivement l'ABE N°<?= $certificate->internal_file_number ?> ?"
                       title="Supprimer définitivement l'ABE"
                       href="#"
                       data-href="<?= site_url("certificate/delete-completely/$certificate->slug") ?>" data-toggle="tooltip"
                       data-placement="top" title="Supprimer définitivement ABE" class="btn btn-danger btn-icon prompt">
                        <i data-feather="trash-2"></i>
                    </a>

                </td>
            </tr>
            <?php
        }
    } ?>

    </tbody>
</table>
<div class="modalTriggerContainer">
    <a href="#modalSplitColumn" data-toggle="modal" class="outline-none modalTrigger">
    </a>
</div>
<div class="modal fade modalArea" id="modalSplitColumn" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mx-wd-sm-70p" role="document">
        <div class="modal-content bd-0 bg-transparent">
            <div class="modal-body pd-0">
                <a href="" role="button" class="close pos-absolute t-15 r-15 z-index-10" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">×</span>
                </a>

                <div class="row no-gutters content bg-white">

                </div><!-- row -->
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div>
<?php //echo $contents ?>
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