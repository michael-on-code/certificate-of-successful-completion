<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 02/10/2019
 * Time: 14:45
 */
?>
<fieldset class="form-fieldset">
    <legend>Informations personnelles</legend>
    <?php
    echo form_open_multipart()
    ?>
    <div class="form-group">
        <?php
        echo form_label('Nom', 'last_name', [
            'class' => 'd-block'
        ]);
        echo form_input([
            'name' => 'user[last_name]',
            'required' => '',
            'class' => 'form-control',
            'placeholder' => 'Votre nom',
            'id'=>'last_name',
            'value' => set_value('user[last_name]', maybe_null_or_empty($user, 'last_name'), true)
        ]);
        echo get_form_error('user[last_name]')
        ?>
    </div>
    <div class="form-group">
        <?php
        echo form_label('Prénom(s)', 'first_name', [
            'class' => 'd-block'
        ]);
        echo form_input([
            'name' => 'user[first_name]',
            'required' => '',
            'class' => 'form-control',
            'id'=>'first_name',
            'placeholder' => 'Votre prénom(s)',
            'value' => set_value('user[first_name]', maybe_null_or_empty($user, 'first_name'), true)
        ]);
        echo get_form_error('user[first_name]')
        ?>
    </div>
    <div class="form-group">
        <?php
        echo form_label('Email', 'email', [
            'class' => 'd-block'
        ]);
        echo form_input([
            'class' => 'form-control',
            'disabled' => '',
            'value' => maybe_null_or_empty($user, 'email')
        ]);
        ?>
    </div>
    <div class="form-group">
        <?php echo form_label('Avatar', '', [
            'class' => 'd-block'
        ]);
        $data = [
            'name' => 'siteDefaultAvatar',
            'title' => 'Avatar utilisateur par défaut',
        ];
        if ($userPic = maybe_null_or_empty($user, 'user_photo', true)) {
            $data['value'] = $uploadPath . $userPic;
        } else {
            $userPic = maybe_null_or_empty($options, 'siteDefaultAvatar', true);
            $data['value'] = $uploadPath . $userPic;
        }
        get_form_upload($data, $extensions = 'png jpg jpeg');
        getFieldInfo('Format : PNG|JPG Taille Max : 1M');
        echo get_form_error('settings[siteDefaultAvatar]');
        ?>
    </div>

    <?php
    echo getFormSubmit('Modifier');
    echo form_close()
    ?>
</fieldset>
<hr>
<fieldset class="form-fieldset">
    <legend>Mot de passe</legend>
    <?php
    echo form_open();
    ?>
    <div class="form-group">
        <?php
        echo form_label('Mot de passe actuel', 'actual', [
            "class" => 'd-block'
        ]);
        echo form_password([
            'name' => 'password[actual]',
            'class'=>'form-control',
            'placeholder'=>'Saisissez votre mot de passe actuel',
            'required'=>'',
            'id'=>'actual',
            'value'=>set_value('password[actual]', '', true)
        ]);
        echo get_form_error('password[actual]')
        ?>
    </div>
    <div class="form-group">
        <?php
        echo form_label('Nouveau mot de passe', 'new', [
            "class" => 'd-block'
        ]);
        echo form_password([
            'name' => 'password[new]',
            'class'=>'form-control',
            'placeholder'=>'Saisissez votre nouveau mot de passe',
            'required'=>'',
            'id'=>'new',
            'value'=>set_value('password[new]', '', true)
        ]);
        echo get_form_error('password[new]')
        ?>
    </div>
    <div class="form-group">
        <?php
        echo form_label('Confirmer Mot de passe', 'confirm', [
            "class" => 'd-block'
        ]);
        echo form_password([
            'name' => 'password[confirm]',
            'class'=>'form-control',
            'placeholder'=>'Confirmer le nouveau mot de passe',
            'required'=>'',
            'id'=>'confirm',
            'value'=>set_value('password[confirm]', '', true)
        ]);
        echo get_form_error('password[confirm]')
        ?>
    </div>
    <?php
    echo getFormSubmit('Modifier');
    echo form_close();
    ?>
</fieldset>