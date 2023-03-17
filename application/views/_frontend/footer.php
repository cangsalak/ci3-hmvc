   <?php 
    $theme = $this->session->userdata('theme');
    if($theme == "bootstrap5"){
      echo " <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'></script>" ;
      echo " <script src=".base_url('assets\bootstrap5\js\bootstrap.min.js')."></script>" ;
    }else if( $theme == 'bootstrap4'){
      echo " <script src='https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js'></script>" ;
      echo " <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js'></script>" ;
    }else{
      echo " <script src=".base_url('assets\bootstrap4\js\popper.min.js')."></script>" ;
      echo " <script src=".base_url('assets\bootstrap4\js\bootstrap.min.js')."></script>" ;
    }
    ?>
    <script src="<?= base_url('assets\bootstrap4\js\popper.min.js') ?>"></script>
    <script src="<?= base_url('assets\bootstrap4\js\bootstrap.min.js') ?>"></script>   
</body>
</html>