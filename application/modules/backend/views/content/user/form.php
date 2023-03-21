<div class="row">
    <div class="col-md-12 col-xl-10 mx-auto animated <?=setting("animation")?>  delay-2s">

        <div class="card m-b-30">
            <div class="card-header bg-primary text-white">
                <?=ucwords($title_module)?>
            </div>
            <div class="card-body">
                <?php echo form_open($action, array( 'id' => 'form', 'autocomplete' => 'off' ));?>

                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <div class="form-group">
                                    <label><?=$file_name == "" ? cclang("Image"): imgView($file_name)?></label>
                            <input type="file" name="img" class="file-upload-default" data-id="photo" />
                            <div class="input-group col-xs-12">
                                <input type="hidden" class="file-dir" name="file-dir" data-id="photo" />
                                <input type="text" class="form-control form-control-sm file-upload-info file-name"
                                    data-id="photo" readonly name="photo" value="<?=$file_name?>" />
                                <span class="input-group-append">
                                    <button class="btn-remove-image btn btn-danger btn-sm" data-id="photo" type="button"
                                        style="display:<?=$file_name!=''?'block':'none'?>;"><i
                                            class="ti-trash"></i></button>
                                    <button class="file-upload-browse btn btn-primary btn-sm" data-id="photo"
                                        type="button">เลือกไฟล์ภาพ</button>
                                </span>
                            </div>
                            <div id="photo"></div>
                        </div>
                    </div>
                    <div class="col-4"></div>


                    <div class="form-group col-6">
                        <label for="example-search-input" class=""><?=cclang("Full Name")?></label>
                        <input class="form-control" type="text" name="nama" id="nama" value="<?=$nama?>"placeholder=<?=cclang("Full Name")?>>
                    </div>

                    <div class="form-group col-6">
                        <label for="example-search-input" class=""><?=cclang("Email Only")?></label>
                        <input class="form-control" type="text" name="email" id="email" value="<?=$email?>"placeholder=<?=cclang("Email Only")?>>
                    </div>

                    <?php if ($id_group == 1): ?>
                    <div class="form-group col-4">
                        <label for="example-search-input" class=""><?=cclang("Group")?></label>
                        <input type="text" class="form-control" readonly value="xadmin">
                        <input type="hidden" name="id_group" id="id_group" value="<?=$id_group?>"placeholder=<?= cclang("Group")?>>
                    </div>
                    <?php else: ?>
                    <div class="form-group col-4">
                        <label for="example-search-input" class=""><?=cclang("Group")?></label>
                        <!-- is_combo($table,$id_name,$id_field,$name_field,$value) -->
                        <?=is_combo("auth_group","id_group","id","group",$id_group)?>
                    </div>
                    <?php endif; ?>

                    
                    <div class="form-group col-sm-4 col-md-4">
                            <label for="agency"><?=cclang('Affiliation Af Id')?></label>
                        <!-- is_combo($table,$id_name,$id_field,$name_field,$value) -->  
                        <!-- is_affiliation(
									$table, ======= ชื่อฐานข้อมูล
									$id_name,====== id จาก label
									$id_field,====== id primary ของฐานข้อมูลนั้นๆ ที่จะนำมาแสดง
									$name_field,====== ชื่อฐานข้อมูลที่จะแสดง
									$value====== ค่าที่จะให้ตรงกัน (นำมาจาก value )
									) -->
                                    <?=is_affiliation("affiliation","agency","af_id","af_fname",$agency)?>
                    </div>


                    <?php if ($id_group == 1): ?>
                    <div class="form-group col-4">
                        <label for="example-search-input" class=""><?=cclang("Is Active")?></label>
                        <input type="text" class="form-control" readonly value="Y">
                        <input type="hidden" name="is_active" id="is_active" value="<?=$is_active?>">
                    </div>
                    <?php else: ?>
                    <div class="form-group col-4">
                        <label for="example-search-input" class=""><?=cclang("Is Active")?></label>
                        <select class="form-control" name="is_active" id="is_active">
                            <?php if ($button == "tambah"): ?>
                            <option value="">-- Select --</option>
                            <?php endif; ?>
                            <option <?=($is_active=="1") ? 'selected':''?> value="1">เปิด</option>
                            <option <?=($is_active=="0") ? 'selected':''?> value="0">ปิด</option>
                        </select>
                    </div>
                    <?php endif; ?>

                    <?php if ($button=="update"): ?>
                    <div class="col-12">
                        <input class="form-control" type="hidden" name="last_email" id="last_email" value="<?=$email?>">
                        <p class="text-primary" style="font-size:12px">* หากท่านไม่ต้องการเปลี่ยน กรุณาปล่อยว่างไว้</p>
                    </div>
                    <?php endif; ?>

                    <div class="form-group col-6">
                        <label for="example-search-input" class=""><?=cclang("Password")?></label>
                        <input class="form-control" type="password" name="password" id="password"placeholder=<?= cclang("Password")?>>
                    </div>

                    <div class="form-group col-6">
                        <label for="example-search-input" class=""> <?=cclang("Confirm Password")?></label>
                        <input class="form-control" type="password" name="konfirmasi_password" id="konfirmasi_password" placeholder=<?=cclang("Confirm Password")?>>
                    </div>
                </div>
                <input type="hidden" name="submit" value="<?=$button?>">

                <div class="text-right">
                    <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger"><?=cclang("cancel")?></a>
                    <button type="submit" id="submit" name="submit"
                        class="btn btn-sm btn-primary"><?=cclang("save")?></button>
                </div>
                </form>


            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$("#form").submit(function(e) {
    e.preventDefault();
    var me = $(this);
    $("#submit").prop('disabled', true).html('Loading...');
    $(".form-group").find('.text-danger').remove();
    $.ajax({
        url: me.attr('action'),
        type: 'post',
        data: new FormData(this),
        contentType: false,
        cache: false,
        dataType: 'JSON',
        processData: false,
        success: function(json) {
            if (json.success == true) {
                location.href = json.redirect;
                return;
            } else {
                $("#submit").prop('disabled', false)
                    .html('<?=cclang("save")?>');
                $.each(json.alert, function(key, value) {
                    var element = $('#' + key);
                    $(element)
                        .closest('.form-group')
                        .find('.text-danger').remove();
                    $(element).after(value);
                });
            }
        }
    });
});
</script>