<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 07/10/2019
 * Time: 08:23
 */
?>
<div class="content content-fixed content-auth-alt">
    <div class="container ht-100p tx-center">
        <div class="ht-100p d-flex flex-column align-items-center justify-content-center">
            <div class="wd-70p wd-sm-250 wd-lg-300 mg-b-15"><img src="<?= $assetsUrl ?>img/img19.png" class="img-fluid" alt=""></div>
            <h1 class="tx-color-01 tx-24 tx-sm-32 tx-lg-36 mg-xl-b-5">Erreur 404 | Page Introuvable</h1>
            <h5 class="tx-16 tx-sm-18 tx-lg-20 tx-normal mg-b-20">Oopps. La page que vous recherchez est introuvable</h5>
            <p class="tx-color-03 mg-b-30">Cliquer sur ce bouton pour vous retourner à l'accueil</p>
            <div class="d-flex mg-b-40">
<!--                <input type="text" class="form-control wd-200 wd-sm-250" placeholder="Search">-->
                <a href="<?= site_url('/') ?>" class="btn btn-brand-02 bd-0 mg-l-5 pd-sm-x-25">Retour à l'accueil</a>
            </div>

        </div>
    </div><!-- container -->
</div><!-- content -->
