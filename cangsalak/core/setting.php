<?php
error_reporting(0);
require_once 'helper.php';

// Start the session
session_start();

$res = '';
$get_setting = readJSON('settingjson.cfg');

if (isset($_POST['save'])) {

    $target = $_POST['target'];

    $string = '{
        "target": "' . $target . '/",
        "copyassets": "0"
    }';

    
    $hasil_setting = createFile($string, 'settingjson.cfg');
    if(!$hasil_setting == true){
        delAllFileInfolder($target);
        $res = '<p>ไม่สามารถเขียนเอกสารได้</p>';  
    }else{
        $src = "../main";
        $dst = "../".$target;
        custom_copy($src, $dst);
        
        $_SESSION["path"] = $target;

        header('Location: ../index.php');
    }
}
?>
<!doctype html>
<html>
    <head>
        <title>CANGSALAK Admin Panel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
  <div class="col-md-6 offset-md-3">
    <?php echo $res; ?>
<form action="setting.php" method="POST">
    <?php $target = $_POST['target'] ? $_POST['target'] : $get_setting->target;?>
            <label>Target Folder</label> 
            
            <p>*** การใช้งาน กรุณาระบุที่อยู่ที่ท่านต้องการจะทำการ generation ***</p>
            <p>*** หากท่านต้องการสร้างในตัว APPPATH กรุณาพิมพ์ ../application ***</p>
            <p>*** หากท่านต้องการสร้างในตัว นอกเหนือจากที่กล่าวมา กรุณากรอกภายใน FORM เพื่อสร้าง ***</p>

            <div class="form-group">
                <label for="target">Target Folder another</label>
                <input type="text" class="form-control"name="target" value="<?=$target?>" id="target" aria-describedby="emailHelp" placeholder="<?php echo $target == '../application/' || $target == 'output/'? '' : ''; ?> required">
            </div>
        <input type="submit" value="Save" name="save" class="btn btn-primary" />
        
        <a href="../index.php" class="btn btn-default">Back</a>
    </form>
        <?php
          $i = 0;
        foreach (glob("../".$target) as $filename) {
            $i++;

            if($i < 1){
               mkdir($filename, 0777, true);
               $respon  = 'สร้างไม่ได้';
            }else{
                if (!is_dir($filename)) {
                    mkdir($filename, 0777, true);
                }
               $respon  = 'สร้างเรียบร้อย';
            }
            echo " โฟลเดอร์ " . $filename . "  นี้ ได้ทำการ " . $respon . ' ';
            $arrFilename = explode("/",$filename);
            
        }
        ?>
                    
  </div>
</div>
          
        </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>

