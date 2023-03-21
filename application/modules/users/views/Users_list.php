<div class="container-fluid">

        <h2 style="margin-top:0px"><i class="fa fa-file"> </i>&nbsp;<?=lang('List')?> Auth_login</h2>
        <hr>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?= anchor(site_url('users/create'),'<i class="fa fa-plus-square"></i>  '.lang('create'), 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?= $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?= site_url('users'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                    <input type="text" class="form-control" name="q" value="<?= $q; ?>">
                        <div class="input-group-append">
                    
                        <?php 
                            if ($q <> '')
                            {
                                ?>
                                <a href="<?= site_url('users'); ?>" class="btn btn-outline-secondary"><i class="fa fa-search-minus"></i></a>
                                <?php
                            }
                        ?>
                            <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i> <?=lang('Search')?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12 table table-responsive">

        <table class="table table-hover table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <tr class="text-center">
    <th><?=lang('No')?></th>
		<th>Accnt Create Time</th>
		<th>Account Type</th>
		<th>Email</th>
		<th>Email Ver Time</th>
		<th>Email Verification Link</th>
		<th>Email Verified</th>
		<th>First Name</th>
		<th>Passwd Reset Str</th>
		<th>Passwd Reset Time</th>
		<th>Password Hash</th>
		<th>Surname</th>
		<th>Username</th>
		<th><?=lang('Action')?></th></tr><?php foreach ($users_data as $users){ ?>
                <tr>
			<td width="80px"><?= ++$start ?></td>
			<td><?= $users->accnt_create_time ?></td>
			<td><?= $users->account_type ?></td>
			<td><?= $users->email ?></td>
			<td><?= $users->email_ver_time ?></td>
			<td><?= $users->email_verification_link ?></td>
			<td><?= $users->email_verified ?></td>
			<td><?= $users->first_name ?></td>
			<td><?= $users->passwd_reset_str ?></td>
			<td><?= $users->passwd_reset_time ?></td>
			<td><?= $users->password_hash ?></td>
			<td><?= $users->surname ?></td>
			<td><?= $users->username ?></td><td>
        <div class="btn-group" role="group" aria-label=".users.">
            <a href="<?=site_url('users/read/'.$users->id)?>" class="btn btn-primary"><i class="fa fa-search-plus"></i></a>
            <a href="<?=site_url('users/update/'.$users->id)?>" class="btn btn-info"><i class="fa fa-pencil-square-o"></i></a>

            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#happy">
                <i class="fa fa-trash"></i>
            </a>
        </div></td>
        

        <!-- Modal -->
        <div class="modal fade" id="happy" tabindex="-1" role="dialog" aria-labelledby="happyLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="happyLabel">Clear Data?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?=lang('Are you sure you want to delete this?')?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=lang('Cancelled')?></button>
                <?= anchor(site_url('users/delete/'.$users->id),lang('submit'),'class="btn btn-danger"')?>
            </div>
            </div>
        </div>
        </div>
		</tr>
        <?php } ?>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary"><?=lang('Total')?> : <?= $total_rows ?></a>
		<?= anchor(site_url('users/excel'), '<i class="fa fa-file-excel-o"></i> '.lang('Excel'), 'class="btn btn-primary"'); ?>
		<?= anchor(site_url('users/word'), '<i class="fa fa-file-word-o"></i> '.lang('Word'), 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?= $pagination ?>
            </div>
        </div>