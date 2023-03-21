<?php
error_reporting(0);

// Start the session
session_start();
require_once 'core/cangsalak.php';
require_once 'core/helper.php';
require_once 'core/process.php';

$get_setting = readJSON('settingjson.cfg');

foreach (glob($_SESSION['path']) as $filename) {
    if(empty($filename)){
        session_destroy ();
        $respon  = 'ยังไม่ได้สร้างโฟลเดอร์';
        header('Location: core/setting.php');
    }
}
?>


<!doctype html>
<html>
    <head>
        <title>Cangsalak Codeigniter CRUD Generator</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600&display=swap" rel="stylesheet">
        <style>
            *{
                font-family: 'Sarabun', sans-serif;
            }
            body{
                padding: 25px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <form action="index.php" method="POST">

                        <div class="form-group">
                            <label>Select Table - <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Refresh</a></label>
                            <select id="table_name" name="table_name" class="form-control" onchange="setname()">
                                <option value="">Please Select</option>
                                <?php
                                $table_list = $hc->table_list();
                                $table_list_selected = isset($_POST['table_name']) ? $_POST['table_name'] : '';
                                foreach ($table_list as $table) {
                                    ?>
                                    <option value="<?php echo $table['table_name'] ?>" <?php echo $table_list_selected == $table['table_name'] ? 'selected="selected"' : ''; ?>><?php echo $table['table_name'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <?php $jenis_tabel = isset($_POST['jenis_tabel']) ? $_POST['jenis_tabel'] : 'reguler_table'; ?>
                                <div class="col-md-5">
                                    <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                                        <label>
                                            <input type="radio" name="jenis_tabel" value="reguler_table" <?php echo $jenis_tabel == 'reguler_table' ? 'checked' : ''; ?>>
                                            Reguler Table
                                        </label>
                                    </div>                            
                                </div>
                                <div class="col-md-7">
                                    <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                                        <label>
                                            <input type="radio" name="jenis_tabel" value="datatables" <?php echo $jenis_tabel == 'datatables' ? 'checked' : ''; ?>>
                                            Serverside Datatables
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <?php $export_excel = isset($_POST['export_excel']) ? $_POST['export_excel'] : ''; ?>
                                <label>
                                    <input type="checkbox" name="export_excel" value="1" <?php echo $export_excel == '1' ? 'checked' : '' ?>>
                                    Export Excel
                                </label>
                            </div>
                        </div>    

                        <div class="form-group">
                            <div class="checkbox">
                                <?php $export_word = isset($_POST['export_word']) ? $_POST['export_word'] : ''; ?>
                                <label>
                                    <input type="checkbox" name="export_word" value="1" <?php echo $export_word == '1' ? 'checked' : '' ?>>
                                    Export Word
                                </label>
                            </div>
                        </div>    

                        <!-- <div class="form-group">
                            <div class="checkbox  <?php //echo file_exists('../application/third_party/mpdf/mpdf.php') ? '' : '';   ?>">
                            <?php //$export_pdf = isset($_POST['export_pdf']) ? $_POST['export_pdf'] : ''; ?>
                                <label>
                                    <input type="checkbox" name="export_pdf" value="1" <?php //echo $export_pdf == '1' ? 'checked' : ''   ?>
                            <?php //echo file_exists('../application/third_party/mpdf/mpdf.php') ? '' : ''; ?>>
                                    Export PDF
                                </label>
                            <?php //echo file_exists('../application/third_party/mpdf/mpdf.php') ? '' : '<small class="text-danger">mpdf required, download <a href="http://harviacode.com">here</a></small>'; ?>
                            </div>
                        </div> -->


                        <div class="form-group">
                            <label>PATH Controller <?=$_SESSION['path']?></label>
                            <input type="text" id="controller" name="controller" value="<?php echo isset($_POST['controller']) ? $_POST['controller'] : '' ?>" class="form-control" placeholder="<?=$_SESSION['path']?>" />
                        </div>
                        <div class="form-group">
                            <label>Custom Model Name</label>
                            <input type="text" id="model" name="model" value="<?php echo isset($_POST['model']) ? $_POST['model'] : '' ?>" class="form-control" placeholder="<?=$_SESSION['path']?>" />
                        </div>
                        <input type="submit" value="Generate" name="generate" class="btn btn-primary" onclick="javascript: return confirm('This will overwrite the existing files. Continue ?')" />
                        <a href="core/setting.php" class="btn btn-default">Setting</a>
                    </form>
                    <br>

                    <?php
                    foreach ($hasil as $h) {
                        
                        echo '<p>' . $h . '</p>';
                    }
                    ?>
                </div>
                <div class="col-md-9">
                    <h3 style="margin-top: 0px">Codeigniter CRUD Generator 1.4 by <a target="_blank" href="https://www.facebook.com/maxcangsalak">facebook.com</a></h3>
                    <p><strong>About :</strong></p>
                    <p>
                        Codeigniter CRUD Generator เป็นเครื่องมือง่ายๆ ในการสร้างโมเดล ตัวควบคุม และมุมมองโดยอัตโนมัติจากตารางของคุณ เครื่องมือนี้จะเพิ่มการเขียนโค้ดของคุณ ตัวสร้าง CRUD นี้จะทำให้การดำเนินการ CRUD, การแบ่งหน้า, การค้นหา, แบบฟอร์ม*, การตรวจสอบความถูกต้องของแบบฟอร์ม, การส่งออกไปยัง excel และการส่งออกเป็นคำ ตัวสร้าง CRUD นี้ใช้สไตล์ bootstrap 3++ คุณยังต้องแก้ไขโค้ดผลลัพธ์เพื่อการปรับแต่งเพิ่มเติม
                    </p>
                    <small>* สร้าง textarea และการป้อนข้อความเท่านั้น</small>
                    <p><strong>Preparation before using this CRUD Generator <?=$_SESSION['path']?> :</strong></p>
                    <ul>
                        <li>บน application/config/autoload.php โหลดไลบรารีฐานข้อมูล ไลบรารีเซสชัน และตัวช่วย url</li>
                        <li>ใน application/config/config.php ตั้งค่า :</b>
                            <ul>
                                <li>$config['base_url'] = '
                                    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
                                    $base_url .= "://" . @$_SERVER['HTTP_HOST'];
                                    $base_url .=     str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
                                    $config['base_url'] = $base_url;
                                '</li>
                                <li>$config['index_page'] = ''</li>
                                <li>$config['url_suffix'] = '.html'</li>
                                <li>$config['encryption_key'] = 'randomstring'</li>

                            </ul>

                        </li>
                        <li>ใน application/config/database.php ให้ตั้งชื่อโฮสต์ ชื่อผู้ใช้ รหัสผ่าน และฐานข้อมูล</li>
                    </ul>
                    <p><strong>Using this CRUD Generator :</strong></p>
                    <ul>
                        <li>เพียงใส่โฟลเดอร์ 'cangsalak' โฟลเดอร์ 'asset' และไฟล์ .htaccess ลงในโฟลเดอร์รูทของโปรเจ็กต์
                            เปิด http://localhost/yourprojectname/cangsalak
                            เลือกตารางและกดปุ่มสร้าง</li>
                    </ul>
                    

                    <p><strong>&COPY; 2023 <a target="_blank" href="https://www.facebook.com/maxcangsalak">facebook.com</a></strong></p>
                </div>
            </div>
        </div>
        
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript">
            function capitalize(s) {
                return s && s[0].toUpperCase() + s.slice(1);
            }

            function setname() {
                var table_name = document.getElementById('table_name').value.toLowerCase();
                if (table_name != '') {
                    document.getElementById('controller').value = capitalize(table_name);
                    document.getElementById('model').value = capitalize(table_name) + '_model';
                } else {
                    document.getElementById('controller').value = '';
                    document.getElementById('model').value = '';
                }
            }
        </script>
    </body>
</html>
