<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 09/10/2019
 * Time: 09:22
 */
?>
<p class="df-lead">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
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
        <th>Nom complet</th>
        <th>Email</th>
        <th>Derniere connexion</th>
        <th>Rôles</th>
        <th>Statut</th>
        <th class="wd-15p-f">Actions</th>
        <!--            <th class="wd-20p">Montant payé</th>-->
        <!--            <th class="wd-20p">Période d'exécution</th>-->
        <!--            <th class="wd-20p">Pays</th>-->
        <!--            <th class="wd-20p">Ville</th>-->
        <!--            <th class="wd-20p">Source de financement</th>-->
        <!--            <th class="wd-20p">Filiale</th>-->
        <!--            <th class="wd-20p">Date d'attribution</th>-->
        <!--            <th class="wd-20p">Adresse maître ouvrage</th>-->
        <!--            <th class="wd-20p">Part AKASI Group</th>-->
        <!--            <th class="wd-20p">Partenaire / Associé</th>-->
    </tr>
    </thead>
    <tbody>
    <tr>
        <!--            <td><i data-feather="plus"></i></td>-->
        <td>
            <span
            <div class="kt-user-card-v2"
            <div class="kt-user-card-v2__pic"
            <img alt="photo"
                 src="https://mockup.csti-digital.com/lnb-final/uploads/a8cbbf96632bc47626b8349ed51e665d.jpg"</div
            <div class="kt-user-card-v2__details"
            <a class="kt-user-card-v2__name"
               href="https://mockup.csti-digital.com/lnb-final/web-admin/users/edit/balogounmarianne5d3de2f79be87">BALOGOUN
                Marianne</a</div</div></span></td>
        <td>admin@admin.com</td>
        <td>09/10/2016 08:25</td>
        <td>Administrateur, Modérateur</td>
        <td><span class="d-block wd-10 ht-10 bg-df-1 rounded mg-r-5"></span> Actif</td>
        <td class="text-center">
            <button data-toggle="tooltip" data-placement="top" title="Aperçu rapide" class="btn btn-light btn-icon">
                <i data-feather="eye"></i>
            </button>
            <button data-toggle="tooltip" data-placement="top" title="Modifier ABE" class="btn btn-primary btn-icon">
                <i data-feather="edit"></i>
            </button>
            <button data-toggle="tooltip" data-placement="top" title="Télécharger pièces jointes"
                    class="btn btn-warning btn-icon">
                <i data-feather="download"></i>
            </button>
            <button data-toggle="tooltip" data-placement="top" title="Supprimer ABE" class="btn btn-danger btn-icon">
                <i data-feather="trash-2"></i>
            </button>

        </td>
    </tr>


    </tbody>
</table>
<!--<div>
    Toggle column: <a class="toggle-vis" data-column="0">Name</a> - <a class="toggle-vis" data-column="1">Position</a> - <a class="toggle-vis" data-column="2">Office</a> - <a class="toggle-vis" data-column="3">Age</a> - <a class="toggle-vis" data-column="4">Start date</a> - <a class="toggle-vis" data-column="5">Salary</a>
</div>-->
