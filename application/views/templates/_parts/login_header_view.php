<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title><?= maybe_null_or_empty($options, 'siteName') ?> | <?= $pageTitle ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="<?= $options['siteDescription'] ?>">
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="<?= $uploadPath . $options['siteFavicon'] ?>"/>

    <!-- App favicon -->
    <!--    <link rel="shortcut icon" href="--><? //= $assetsUrl ?><!--images/favicon.ico">-->

    <!-- App css -->
    <link href="<?= $assetsUrl ?>lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="<?= $assetsUrl ?>css/dashforge.css?v=1.0">
    <link rel="stylesheet" href="<?= $assetsUrl ?>css/dashforge.auth.css">
    <link rel="stylesheet" href="<?= $assetsUrl ?>css/stylesheet.css">
    <script type="text/javascript">
        var verifyCallback = function (response) {
            if ($('form input[name=g-recaptcha-response]')) {
                $('form input[name=g-recaptcha-response]').val(response);
                $('form button[type=submit]').removeAttr('disabled');
            }
        };
        var verifyExpireCallback = function (response) {
            alert('in');
            $('form button[type=submit]').attr('disabled', '');
        };
        var verifyErrorCallback = function (response) {
            $('form button[type=submit]').attr('disabled', '');
        };
        var onloadCallback = function () {
            grecaptcha.render(/*HTML ID*/'my_google_recaptcha', {
                'sitekey': '<?= maybe_null_or_empty($options, 'googleRecaptchaPublicKey') ?>',
                'data-expired-callback': verifyExpireCallback,
                'data-error-callback': verifyErrorCallback,
                'callback': verifyCallback,
            });
        };
    </script>

</head>

<body>


