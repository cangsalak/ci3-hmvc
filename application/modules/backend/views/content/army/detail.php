<section class="section about-section gray-bg" id="about">
    <div class="container">
        <div class="row  flex-row-reverse">
            <div class="col-lg-8">
                <div class="about-text go-to">
                    <h3 class="dark-color"><?=ucwords($title_module)?></h3>
                    <h6 class="theme-color lead"><?=$rank_r_id .''.$a_fname.'  '.$a_lname?> (<?=$a_nickname?>)</h6>
                    <h4 class="dark-color lead"><?=$e_name.'  '.$e_surname?></h4>
                    <p><?=cclang('Address')?>: <?=$address?> <br>
                        <?=cclang('District')?><?=$district?> <br>
                        <?=cclang('Districts')?><?=$districts?> <br>
                        <?=cclang('Province')?><?=$province?> </p>
                    <div class="row about-list">
                        <div class="col-md-6">
                            <div class="media">
                                <label><?=cclang('birthday')?></label>
                                <p><?=$birthday?></p>
                            </div>
                            <div class="media">
                                <label><?=cclang('Age')?></label>
                                <p><?=$age?></p>
                            </div>
                            <div class="media">
                                <label><?=cclang('A Pid')?></label>
                                <p><?=$a_pid?></p>
                            </div>
							
                            <div class="media">
                                <label><?=cclang('A Armyid')?></label>
                                <p><?=$a_armyid?></p>
                            </div>
                            <div class="media">
                                <label><?=cclang('Position Po Id')?></label>
                                <p><?=$position_po_id?></p>
                            </div>
                            <div class="media">
                                <label><?=cclang('Affiliation Af Id')?></label>
                                <p><?=$affiliation_af_id?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Educational')?></label>
                                <p><?=$educational?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Weight')?></label>
                                <p><?=$weight?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Height')?></label>
                                <p><?=$height?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Blood Group')?></label>
                                <p><?=$blood_group?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Gender')?></label>
                                <p><?=$gender?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Skin')?></label>
                                <p><?=$skin?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Shape')?></label>
                                <p><?=$shape?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Defect')?></label>
                                <p><?=$defect?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Congenital Disease')?></label>
                                <p><?=$congenital_disease?></p>
                            </div>
							
                            <div class="media">
                                <label><?=cclang('These')?></label>
                                <p><?=$these?></p>
                            </div>
                            <div class="media">
                                <label><?=cclang('Registration Date')?></label>
                                <p><?=DateThai($registration_date)?></p>
                            </div>
                            <div class="media">
                                <label><?=cclang('Ethnicity')?></label>
                                <p><?=$ethnicity?></p>
                            </div>
                            <div class="media">
                                <label><?=cclang('Nationality')?></label>
                                <p><?=$nationality?></p>
                            </div>


                            <div class="media">
                                <label><?=cclang('Religion')?></label>
                                <p><?=$religion?></p>
                            </div>


                            <div class="media">
                                <label><?=cclang('Email')?></label>
                                <p><?=$email?></p>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <label><u> ข้อมูลบิดา</u></label>


                            <div class="media">
                                <label><?=cclang('Father Name')?></label>
                                <p><?=$father_name .' '.$father_surname?></p>
                            </div>


                            <div class="media">
                                <label><?=cclang('Father Age')?></label>
                                <p><?=$father_age?></p>
                            </div>


                            <div class="media">
                                <label><?=cclang('Father Occupation')?></label>
                                <p><?=$father_occupation?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Father Status')?></label>
                                <p><?=$father_status?></p>
                            </div>
                            <label><u> ข้อมูลมารดา</u></label>
                            <div class="media">
                                <label><?=cclang('Mother Name')?></label>
                                <p><?=$mother_name.'  '.$mother_surname?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Mother Age')?></label>
                                <p><?=$mother_age?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Mother Occupation')?></label>
                                <p><?=$mother_occupation?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Mother Status')?></label>
                                <p><?=$mother_status?></p>
                            </div>

                            <label><u> ข้อมูลภรรยา</u></label>
                            <div class="media">
                                <label><?=cclang('Wife Name')?></label>
                                <p><?=$wife_name?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Wife Surname')?></label>
                                <p><?=$wife_surname?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Wife Occupation')?></label>
                                <p><?=$wife_occupation?></p>
                            </div>

                            <div class="media">
                                <label><?=cclang('Wife Age')?></label>
                                <p><?=$wife_age?></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-avatar">
                    <?=imgView($image);?>
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
/* body{
    color: #6F8BA4;
    margin-top:20px;
} */
.section {
    padding: 50px 0;
    position: relative;
}

.gray-bg {
    background-color: #ffffff;
}

img {
    max-width: 100%;
}

img {
    vertical-align: middle;
    border-style: none;
}

/* About Me 
---------------------*/
.about-text h3 {
    font-size: 45px;
    font-weight: 700;
    margin: 0 0 6px;
}

@media (max-width: 767px) {
    .about-text h3 {
        font-size: 35px;
    }
}

.about-text h6 {
    font-weight: 600;
    margin-bottom: 15px;
}

@media (max-width: 767px) {
    .about-text h6 {
        font-size: 18px;
    }
}

.about-text p {
    font-size: 18px;
    max-width: 450px;
}

.about-text p mark {
    font-weight: 600;
    color: #20247b;
}

.about-list {
    padding-top: 10px;
}

.about-list .media {
    padding: 5px 0;
}

.about-list label {
    color: #20247b;
    font-weight: 600;
    width: 88px;
    margin: 0;
    position: relative;
}

.about-list label:after {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    right: 11px;
    width: 1px;
    height: 12px;
    background: #20247b;
    -moz-transform: rotate(15deg);
    -o-transform: rotate(15deg);
    -ms-transform: rotate(15deg);
    -webkit-transform: rotate(15deg);
    transform: rotate(15deg);
    margin: auto;
    opacity: 0.5;
}

.about-list p {
    margin: 0;
    font-size: 15px;
}

@media (max-width: 991px) {
    .about-avatar {
        margin-top: 30px;
    }
}

.about-section .counter {
    padding: 22px 20px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}

.about-section .counter .count-data {
    margin-top: 10px;
    margin-bottom: 10px;
}

.about-section .counter .count {
    font-weight: 700;
    color: #20247b;
    margin: 0 0 5px;
}

.about-section .counter p {
    font-weight: 600;
    margin: 0;
}

mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}

.theme-color {
    color: #fc5356;
}

.dark-color {
    color: #20247b;
}
</style>