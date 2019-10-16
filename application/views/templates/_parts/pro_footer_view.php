<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- content-footer -->
<!--TODO if container viewport height is less than screen, fix footer position with classes
pos-fixed b-0
-->
<footer class="content-footer">
    <div>
        <?= maybe_null_or_empty($options, 'siteFooterDescription') ?>
    </div>
</footer>
</div><!-- container -->
</div><!-- content -->
<script src="<?= $assetsUrl ?>lib/jquery/jquery.min.js"></script>
<?php if (isset($footerJs) && !empty($footerJs)) {
    foreach ($footerJs as $js) {
        ?>
        <script src="<?= $js ?>" type="text/javascript"></script>
        <?php
    }
}
if (isset($clientData) && !empty($clientData)) {
    ?>
    <script>
        var clientData = <?= json_encode($clientData) ?>
    </script>
    <?php
}
?>
<script src="<?= $assetsUrl ?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $assetsUrl ?>lib/feather-icons/feather.min.js"></script>
<script src="<?= $assetsUrl ?>lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= $assetsUrl ?>lib/prismjs/prism.js"></script>

<script src="<?= $assetsUrl ?>js/dashforge.js"></script>
<script src="<?= $assetsUrl ?>js/public.js"></script>
<script src="<?= $assetsUrl ?>js/pro.js?v=1.21"></script>

<!--end::Page Scripts -->
</body>
</html>