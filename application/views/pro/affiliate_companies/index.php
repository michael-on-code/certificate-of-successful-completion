<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 03/10/2019
 * Time: 10:27
 */
?>
<p class="df-lead">Liste des filiales
</p>
<div class="position-absolute" style="z-index: 9999">
    <a href="<?= site_url('affiliate-companies/add') ?>" class="btn btn-lg btn-primary btn-uppercase mg-l-5"><i data-feather="plus" class="wd-10 mg-r-5"></i> Ajouter filiale</a>
</div>
<table id="example1" class="table table-bordered table-hover" data-order-column="1" style="font-size: 15px;">
    <thead class="thead-light">
    <tr>
<!--        <th>#</th>-->
        <th>Nom</th>
        <th>Adresse</th>
        <th class="wd-15p-f">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php if(isset($companies) && !empty($companies)){
        foreach ($companies as $key=> $company){
            ?>
            <tr>
                <td><a href="<?= site_url("affiliate-companies/edit/$company->id") ?>">
                        <?= $company->name ?>
                    </a></td>
                <td><?= $company->adress ?></td>
                <td class="text-center">
                    <a href="<?= site_url("affiliate-companies/edit/$company->id") ?>" data-toggle="tooltip" data-placement="top" title="Modifier filiale" class="btn btn-primary btn-icon">
                        <i data-feather="edit"></i>
                    </a>
                    <!--<a data-confirm-message="Voulez-vous vraiment supprimer la filiale <?/*= $company->name */?> ?"
                            title="Supprimer"
                            href="#"
                       data-href="<?/*= site_url("affiliate-companies/delete/$company->id") */?>" data-toggle="tooltip" data-placement="top" title="Supprimer filiale" class="btn btn-danger btn-icon prompt">
                        <i data-feather="trash-2"></i>
                    </a>-->

                </td>
            </tr>
            <?php
        }
    } ?>

    </tbody>
</table>
<!--<div>
    Toggle column: <a class="toggle-vis" data-column="0">Name</a> - <a class="toggle-vis" data-column="1">Position</a> - <a class="toggle-vis" data-column="2">Office</a> - <a class="toggle-vis" data-column="3">Age</a> - <a class="toggle-vis" data-column="4">Start date</a> - <a class="toggle-vis" data-column="5">Salary</a>
</div>-->