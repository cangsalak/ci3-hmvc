<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="<?=isset($description)?$description:''?>" />
        <meta name="author" content="<?=isset($author)?$author:'';?>" />
        <title><?=isset($title_name)?$title_name:'';?> || <?=isset($site_title)?$site_title:'';?></title>
        <link rel="icon" type="image/x-icon" href="<?=$theme?>/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?=$theme?>/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="#page-top"><?=isset($site_title)?$site_title:'';?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <select class="form-control" onchange="ChangeLanguage()" id="languages">
                            <option value="th" <?= ($this->session->userdata('languages') == 'th')? 'selected':'' ?> >ภาษาไทย</option>
                            <option value="en" <?= ($this->session->userdata('languages') == 'en')? 'selected':'' ?> >English</option>
                        </select>
                    </ul>
                </div>
            </div>
        </nav>
        <?php (isset($view_file)) ? $this->load->view($module . '/' . $view_file):'';?>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->

        <script src="<?=$theme?>/js/scripts.js"></script>
    </body>
    <script>
        function ChangeLanguage()
        {
            var language = $("#languages").val();
            $.ajax({
            type: "GET",
            url:  "<?= base_url('templates/change_languages'); ?>",
            data: { language: language },
            cache: false,
            dataType: "json",
            success: function(msg) {
                location.reload();
            },
            error: function (msg) {
                location.reload();
            },
            });
        }
    </script>
</html>
