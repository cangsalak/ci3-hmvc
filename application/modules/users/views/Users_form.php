<div class="container-fluid">
        <h3 style="margin-top:0px"><?= $button ?> Auth_login</h3>
        <hr>
        <form action="<?= $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Accnt Create Time <?= form_error('accnt_create_time') ?></label>
            <input type="text" class="form-control" name="accnt_create_time" id="accnt_create_time" placeholder="Accnt Create Time" autocomplete="off" value="<?= $accnt_create_time; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Account Type <?= form_error('account_type') ?></label>
            <input type="text" class="form-control" name="account_type" id="account_type" placeholder="Account Type" autocomplete="off" value="<?= $account_type; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?= form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off" value="<?= $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email Ver Time <?= form_error('email_ver_time') ?></label>
            <input type="text" class="form-control" name="email_ver_time" id="email_ver_time" placeholder="Email Ver Time" autocomplete="off" value="<?= $email_ver_time; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email Verification Link <?= form_error('email_verification_link') ?></label>
            <input type="text" class="form-control" name="email_verification_link" id="email_verification_link" placeholder="Email Verification Link" autocomplete="off" value="<?= $email_verification_link; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email Verified <?= form_error('email_verified') ?></label>
            <input type="text" class="form-control" name="email_verified" id="email_verified" placeholder="Email Verified" autocomplete="off" value="<?= $email_verified; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">First Name <?= form_error('first_name') ?></label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" autocomplete="off" value="<?= $first_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Passwd Reset Str <?= form_error('passwd_reset_str') ?></label>
            <input type="text" class="form-control" name="passwd_reset_str" id="passwd_reset_str" placeholder="Passwd Reset Str" autocomplete="off" value="<?= $passwd_reset_str; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Passwd Reset Time <?= form_error('passwd_reset_time') ?></label>
            <input type="text" class="form-control" name="passwd_reset_time" id="passwd_reset_time" placeholder="Passwd Reset Time" autocomplete="off" value="<?= $passwd_reset_time; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password Hash <?= form_error('password_hash') ?></label>
            <input type="text" class="form-control" name="password_hash" id="password_hash" placeholder="Password Hash" autocomplete="off" value="<?= $password_hash; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Surname <?= form_error('surname') ?></label>
            <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" autocomplete="off" value="<?= $surname; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?= form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" value="<?= $username; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?= $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?= $button ?></button> 
	    <a href="<?= site_url('users') ?>" class="btn btn-default"><?=lang('Cancelled')?></a>
	</form>