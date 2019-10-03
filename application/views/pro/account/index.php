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
    <div class="form-group">
        <label class="d-block">Mot de passe actuel</label>
        <input type="text" class="form-control" placeholder="Enter your firstname">
    </div>
    <div class="form-group">
        <label class="d-block">Nouveau mot de passe</label>
        <input type="text" class="form-control" placeholder="Enter your lastname">
    </div>
    <div class="form-group">
        <label class="d-block">Confirmer mot de passe</label>
        <input type="text" class="form-control" placeholder="Enter your lastname">
    </div>
    <?php
    echo getFormSubmit('Modifier');
    ?>
</fieldset>