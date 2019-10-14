<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 07/10/2019
 * Time: 09:15
 */
get_flashdata();
?>
<div class="content content-fixed content-auth-alt">
    <div class="container d-flex justify-content-center ht-100p">
        <div class="mx-wd-300 wd-sm-450 ht-100p d-flex flex-column align-items-center justify-content-center">
            <div class="wd-80p wd-sm-300 mg-b-15"><img src="<?= $assetsUrl ?>img/img18.png" class="img-fluid" alt=""></div>
            <h4 class="tx-20 tx-sm-24">Réinitialisez votre mot de passe</h4>
            <p class="tx-color-03 mg-b-30 tx-center">Entrez votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.</p>
            <?php
            echo form_open();
            ?>
            <div class="form-group">
                <div id="my_google_recaptcha"></div>
                <?php
                echo get_form_error('my_google_recaptcha')
                ?>
            </div>
            <div class="form-group  mg-b-20">
                <?php
                echo form_input([
                    'name'=>'email',
                    'type'=>'email',
                    'class'=>'form-control flex-fill',
                    'placeholder'=>'Saisissez adresse Email',
                    'required'=>'',
                    'value'=>set_value('email', '', true)
                ]);
                echo get_form_error('email');
                ?>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="clearfix mg-t-15 float-left">
                        <a href="<?= site_url('/') ?>"><i data-feather="arrow-left"></i> Retour</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="float-right">
                        <button type="submit" disabled class="btn btn-brand-02 mg-sm-l-10 mg-t-10 mg-sm-t-0">Reinitialiser</button>
                    </div>
                </div>
            </div>

            <?php
            echo form_close();
            ?>

        </div>
    </div><!-- container -->
</div>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=fr-FR"
        async defer>
</script>