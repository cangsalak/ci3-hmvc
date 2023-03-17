<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $site_title; ?></title>
  <link rel="stylesheet" href="<?=base_url('assets/bootstrap5/css/sb-admin-2.min.css');?>">
  <?php
    // print_r($_SESSION);
    $theme = $this->session->userdata('theme');
    if($theme == "bootstrap5"){
      echo  '<link rel="stylesheet" href="'.base_url('assets/bootstrap5/css/sb-admin-2.min.css').'">';// bootstrap v5
    }else if( $theme == 'bootstrap3'){
      echo  '<link rel="stylesheet" href="'.base_url('assets/bootstrap3/css/bootstrap.min.css').'">'; // semantic v2.2.12
    }else if( $theme == 'semantic2'){
      echo  '<link rel="stylesheet" href="'.base_url('assets/semantic/semantic.min.css').'">';// semantic v2.2.12
    }else{
      echo  '<link rel="stylesheet" href="'.base_url('assets/bootstrap4/css/bootstrap.min.css').'">';// bootstrap v4 Beta
    }
      echo  '<link rel="stylesheet" href="'.base_url('assets/fontawesome/css/font-awesome.min.css').'">';
  ?>
  <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter! <?=lang('wellcome')?></h1>

	<?php (isset($view_file)) ? $this->load->view($module . '/' . $view_file):'';?>


	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>