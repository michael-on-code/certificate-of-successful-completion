<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/_parts/pro_header_view');
?>
<?php echo $the_view_content; ?>
<?php $this->load->view('templates/_parts/pro_footer_view'); ?>