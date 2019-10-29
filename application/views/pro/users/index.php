<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 09/10/2019
 * Time: 09:22
 */
?>
<p class="df-lead">Liste des utilisateurs administrant la plateforme
</p>
<div class="position-absolute" style="z-index: 9999">
    <a href="<?= site_url('users/add') ?>" class="btn btn-lg btn-primary btn-uppercase mg-l-5"><i data-feather="plus"
                                                                                                  class="wd-10 mg-r-5"></i>
        Ajouter un utilisateur</a>
</div>
<table id="example1" class="table table-bordered table-hover" data-order-column="1" style="font-size: 15px;">
    <thead class="thead-light">
    <tr>
        <!--        <th>#</th>-->
        <th>Nom complet & Email</th>
        <th>Date de création</th>
        <th>Dernière connexion</th>
        <th>Rôles</th>
        <th>Statut</th>
        <th>Ajouté par</th>
        <th class="wd-10p-f">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($users as $key => $eachUser) {
        $eachUser = (object)$eachUser;
        $editUrl = site_url("users/edit/$eachUser->username");
        if ($eachUser->id == maybe_null_or_empty($user, 'id')) {
            $editUrl = site_url("account");
        }
        ?>
        <tr>
            <td>
                <span style="display: flex;">
                    <div class="avatar">
                    <img
                            alt="photo" class="rounded-circle"
                            src="<?= $uploadPath . ($eachUser->user_photo != '' ? $eachUser->user_photo : $options['siteDefaultAvatar']) ?>">
                </div>
                <div class="pd-l-10">
                    <a
                            class="tx-medium mg-b-0"
                            href="<?= $editUrl ?>"><?= $eachUser->last_name . ' ' . $eachUser->first_name . ($eachUser->id == maybe_null_or_empty($user, 'id') ? ' (Vous)' : '') ?></a>
                    <small class="tx-12 tx-color-03 mg-b-0 mg-l-7"><?= $eachUser->email ?></small>
                </div>
                </span>

            </td>
            <td><?= getDateByTime($eachUser->created_on, 'd/m/Y G:i:s') ?></td>
            <td><?= getDateByTime($eachUser->last_login, 'd/m/Y G:i:s') ?></td>
            <td><?= $eachUser->roles ?></td>
            <td>
                <li class="list-inline-item d-flex align-items-center">
                <?php
                if ($eachUser->active == 0) {
                    ?>
                    <span class="d-block wd-10 ht-10 bg-df-1 rounded mg-r-5"></span>
                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Attente</span>
                    <?php
                } elseif ($eachUser->active == 1) {
                    ?>
                    <span class="d-block wd-10 ht-10 bg-success rounded mg-r-5"></span>
                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Actif</span>
                    <?php
                } else {
                    ?>
                    <span class="d-block wd-10 ht-10 bg-danger rounded mg-r-5"></span>
                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Banni</span>
                    <?php
                }
                ?>
                </li>
            </td>
            <td>
                <?php
                if ($eachUser->added_by && !empty($eachUser->added_by)) {
                    ?>
                    <span style="display: flex;">
                    <div class="avatar">
                    <img
                            alt="photo" class="rounded-circle"
                            src="<?= $uploadPath . ($eachUser->added_by->user_photo != '' ? $eachUser->added_by->user_photo : $options['siteDefaultAvatar']) ?>">
                </div>
                <div class="pd-l-10">
                    <a
                            class="tx-medium mg-b-0"
                            href="<?= ($eachUser->added_by->id == maybe_null_or_empty($user, 'id') ? site_url('account') : site_url("users/edit/" . $eachUser->added_by->username)) ?>"><?= $eachUser->added_by->last_name . ' ' . $eachUser->added_by->first_name ?></a>
                </div>
                </span>
                    <?php
                }
                ?>

            </td>
            <td>
                <a href="<?= $editUrl ?>"
                   data-toggle="tooltip" data-placement="top" title="Modifier" class="btn btn-primary btn-icon">
                    <i data-feather="edit"></i>
                </a>
                <?php
                if ($eachUser->active == 1 && $eachUser->id != maybe_null_or_empty($user, 'id')) {
                    ?>
                    <a data-href="<?= site_url("users/ban/$eachUser->username") ?>"
                       data-confirm-message="Voulez-vous vraiment bannir cet utilisateur"
                       title="Bannir"
                       href="#"
                       data-toggle="tooltip" data-placement="top" class="btn btn-danger btn-icon prompt">
                        <i data-feather="slash"></i>
                    </a>
                    <?php
                } elseif ($eachUser->active == 2) {
                    ?>
                    <a data-href="<?= site_url("users/activate/$eachUser->username") ?>"
                       data-confirm-message="Voulez-vous vraiment activé cet utilisateur"
                       title="Activer"
                       href="#"
                       data-toggle="tooltip" data-placement="top" class="btn btn-success btn-icon prompt">
                        <i data-feather="check"></i>
                    </a>
                    <?php
                } elseif ($eachUser->active == 0) {
                    ?>
                    <a data-href="<?= site_url("users/resend-activation/$eachUser->username") ?>"
                       data-confirm-message="Voulez-vous vraiment renvoyer le mail d'activation à cet utilisateur"
                       title="Renvoyer Email d'activation"
                       href="#"
                       data-toggle="tooltip" data-placement="top" class="btn btn-light btn-icon prompt">
                        <i data-feather="send"></i>
                    </a>
                    <?php
                }
                ?>
            </td>
        </tr>
        <?php
    }
    ?>


    </tbody>
</table>
<!--<div>
    Toggle column: <a class="toggle-vis" data-column="0">Name</a> - <a class="toggle-vis" data-column="1">Position</a> - <a class="toggle-vis" data-column="2">Office</a> - <a class="toggle-vis" data-column="3">Age</a> - <a class="toggle-vis" data-column="4">Start date</a> - <a class="toggle-vis" data-column="5">Salary</a>
</div>-->
