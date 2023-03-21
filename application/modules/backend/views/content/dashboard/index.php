<?php 
    $agency = $this->session->userdata('agency');
    $where_com = array('army_type' => 4, 'affiliation_af_id' => $agency);
    $where_warrant = array('army_type' => 3, 'affiliation_af_id' => $agency);
    $where_soldier = array('army_type' => 2, 'affiliation_af_id' => $agency);
    $where_government = array('army_type' => 1, 'affiliation_af_id' => $agency);
    $where_classify = array('army_type' => 0, 'affiliation_af_id' => $agency);
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5><?=cclang("welcome",profile("name"))?></h5>
                <p class="card-description">
                    <?=cclang("welcome_description")?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 card-columns mt-3">

        <?php if (is_allowed("dashboard__view_profile_user")): ?>
        <div class="card" style="min-height:363px">
            <div class="card-body">
                <h3 class="card-title"><?=cclang("profile_user")?></h3>
                <div class="text-center">
                    <?=imgView(profile("photo"),"img-thumbnail","border-radius:100%;height:100px;width:100px;margin-bottom:10px;border:3px solid #c2c2c2")?>
                </div>

                <table class="table-profile">
                    <tr>
                        <td><?=cclang("profile_user_name")?></td>
                        <td>: <?=profile("name")?></td>
                    </tr>

                    <tr>
                        <td><?=cclang("profile_user_Email")?></td>
                        <td>: <?=profile("email")?></td>
                    </tr>

                    <tr>
                        <td><?=cclang("profile_user_Group")?></td>
                        <td>: <?=profile("group")?></td>
                    </tr>

                    <tr>
                        <td><?=cclang("profile_user_IP_address")?></td>
                        <td>: <?=$this->input->ip_address()?></td>
                    </tr>

                    <tr>
                        <td><?=cclang("profile_user_Last_Login")?></td>
                        <td>: <?=date("d/m/Y H:i", strtotime(profile("last_login")))?></td>
                    </tr>

                    <tr>
                        <td><?=cclang("profile_user_Created")?></td>
                        <td>: <?=date("d/m/Y H:i", strtotime(profile("created")))?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php endif; ?>


        <?php if (is_allowed("dashboard_view_total_user")): ?>
        <a href="<?=site_url(ADMIN_ROUTE."/user")?>">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left"><?=cclang("total_user")?></p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                        style="color: #686868;">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                            <?=$this->model->get_data("auth_user",["is_delete"=> "0" , "id_user !=" => 1])->num_rows()?>
                        </h3>
                        <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </a>
        <?php endif; ?>

        <?php if (is_allowed("dashboard_view_total_group")): ?>
        <a href="<?=site_url(ADMIN_ROUTE."/group")?>">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left"><?=cclang("total_group")?></p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                        style="color: #686868;">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                            <?=$this->model->get_data("auth_group",[ "id !=" => 1])->num_rows()?></h3>
                        <i class="mdi mdi-animation icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </a>
        <?php endif; ?>

        <?php if (is_allowed("dashboard_view_total_permission")): ?>
        <a href="<?=site_url(ADMIN_ROUTE."/permission")?>">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left"><?=cclang("total_Permission")?></p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                        style="color: #686868;">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                            <?=$this->model->get_data("auth_permission")->num_rows()?></h3>
                        <i class="mdi mdi-buffer icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </a>
        <?php endif; ?>

        <?php if (is_allowed("dashboard_view_total_commission")): ?>
        <a href="<?=site_url(ADMIN_ROUTE."/commission")?>">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left"><?=cclang("total_commission")?></p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                        style="color: #686868;">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                            <?=$this->model->get_data("army",$where_com)->num_rows()?>
                        </h3>
                        <i class="mdi mdi-account-star-variant icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </a>
        <?php endif; ?>

        <?php if (is_allowed("dashboard_view_total_warrant")): ?>
        <a href="<?=site_url(ADMIN_ROUTE."/warrant")?>">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left"><?=cclang("total_warrant")?></p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                        style="color: #686868;">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                            <?=$this->model->get_data("army",$where_warrant)->num_rows()?>
                        </h3>
                        <i class="mdi mdi-account-star icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </a>
        <?php endif; ?>

        <?php if (is_allowed("dashboard_view_total_government")): ?>
        <a href="<?=site_url(ADMIN_ROUTE."/government")?>">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left"><?=cclang("total_government")?></p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                        style="color: #686868;">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                            <?=$this->model->get_data("army",$where_government)->num_rows()?>
                        </h3>
                        <i class="mdi mdi-account icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </a>
        <?php endif; ?>

        <?php if (is_allowed("dashboard_view_total_soldier")): ?>
        <a href="<?=site_url(ADMIN_ROUTE."/soldier")?>">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left"><?=cclang("total_soldier")?></p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                        style="color: #686868;">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                            <?=$this->model->get_data("army",$where_soldier)->num_rows()?>
                        </h3>
                        <i class="mdi mdi-account-check icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </a>
        <?php endif; ?>

        <?php if (is_allowed("dashboard_view_total_classify")): ?>
        <a href="<?=site_url(ADMIN_ROUTE."/classify")?>">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left"><?=cclang("total_classify")?></p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                        style="color: #686868;">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                            <?=$this->model->get_data("army",$where_classify)->num_rows()?></h3>
                        <i class="mdi mdi-account-multiple-minus icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </a>
        <?php endif; ?>


        <?php if (is_allowed("dashboard_view_total_filemanager")): ?>
        <a href="<?=site_url(ADMIN_ROUTE."/filemanager")?>">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left"><?=cclang("total_Filemanager")?></p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                        style="color: #686868;">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                            <?=$this->model->get_data("filemanager")->num_rows()?></h3>
                        <i class="mdi mdi-file-image icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </a>
        <?php endif; ?>

    </div>
</div>