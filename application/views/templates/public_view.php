<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/_parts/header_view');
?>
<?php echo $the_view_content; ?>
<?php $this->load->view('templates/_parts/login_footer_view'); ?>