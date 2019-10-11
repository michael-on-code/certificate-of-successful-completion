<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 30/09/2019
 * Time: 13:09
 */
get_flashdata();
?>
<div class="content content-fixed content-auth">
    <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
            <div class="media-body align-items-center d-none d-lg-flex">
                <div class="mx-wd-600">
                    <img src="<?= $assetsUrl ?>img/img15.png" class="img-fluid" alt="">
                </div>
                <div class="pos-absolute b-0 l-0 tx-12 tx-center">
                    <br>
                    <!--                    Workspace design vector is created by <a href="https://www.freepik.com/pikisuperstar" target="_blank">pikisuperstar (freepik.com)</a>-->
                </div>
            </div><!-- media-body -->

            <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                <div class="wd-100p">
                    <h3 class="tx-color-01 mg-b-5">Se connecter</h3>
                    <p class="tx-color-03 tx-16 mg-b-40">Bienvenue sur la plateforme AKASI ABE</p>
                    <?php echo form_open('') ?>
                    <?= form_hidden('g-recaptcha-response') ?>
                    <div class="form-group">
                        <?php
                        echo form_label('Adresse Email', 'email');
                        echo form_input([
                            'name'=>'login[email]',
                            'class'=>'form-control',
                            'placeholder'=>'Saisissez votre adresse Email',
                            'type'=>'email',
                            'required'=>'',
                            'id'=>'email',
                            'value'=>set_value('login[email]', '', 'true')
                        ]);
                        echo get_form_error('login[email]')
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Mot de passe', 'password');
                        echo form_password([
                            'name'=>'login[password]',
                            'class'=>'form-control password',
                            'placeholder'=>'Saisissez votre mot de passe',
                            'required'=>'',
                            'id'=>'password',
                            'value'=>set_value('login[password]', '', 'true')
                        ]);
                        ?>
                        <?php
                        echo get_form_error('login[password]')
                        ?>
                    </div>
                    <div class="form-group">
                        <div id="my_google_recaptcha"></div>
                        <?php
                       echo get_form_error('my_google_recaptcha')
                        ?>
                    </div>
                    <div class="form-group position-relative">
                        <div class="d-flex justify-content-between mg-b-5">
                            <div class="custom-control custom-checkbox">
                                <?php
                                echo form_checkbox('login[remember]', 1, false, [
                                    'class'=>'custom-control-input',
                                    'id'=>'remember_me'
                                ]);
                                echo form_label('Se souvenir de moi', 'remember_me',[
                                    'class'=>'custom-control-label'
                                ]);
                                ?>
                            </div>
                            <a href="<?= site_url('password-forgotten') ?>" class="tx-13">Mot de passe oublié ?</a>
                        </div>

                    </div>
                    <button type="submit" disabled class="btn btn-brand-02 btn-block">Se connecter</button>
                    <?php echo form_close() ?>
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

