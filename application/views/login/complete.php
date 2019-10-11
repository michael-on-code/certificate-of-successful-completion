<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 07/10/2019
 * Time: 09:15
 */
get_flashdata();
?>
<div class="content content-fixed content-auth">
    <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
            <div class="media-body align-items-center d-none d-lg-flex">
                <div class="mx-wd-600">
                    <img src="<?= $assetsUrl ?>img/img18.png" class="img-fluid" alt="">
                </div>
                <div class="pos-absolute b-0 l-0 tx-12 tx-center">
                    <br>
                    <!--                    Workspace design vector is created by <a href="https://www.freepik.com/pikisuperstar" target="_blank">pikisuperstar (freepik.com)</a>-->
                </div>
            </div><!-- media-body -->

            <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                <div class="wd-100p">
                    <h4 class="tx-20 tx-sm-24">Définissez votre mot de passe</h4>
                    <p class="tx-color-03 mg-b-30 tx-center">Définissez votre mot de passe maintenant et vous êtes prêts à administrer <?= maybe_null_or_empty($options, 'siteName') ?></p>
                    <?php
                    echo form_open();
                    ?>

                    <div class="form-group">
                        <?php
                        echo form_label('Mot de passe', 'new');
                        echo form_password([
                            'name'=>'password[new]',
                            'class'=>'form-control',
                            'placeholder'=>'Saisissez votre mot de passe',
                            'required'=>'',
                            'id'=>'email',
                            'value'=>set_value('password[new]', '', false)
                        ]);
                        echo get_form_error('password[new]');
                        getFieldInfo('8 caractères minimum');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Confirmer mot de passe', 'confirm');
                        echo form_password([
                            'name'=>'password[confirm]',
                            'class'=>'form-control',
                            'placeholder'=>'Confirmez votre mot de passe',
                            'required'=>'',
                            'id'=>'confirm',
                            'value'=>set_value('password[confirm]', '', false)
                        ]);
                        echo get_form_error('password[confirm]')
                        ?>
                    </div>
                    <div class="form-group">
                        <div id="my_google_recaptcha"></div>
                        <?php
                        echo get_form_error('my_google_recaptcha')
                        ?>
                    </div>
                    <button type="submit" disabled class="btn btn-brand-02 btn-block">Définir</button>
                    <?php
                    echo form_close();
                    ?>
                    <!--                    <div class="divider-text">or</div>-->
                    <!--                    <button class="btn btn-outline-facebook btn-block">Sign In With Facebook</button>-->
                    <!--                    <button class="btn btn-outline-twitter btn-block">Sign In With Twitter</button>-->
                    <!--                    <div class="tx-13 mg-t-20 tx-center">Don't have an account? <a href="page-signup.html">Create an Account</a></div>-->
                </div>
            </div><!-- sign-wrapper -->
        </div><!-- media -->
    </div><!-- container -->
</div><!-- content -->
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=fr-FR"
        async defer>
</script>