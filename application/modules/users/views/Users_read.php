<div class="container-fluid">
        <h3 style="margin-top:0px">Baca Auth_login</h3>
        <br>
        <table class="table">
	    <tr><td>Accnt Create Time</td><td><?= $accnt_create_time; ?></td></tr>
	    <tr><td>Account Type</td><td><?= $account_type; ?></td></tr>
	    <tr><td>Email</td><td><?= $email; ?></td></tr>
	    <tr><td>Email Ver Time</td><td><?= $email_ver_time; ?></td></tr>
	    <tr><td>Email Verification Link</td><td><?= $email_verification_link; ?></td></tr>
	    <tr><td>Email Verified</td><td><?= $email_verified; ?></td></tr>
	    <tr><td>First Name</td><td><?= $first_name; ?></td></tr>
	    <tr><td>Passwd Reset Str</td><td><?= $passwd_reset_str; ?></td></tr>
	    <tr><td>Passwd Reset Time</td><td><?= $passwd_reset_time; ?></td></tr>
	    <tr><td>Password Hash</td><td><?= $password_hash; ?></td></tr>
	    <tr><td>Surname</td><td><?= $surname; ?></td></tr>
	    <tr><td>Username</td><td><?= $username; ?></td></tr>
	</table>
<a href="<?= site_url('users') ?>" class="btn btn-primary"><?=lang('Close')?></a>