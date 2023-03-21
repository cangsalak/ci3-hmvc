
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Custom fonts for this template-->
    <link href="<?=$theme?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600&display=swap" rel="stylesheet">
<!-- Custom styles for this page -->
    <link href="<?=$theme?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?=$theme?>/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <style>
        *{
            font-family: 'Sarabun', sans-serif;
        }
        /**
        *********************************************
        * Prototype of styles for horizontal CSS-menu
        * @data 30.06.2009
        *********************************************
        * (X)HTML-scheme:
        *  <div id="menu">
        *      <ul class="menu">
        *          <li><a href="#" class="parent"><span>level 1</span></a>
        *              <div><ul>
        *                  <li><a href="#" class="parent"><span>level 2</span></a>
        *                      <div><ul><li><a href="#"><span>level 3</span></a></li></ul></div>
        *                  </li>
        *              </ul></div>
        *          </li>
        *          <li class="last"><a href="#"><span>level 1</span></a></li>
        *      </ul>
        *  </div>
        *********************************************
        */

        /* menu::base */
        div#menu {
            height:55px;
            background:url(images/nav-bg.png) repeat-x;
            _background:url(images/nav-bg.gif) repeat-x;
        }

        div#menu ul {
            margin: 0;
            padding: 0;
            list-style: none;
            float: left;
        }
        div#menu ul.menu {
            padding-left: 30px;
        }

        div#menu li {
            position: relative;
            z-index: 9;
            margin: 0;
            padding: 0;
            display: block;
            float: left;
        }
        
        div#menu li:hover>ul {
            left: -2px;
        }

        div#menu li div {
            list-style: none;
            float: left;
            position: absolute;
            top: 50px;
            left: 0;
            width: 208px;
            z-index: 11;
            visibility: hidden;
            padding: 0 0 9px 7px;
            _padding: 0 0 9px 3px;
            background: url(images/submenu-bottom.png) no-repeat 7px bottom;
            _background-image: url(images/submenu-bottom.gif);
            margin: 0 0 0 -9px;
        }
        div#menu li:hover>div {
            visibility: visible;
        }

        div#menu li.current a {}

        /* menu::level1 */
        div#menu a {
            position: relative;
            z-index: 10;
            height: 55px;
            display: block;
            float: left;	
            padding: 0 10px 0 10px;
            line-height: 55px;
            text-decoration: none;
        }
        div#menu span {
            font: normal 12px 'Lucida Sans Unicode','Lucida Grande',Helvetica,Arial,sans-serif;
            padding-top: 18px;
            color: #787878;
            font-weight:bold;
            text-transform:uppercase;
            display: block;
            cursor: pointer;
            background-repeat: no-repeat;		
        }
        div#menu ul a:hover span {
            color: #353535;
        }

        div#menu li { background: url(images/nav_separator.png) top left no-repeat; }
        div#menu li.last span{
            background: url(images/nav_separator.png) top right no-repeat;
            padding: 18px 10px 16px 0;
        }

        /* menu::level2 */
        div#menu ul ul li {
            background: url(images/nav_dropdown_sep.gif) left bottom repeat-x;
            padding: 4px 0;
            z-index: 9;	
        }
        div#menu ul ul {
            z-index: 12;	
            padding: 0;
            background: rgb(226,226,226) url(images/nav_dropdown_grad.png) right top no-repeat;
            margin-top:0px;
            margin-left:4px;
            margin-right:5px;
        }
        div#menu ul ul a {
            width: 184px;
            padding: 0px 7px 3px 8px;
            height: auto;
            float: none;
            display: block;
            background:none;
            margin-bottom: 2px;
            z-index: -1;
        }
        div#menu ul ul a span {
            padding: 0 10px 0px 10px;
            line-height: 20px;
            color: #454545;
            font-weight:normal;
            text-transform: none;
            background:none;
        }
        div#menu ul ul a:hover {
            background: url(images/submenu-selected-bottom.gif) no-repeat 8px bottom;
        }
        div#menu ul ul a:hover span {
            background: url(images/submenu-selected-top.gif) no-repeat 0px 0px;
            color: #fff;
        }

        div#menu ul ul li.last { background: none; }
        div#menu ul ul li {
            width: 100%;
        }

        /* menu::level3 */
        div#menu ul ul div {
            width: 208px;
            margin: -50px 0 0 190px !important;
            height: auto;
            _padding: 0 0 9px 3px;
        }
        div#menu ul ul ul {
            _padding-right:1px;
        }

        /* lava lamp */
        div#menu li.back {
        }
        div#menu li.back .left {
        }

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('_backend/_nav.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('_backend/_navtop.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                        <?php if ($this->session->flashdata('success')): ?>
                            <script>
                            swal({
                            title: "Congratulation",
                            text: "Your request has been completed Successfully!",
                            icon: "<?php echo site_url('assets/slim/lib/sweetalert/icon/cancel.svg'); ?>",
                            button: false,
                            timer: 5000,
                            });
                            </script>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('error')): ?>
                        <script>
                            swal({
                            title: "Error",
                            text: "Your request can not be completed",
                            icon: "<?php echo site_url('Your Icon Destination'); ?>",
                            button: false,
                            timer: 5000,
                            });
                        </script>
                        <?php endif; ?>

                        <?php
    //echo base_url();
    echo $this->dynamic_menu->build_menu();
?>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            
                    <?php (isset($view_file)) ? $this->load->view($module . '/' . $view_file):'';?>
                        </div>
                    </div>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">เลือก "ออกจากระบบ" ด้านล่างหากคุณพร้อมที่จะสิ้นสุดเซสชันปัจจุบันของคุณ</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?=base_url(custom_constants::logout_url)?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=$theme?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=$theme?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=$theme?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=$theme?>/js/sb-admin-2.min.js"></script>

</body>

</html>