
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=isset($description)?$description:''?>" />
    <meta name="author" content="<?=isset($author)?$author:'';?>" />
    <title><?=isset($title_name)?$title_name:'';?> || <?=isset($site_title)?$site_title:'';?></title>
    <link rel="icon" type="image/x-icon" href="<?=$theme?>/assets/favicon.ico" />

    <!-- Custom fonts for this template-->
    <link href="<?=$theme?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=$theme?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    
        <?php (isset($view_file)) ? $this->load->view($module . '/' . $view_file):'';?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=$theme?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=$theme?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=$theme?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=$theme?>/js/sb-admin-2.min.js"></script>

</body>

</html>