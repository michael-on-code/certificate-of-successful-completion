<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 01/10/2019
 * Time: 15:18
 */
?>
<p class="df-lead">
    Bienvenue sur <?= maybe_null_or_empty($options, 'siteName') ?>. Gérer maintenant les Attestations de Bonnes fin d'Exécution
    (ABE) délivrées à AKASI Group
</p>
<div class="row">
    <div class="col-lg-4 mg-b-15">
        <div class="card card-body">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Attestation</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">200</h3>
                <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">10% <i class="icon ion-md-arrow-up"></i></span> que semaine dernière</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mg-b-15">
        <div class="card card-body">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Attestation ajoutée par moi</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">10</h3>
                <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">40% <i class="icon ion-md-arrow-up"></i></span> que semaine dernière</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mg-b-15">
        <div class="card card-body">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Utilisateurs inscrits</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">30</h3>
                <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">10% <i class="icon ion-md-arrow-up"></i></span> que semaine dernière</p>
            </div>
        </div>
    </div>

</div>
<div class="row tx-14">
    <div class="col-sm-6">
        <div class="bg-white bd pd-20 pd-lg-30 ht-sm-300 d-flex flex-column justify-content-end">
            <div class="mg-b-25"><i data-feather="grid" class="wd-50 ht-50 tx-gray-500"></i></div>
            <h5 class="tx-inverse mg-b-20">Liste des ABE</h5>
            <p class="mg-b-20">Cliquer ici pour visualiser la liste complète des Attestations de Bonne Exécution</p>
            <a href="<?= site_url('certificate') ?>" class="tx-medium">Visualiser liste des ABE <i
                        class="icon ion-md-arrow-forward mg-l-5"></i></a>
        </div>
    </div><!-- col-6 -->
    <div class="col-sm-6">
        <div class="bg-white bd pd-20 pd-lg-30 ht-sm-300 d-flex flex-column justify-content-end">
            <div class="mg-b-25"><i data-feather="upload" class="wd-50 ht-50 tx-gray-500"></i></div>
            <h5 class="tx-inverse mg-b-20">Ajouter une ABE</h5>
            <p class="mg-b-20">Cliquer ici pour ajouter une  Attestations de Bonne Exécution</p>
            <a href="<?= site_url('certificate/add') ?>" class="tx-medium">Ajouter une ABE <i class="icon ion-md-arrow-forward mg-l-5"></i></a>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="bg-white bd pd-20 pd-lg-30 ht-sm-300 d-flex flex-column justify-content-end">
            <div class="mg-b-25"><i data-feather="users" class="wd-50 ht-50 tx-gray-500"></i></div>
            <h5 class="tx-inverse mg-b-20">Liste des utilisateurs</h5>
            <p class="mg-b-20">Cliquer ici pour visualiser la liste des utilisateurs de la plateforme</p>
            <a href="<?= site_url('users') ?>" class="tx-medium">Visualiser liste des utilisateurs <i class="icon ion-md-arrow-forward mg-l-5"></i></a>
        </div>
    </div><!-- col-6 -->
    <div class="col-sm-6">
        <div class="bg-white bd pd-20 pd-lg-30 ht-sm-300 d-flex flex-column justify-content-end">
            <div class="mg-b-25"><i data-feather="user-plus" class="wd-50 ht-50 tx-gray-500"></i></div>
            <h5 class="tx-inverse mg-b-20">Ajouter un utilisateur</h5>
            <p class="mg-b-20">Cliquer ici pour ajouter un nouvel utilisateur</p>
            <a href="<?= site_url('users/add') ?>" class="tx-medium">Ajouter un utilisateur <i class="icon ion-md-arrow-forward mg-l-5"></i></a>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="bg-white bd pd-20 pd-lg-30 ht-sm-300 d-flex flex-column justify-content-end">
            <div class="mg-b-25"><i data-feather="user" class="wd-50 ht-50 tx-gray-500"></i></div>
            <h5 class="tx-inverse mg-b-20">Mon compte</h5>
            <p class="mg-b-20">Cliquer ici pour modifier vos informations ainsi que votre mot de passe</p>
            <a href="<?= site_url('account') ?>" class="tx-medium">Mon compte <i class="icon ion-md-arrow-forward mg-l-5"></i></a>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="bg-white bd pd-20 pd-lg-30 ht-sm-300 d-flex flex-column justify-content-end">
            <div class="mg-b-25"><i data-feather="settings" class="wd-50 ht-50 tx-gray-500"></i></div>
            <h5 class="tx-inverse mg-b-20">Paramètres généraux</h5>
            <p class="mg-b-20">Cliquer ici pour modifier les paramètres généraux de la plateforme AKASI ABE</p>
            <a href="<?= site_url('settings') ?>" class="tx-medium">Modifier paramètres généraux <i class="icon ion-md-arrow-forward mg-l-5"></i></a>
        </div>
    </div>
</div><!-- row -->
