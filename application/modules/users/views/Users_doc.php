<h2>Auth_login List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
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
		
            </tr><?php
            foreach ($users_data as $users)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $users->accnt_create_time ?></td>
		      <td><?php echo $users->account_type ?></td>
		      <td><?php echo $users->email ?></td>
		      <td><?php echo $users->email_ver_time ?></td>
		      <td><?php echo $users->email_verification_link ?></td>
		      <td><?php echo $users->email_verified ?></td>
		      <td><?php echo $users->first_name ?></td>
		      <td><?php echo $users->passwd_reset_str ?></td>
		      <td><?php echo $users->passwd_reset_time ?></td>
		      <td><?php echo $users->password_hash ?></td>
		      <td><?php echo $users->surname ?></td>
		      <td><?php echo $users->username ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>