<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 02/10/2019
 * Time: 09:31
 */
?>
<?php
echo form_open_multipart();
?>
<form>
    <!--<div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
        </div>
    </div>-->
    <div class="form-group">
        <?php
        echo form_label('Nom de la plateforme', 'siteName');
        echo form_input([
            'name'=>"settings[siteName]",
            'class'=>'form-control',
            'id'=>'siteName',
            'required'=>'',
            'placeholder'=>'Nom de la plateforme',
            'value'=>set_value('settings[siteName]', maybe_null_or_empty($options, 'siteName'), true)
        ]);
        echo get_form_error("settings[siteName]");
        //getFieldInfo('')
        ?>
    </div>
    <div class="form-group">
        <?php
        echo form_label('Description de la plateforme', 'siteDescription');
        echo form_textarea([
            'name'=>"settings[siteDescription]",
            'class'=>'form-control',
            'id'=>'siteDescription',
            'rows'=>3,'required'=>'',
            'placeholder'=>'Description de la plateforme',
            'value'=>set_value('settings[siteDescription]', maybe_null_or_empty($options, 'siteDescription'), false)
        ]);
        echo get_form_error("settings[siteDescription]");
        //getFieldInfo('')
        ?>
    </div>
    <div class="form-group">
        <?php
        echo form_label('Pied de page de la plateforme', 'siteFooterDescription');
        echo form_textarea([
            'name'=>"settings[siteFooterDescription]",
            'class'=>'form-control',
            'id'=>'siteFooterDescription',
            'rows'=>3,'required'=>'',
            'placeholder'=>'Pied de page de la plateforme',
            'value'=>set_value('settings[siteFooterDescription]', maybe_null_or_empty($options, 'siteFooterDescription'), false)
        ]);
        echo get_form_error("settings[siteFooterDescription]");
        //getFieldInfo('')
        ?>
    </div>
    <div class="form-group">
        <?php
        echo form_label('Emails de notification', 'notificationEmails');
        echo form_input([
            'name'=>"settings[notificationEmails]",
            'class'=>'form-control',
            'id'=>'notificationEmails',
            'placeholder'=>'Emails de notification',
            'required'=>'',
            'value'=>set_value('settings[notificationEmails]', maybe_null_or_empty($options, 'notificationEmails'), true)
        ]);
        echo get_form_error("settings[notificationEmails]");
        getFieldInfo('Séparer les emails par une virgule')
        ?>
    </div>
    <div class="form-group">
        <?php echo form_label('Favicon de la plateforme');
        $data = [
            'name' => 'siteFavicon',
            'title' => 'Favicon de la plateforme',
        ];
        if ($userPic = maybe_null_or_empty($options, 'siteFavicon', true)) {
            $data['value'] = $uploadPath . $userPic;
        }
        get_form_upload($data, $extensions = 'png jpg jpeg');
        getFieldInfo('Format : PNG|JPG Taille Max : 1M');
        echo get_form_error('settings[siteFavicon]');
        ?>
    </div>
    <div class="form-group">
        <?php echo form_label('Avatar utilisateur par défaut');
        $data = [
            'name' => 'siteDefaultAvatar',
            'title' => 'Avatar utilisateur par défaut',
        ];
        if ($userPic = maybe_null_or_empty($options, 'siteDefaultAvatar', true)) {
            $data['value'] = $uploadPath . $userPic;
        }
        get_form_upload($data, $extensions = 'png jpg jpeg');
        getFieldInfo('Format : PNG|JPG Taille Max : 1M');
        echo get_form_error('settings[siteDefaultAvatar]');
        ?>
    </div>

    <div class="form-group">
        <?php
        echo form_label('Clé publique Google Recaptcha', 'googleRecaptchaPublicKey');
        echo form_input([
            'name'=>"settings[googleRecaptchaPublicKey]",
            'class'=>'form-control',
            'id'=>'googleRecaptchaPublicKey',
            'placeholder'=>'Clé Publique Google Recaptcha',
            'required'=>'',
            'value'=>set_value('settings[googleRecaptchaPublicKey]', maybe_null_or_empty($options, 'googleRecaptchaPublicKey'), true)
        ]);
        echo get_form_error("settings[googleRecaptchaPublicKey]");
        //getFieldInfo('')
        ?>
    </div>
    <div class="form-group">
        <?php
        echo form_label('Clé privé Google Recaptcha', 'googleRecaptchaSecretKey');
        echo form_input([
            'name'=>"settings[googleRecaptchaSecretKey]",
            'class'=>'form-control',
            'id'=>'googleRecaptchaSecretKey',
            'placeholder'=>'Clé privé Google Recaptcha',
            'required'=>'',
            'value'=>set_value('settings[googleRecaptchaSecretKey]', maybe_null_or_empty($options, 'googleRecaptchaSecretKey'), true)
        ]);
        echo get_form_error("settings[googleRecaptchaSecretKey]");
        //getFieldInfo('')
        ?>
    </div>

    <?php getFormSubmit('Modifier') ?>
    <?php echo form_close() ?>
</form>
