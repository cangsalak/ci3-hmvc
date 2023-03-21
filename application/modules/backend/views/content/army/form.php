<style>
.img-thumbnail {
    height: 250px;
}
</style>
<div class="row">
    <div class="col-md-12 col-xl-12 mx-auto animated <?=setting("animation")?>  delay-5s">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <i class="ti-pencil-alt"></i>
                <?=ucwords($title_module)?>
            </div>
            <div class="card-body">
                <form id="form" action="<?=$action?>" autocomplete="off">

                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?=$file_name == "" ? cclang("Image"): imgView($file_name)?></label>
                                    <input type="file" name="img" class="file-upload-default" data-id="photo" />
                                    <div class="input-group col-xs-12">
                                        <input type="hidden" class="file-dir" name="file-dir" data-id="photo" />
                                        <input type="text"
                                            class="form-control form-control-sm file-upload-info file-name"
                                            data-id="photo" readonly name="photo" value="<?=$file_name?>" />
                                        <span class="input-group-append">
                                            <button class="btn-remove-image btn btn-danger btn-sm" data-id="photo"
                                                type="button" style="display:<?=$file_name!=''?'block':'none'?>;"><i
                                                    class="ti-trash"></i></button>
                                            <button class="file-upload-browse btn btn-primary btn-sm" data-id="photo"
                                                type="button">เลือกรูปภาพ</button>
                                        </span>
                                    </div>
                                    <div id="photo"></div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                        <hr>
                        <p class="badge badge-pill badge-primary">ข้อมูลส่วนตัว</p>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 col-md-2">
                            <label for="rank_r_id"><?=cclang('Rank R Id')?></label>
                            <!-- <input type="text" class="form-control form-control-sm" name="rank_r_id" id="rank_r_id"
                                value="<?//=$rank_r_id?>" placeholder=<?//= cclang("Rank R Id")?>> -->
                            <!-- is_rank(
									$table, ======= ชื่อฐานข้อมูล
									$id_name,====== id จาก label
									$id_field,====== id primary ของฐานข้อมูลนั้นๆ ที่จะนำมาแสดง
									$name_field,====== ชื่อฐานข้อมูลที่จะแสดง
									$value====== ค่าที่จะให้ตรงกัน (นำมาจาก value )
									) -->
                            <?=is_rank("rank","rank_r_id","r_id","r_fname",$rank_r_id)?>
                        </div>

                        <div class="form-group col-sm-6 col-md-4">
                            <label for="a_fname"><?=cclang('A Fname')?></label>
                            <input type="text" class="form-control form-control-sm" name="a_fname" id="a_fname"
                                value="<?=$a_fname?>" placeholder=<?= cclang("A Fname")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-2">
                            <label for="a_nickname"><?=cclang('A Nickname')?></label>
                            <input type="text" class="form-control form-control-sm" name="a_nickname" id="a_nickname"
                                value="<?=$a_nickname?>" placeholder=<?= cclang("A Nickname")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-4">
                            <label for="a_lname"><?=cclang('A Lname')?></label>
                            <input type="text" class="form-control form-control-sm" name="a_lname" id="a_lname"
                                value="<?=$a_lname?>" placeholder=<?= cclang("A Lname")?>>
                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="a_pid"><?=cclang('A Pid')?></label>
                            <input type="number" class="form-control form-control-sm" name="a_pid" id="a_pid"
                                value="<?=$a_pid?>" placeholder=<?= cclang("A Pid")?>>
                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="e_name"><?=cclang('E Name')?></label>
                            <input type="text" class="form-control form-control-sm" name="e_name" id="e_name"
                                value="<?=$e_name?>" placeholder=<?= cclang("E Name")?>>
                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="e_surname"><?=cclang('E Surname')?></label>
                            <input type="text" class="form-control form-control-sm" name="e_surname" id="e_surname"
                                value="<?=$e_surname?>" placeholder=<?= cclang("E Surname")?>>
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label for="educational"><?=cclang('Educational')?></label>
                            <input type="text" class="form-control form-control-sm" name="educational" id="educational"
                                value="<?=$educational?>" placeholder=<?= cclang("Educational")?>>
                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="weight"><?=cclang('Weight')?></label>
                            <input type="number" class="form-control form-control-sm" name="weight" id="weight"
                                value="<?=$weight?>" placeholder=<?= cclang("Weight")?>>
                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="height"><?=cclang('Height')?></label>
                            <input type="number" class="form-control form-control-sm" name="height" id="height"
                                value="<?=$height?>" placeholder=<?= cclang("Height")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-4">
                            <label for="birthday"><?=cclang('Birthday')?></label>
                            <input type="date" class="form-control form-control-sm" name="birthday" id="birthday"
                                value="<?=$birthday?>" placeholder=<?= cclang("birthday")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-4">
                            <label for="blood_group"><?=cclang('Blood Group')?></label>
                            <!-- <input type="text" class="form-control form-control-sm" name="blood_group" id="blood_group"value="<?//=$blood_group?>" placeholder=<?//= cclang("Blood Group")?>> -->

                            <select class="form-control" name="blood_group" id="blood_group">
                                <option value="">-- กรุณาเลือก --</option>
                                <option <?=($blood_group=="A") ? 'selected':''?> value="A">A</option>
                                <option <?=($blood_group=="B") ? 'selected':''?> value="B">B</option>
                                <option <?=($blood_group=="AB") ? 'selected':''?> value="AB">AB</option>
                                <option <?=($blood_group=="O") ? 'selected':''?> value="O">O</option>
                            </select>

                        </div>

                        <div class="form-group col-sm-6 col-md-4">
                            <label for="gender"><?=cclang('Gender')?></label>
                            <!-- <input type="text" class="form-control form-control-sm" name="gender" id="gender" value="<?//=$gender?>" placeholder=<?//= cclang("Gender")?>> -->

                            <select class="form-control" name="gender" id="gender">
                                <option value="">-- กรุณาเลือก --</option>
                                <option <?=($gender=="m") ? 'selected':''?> value="m">ชาย</option>
                                <option <?=($gender=="f") ? 'selected':''?> value="f">หญิง</option>
                            </select>

                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="skin"><?=cclang('Skin')?></label>
                            <input type="text" class="form-control form-control-sm" name="skin" id="skin"
                                value="<?=$skin?>" placeholder=<?= cclang("Skin")?>>
                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="shape"><?=cclang('Shape')?></label>
                            <input type="text" class="form-control form-control-sm" name="shape" id="shape"
                                value="<?=$shape?>" placeholder=<?= cclang("Shape")?>>
                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="congenital_disease"><?=cclang('Congenital Disease')?></label>
                            <input type="text" class="form-control form-control-sm" name="congenital_disease"
                                id="congenital_disease" value="<?=$congenital_disease?>"
                                placeholder=<?= cclang("Congenital Disease")?>>
                        </div>

                        <div class="form-group col-sm-12 col-md-12">
                            <label for="email"><?=cclang('Email')?></label>
                            <input type="text" class="form-control form-control-sm" name="email" id="email"
                                value="<?=$email?>" placeholder=<?= cclang("Email")?>>
                        </div>

                    </div>
                    <div class="text-center">
                        <hr>
                        <p class="badge badge-pill badge-primary">ประวัตทางทหาร</p>
                        <hr>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="a_armyid"><?=cclang('A Armyid')?></label>
                            <input type="number" class="form-control form-control-sm" name="a_armyid" id="a_armyid"
                                value="<?=$a_armyid?>" placeholder=<?= cclang("A Armyid")?>>
                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="position_po_id"><?=cclang('Position Po Id')?></label>
                            <!-- <input type="text" class="form-control form-control-sm" name="position_po_id" id="position_po_id" value="<?//=$position_po_id?>"placeholder=<?//= cclang("Position Po Id")?>> -->


                            <!-- is_position(
									$table, ======= ชื่อฐานข้อมูล
									$id_name,====== id จาก label
									$id_field,====== id primary ของฐานข้อมูลนั้นๆ ที่จะนำมาแสดง
									$name_field,====== ชื่อฐานข้อมูลที่จะแสดง
									$value====== ค่าที่จะให้ตรงกัน (นำมาจาก value )
									) -->
                            <?=is_position("position","position_po_id","po_id","po_name",$position_po_id)?>
                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="affiliation_af_id"><?=cclang('Affiliation Af Id')?></label>
                            <!-- <input type="text" class="form-control form-control-sm" name="affiliation_af_id" id="affiliation_af_id" value="<//=$affiliation_af_id?>"placeholder=<?//= cclang("Affiliation Af Id")?>> -->
                            <!-- is_affiliation(
									$table, ======= ชื่อฐานข้อมูล
									$id_name,====== id จาก label
									$id_field,====== id primary ของฐานข้อมูลนั้นๆ ที่จะนำมาแสดง
									$name_field,====== ชื่อฐานข้อมูลที่จะแสดง
									$value====== ค่าที่จะให้ตรงกัน (นำมาจาก value )
									) -->
                            <?=is_affiliation("affiliation","affiliation_af_id","af_id","af_fname",$affiliation_af_id)?>
                        </div>

                        <div class="form-group col-sm-4 col-md-3">
                            <label for="registration_date"><?=cclang('Registration Date')?></label>
                            <input type="date" class="form-control form-control-sm" name="registration_date"
                                id="registration_date" value="<?=$registration_date?>"
                                placeholder=<?= cclang("Registration Date")?>>
                        </div>

                        <div class="form-group col-sm-4 col-md-3">
                            <label for="these"><?=cclang('These')?></label>
                            <input type="text" class="form-control form-control-sm" name="these" id="these"
                                value="<?=$these?>" placeholder=<?= cclang("These")?>>
                        </div>


                        <div class="form-group col-sm-4 col-md-3">
                            <label for="defect"><?=cclang('Defect')?></label>
                            <input type="text" class="form-control form-control-sm" name="defect" id="defect"
                                value="<?=$defect?>" placeholder=<?= cclang("Defect")?>>
                        </div>

                        <div class="form-group col-sm-4 col-md-3">
                            <label for="army_type"><?=cclang('Army Type')?></label>
                            <!-- <input type="text" class="form-control form-control-sm" name="army_type" id="army_type" value="<?//=$army_type?>" placeholder=<?//= cclang("army_type")?>> -->

                            <select class="form-control" name="army_type" id="army_type">
                                <option value="">-- กรุณาเลือก --</option>
                                <option <?=($army_type=="4") ? 'selected':''?> value="4">นายทหารสัญญาบัตร</option>
                                <option <?=($army_type=="3") ? 'selected':''?> value="3">นายทหารประทวน</option>
                                <option <?=($army_type=="2") ? 'selected':''?> value="2">ทหารกองประจำการ</option>
                                <option <?=($army_type=="1") ? 'selected':''?> value="1">พนักงานราชการ</option>
                                <option <?=($army_type=="0") ? 'selected':''?> value="0">ไม่ได้จัดประเภท</option>
                            </select>
                        </div>

                    </div>
                    <div class="text-center">
                        <hr>
                        <p class="badge badge-pill badge-warning">สำหรับทหารกองประจำการ</p>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 col-md-3">
                            <label for="stationed"><?=cclang('Stationed')?></label>
                            <input type="date" class="form-control form-control-sm" name="stationed" id="stationed"
                                value="<?=$stationed?>" placeholder=<?= cclang("Stationed")?> data-format="dd/mm/yyyy">
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="model_year"><?=cclang('Model Year')?></label>
                            <input type="text" class="form-control form-control-sm" name="model_year" id="model_year"
                                value="<?=$model_year?>" placeholder=<?= cclang("Model Year")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="turns"><?=cclang('Turns')?></label>
                            <input type="text" class="form-control form-control-sm" name="turns" id="turns"
                                value="<?=$turns?>" placeholder=<?= cclang("Turns")?>>
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label for="status"><?=cclang('Status')?></label>
                            <!-- <input type="text" class="form-control form-control-sm" name="status" id="status" value="<?//=$status?>" placeholder=<?//= cclang("status")?>> -->

                            <select class="form-control" name="status" id="status">
                                <option value="">-- กรุณาเลือก --</option>
                                <option <?=($status=="4") ? 'selected':''?> value="4">ประจำการ</option>
                                <option <?=($status=="3") ? 'selected':''?> value="3">ปลดประจำการ</option>
                                <option <?=($status=="2") ? 'selected':''?> value="2">ขาดราชการ</option>
                                <option <?=($status=="1") ? 'selected':''?> value="1">ช่วยราชการ</option>
                                <option <?=($status=="0") ? 'selected':''?> value="0">ไม่ได้แบ่งสถานะ</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            การคำนวณหาปี คศ.

                            <input  onblur="findTotal()" type="text" name="qty" id="qty1" />
                            <input hidden onblur="findTotal()" type="text" name="qty" id="qty2" value="-543" />
                            =<input  type="text" name="total" id="total" />

                            <hr>
                        </div>



                        <div class="form-group col-md-12">
                            <label id="detail"><?=cclang('Detail')?> </label>
                            <textarea class="form-control" name="detail" rows="3" cols="80"><?=$detail?></textarea>
                        </div>

                    </div>
                    <div class="text-center">
                        <hr>
                        <p class="badge badge-pill badge-primary">ประวัตทั่วไป</p>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4 col-md-4">
                            <label for="ethnicity"><?=cclang('Ethnicity')?></label>
                            <input type="text" class="form-control form-control-sm" name="ethnicity" id="ethnicity"
                                value="<?=$ethnicity?>" placeholder=<?= cclang("Ethnicity")?>>
                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="nationality"><?=cclang('Nationality')?></label>
                            <input type="text" class="form-control form-control-sm" name="nationality" id="nationality"
                                value="<?=$nationality?>" placeholder=<?= cclang("Nationality")?>>
                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="religion"><?=cclang('Religion')?></label>
                            <input type="text" class="form-control form-control-sm" name="religion" id="religion"
                                value="<?=$religion?>" placeholder=<?= cclang("Religion")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="address"><?=cclang('Address')?></label>
                            <input type="text" class="form-control form-control-sm" name="address" id="address"
                                value="<?=$address?>" placeholder=<?= cclang("Address")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="district"><?=cclang('District')?></label>
                            <input type="text" class="form-control form-control-sm" name="district" id="district"
                                value="<?=$district?>" placeholder=<?= cclang("District")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="districts"><?=cclang('Districts')?></label>
                            <input type="text" class="form-control form-control-sm" name="districts" id="districts"
                                value="<?=$districts?>" placeholder=<?= cclang("Districts")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="province"><?=cclang('Province')?></label>
                            <input type="text" class="form-control form-control-sm" name="province" id="province"
                                value="<?=$province?>" placeholder=<?= cclang("Province")?>>
                        </div>
                    </div>
                    <div class="text-center">
                        <hr>
                        <p class="badge badge-pill badge-primary">ข้อมูลบิดา</p>
                        <hr>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="father_name"><?=cclang('Father Name')?></label>
                            <input type="text" class="form-control form-control-sm" name="father_name" id="father_name"
                                value="<?=$father_name?>" placeholder=<?= cclang("Father Name")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="father_surname"><?=cclang('Father Surname')?></label>
                            <input type="text" class="form-control form-control-sm" name="father_surname"
                                id="father_surname" value="<?=$father_surname?>"
                                placeholder=<?= cclang("Father Surname")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="father_age"><?=cclang('Father Age')?></label>
                            <input type="text" class="form-control form-control-sm" name="father_age" id="father_age"
                                value="<?=$father_age?>" placeholder=<?= cclang("Father Age")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="father_status"><?=cclang('Father Status')?></label>
                            <input type="text" class="form-control form-control-sm" name="father_status"
                                id="father_status" value="<?=$father_status?>"
                                placeholder=<?= cclang("Father Status")?>>
                        </div>

                        <div class="form-group col-sm-12 col-md-12">
                            <label for="father_occupation"><?=cclang('Father Occupation')?></label>
                            <input type="text" class="form-control form-control-sm" name="father_occupation"
                                id="father_occupation" value="<?=$father_occupation?>"
                                placeholder=<?= cclang("Father Occupation")?>>
                        </div>
                    </div>
                    <div class="text-center">
                        <hr>
                        <p class="badge badge-pill badge-primary">ข้อมูลมารดา</p>
                        <hr>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="mother_name"><?=cclang('Mother Name')?></label>
                            <input type="text" class="form-control form-control-sm" name="mother_name" id="mother_name"
                                value="<?=$mother_name?>" placeholder=<?= cclang("Mother Name")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="mother_surname"><?=cclang('Mother Surname')?></label>
                            <input type="text" class="form-control form-control-sm" name="mother_surname"
                                id="mother_surname" value="<?=$mother_surname?>"
                                placeholder=<?= cclang("Mother Surname")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="mother_age"><?=cclang('Mother Age')?></label>
                            <input type="text" class="form-control form-control-sm" name="mother_age" id="mother_age"
                                value="<?=$mother_age?>" placeholder=<?= cclang("Mother Age")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="mother_status"><?=cclang('Mother Status')?></label>
                            <input type="text" class="form-control form-control-sm" name="mother_status"
                                id="mother_status" value="<?=$mother_status?>"
                                placeholder=<?= cclang("Mother Status")?>>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label for="mother_occupation"><?=cclang('Mother Occupation')?></label>
                            <input type="text" class="form-control form-control-sm" name="mother_occupation"
                                id="mother_occupation" value="<?=$mother_occupation?>"
                                placeholder=<?= cclang("Mother Occupation")?>>
                        </div>

                    </div>
                    <div class="text-center">
                        <hr>
                        <p class="badge badge-pill badge-primary">ข้อมูลภรรยา</p>
                        <hr>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="wife_name"><?=cclang('Wife Name')?></label>
                            <input type="text" class="form-control form-control-sm" name="wife_name" id="wife_name"
                                value="<?=$wife_name?>" placeholder=<?= cclang("Wife Name")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="wife_surname"><?=cclang('Wife Surname')?></label>
                            <input type="text" class="form-control form-control-sm" name="wife_surname"
                                id="wife_surname" value="<?=$wife_surname?>" placeholder=<?= cclang("Wife Surname")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="wife_occupation"><?=cclang('Wife Occupation')?></label>
                            <input type="text" class="form-control form-control-sm" name="wife_occupation"
                                id="wife_occupation" value="<?=$wife_occupation?>"
                                placeholder=<?= cclang("Wife Occupation")?>>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <label for="wife_age"><?=cclang('Wife Age')?></label>
                            <input type="text" class="form-control form-control-sm" name="wife_age" id="wife_age"
                                value="<?=$wife_age?>" placeholder=<?= cclang("Wife Age")?>>
                        </div>
                    </div>
                    <input type="hidden" name="params" value="<?=strtolower($params)?>">

                    <div class="mt-4">
                        <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger">
                            <?=cclang("cancel")?>
                        </a>
                        <button type="submit" id="submit" name="submit" class="btn btn-sm btn-primary">
                            <?=cclang("save")?>
                        </button>
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

function findTotal() {
    var arr = document.getElementsByName('qty');
    var tot = 0;
    for (var i = 0; i < arr.length; i++) {
        if (parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = tot;
}
</script>