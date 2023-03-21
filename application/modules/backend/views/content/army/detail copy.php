<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card-header bg-primary text-white">
      <i class="ti-file"></i> 
      <?=ucwords($title_module)?>
    </div>

	<?php
	// echo '<pre>';
	// var_dump($row);
	// echo '</pre>';
	?>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped table-responsive">
          
					<tr>
						<td> <?=cclang('Image')?></td>
						<td><?=imgView($image);?></td>
					</tr>
					<tr>
						<td> <?=cclang('Rank R Id')?></td>
						<td><?=$rank_r_id?></td>
					</tr>

					<tr>
						<td> <?=cclang('A Fname')?></td>
						<td><?=$a_fname?></td>
					</tr>

					<tr>
						<td> <?=cclang('A Lname')?></td>
						<td><?=$a_lname?></td>
					</tr>

					<tr>
						<td> <?=cclang('A Nickname')?></td>
						<td><?=$a_nickname?></td>
					</tr>

					<tr>
						<td> <?=cclang('A Pid')?></td>
						<td><?=$a_pid?></td>
					</tr>

					<tr>
						<td> <?=cclang('A Armyid')?></td>
						<td><?=$a_armyid?></td>
					</tr>

					<tr>
						<td> <?=cclang('Position Po Id')?></td>
						<td><?=$position_po_id?></td>
					</tr>

					<tr>
						<td> <?=cclang('Affiliation Af Id')?></td>
						<td><?=$affiliation_af_id?></td>
					</tr>

					<tr>
						<td> <?=cclang('Educational')?></td>
						<td><?=$educational?></td>
					</tr>

					<tr>
						<td> <?=cclang('Weight')?></td>
						<td><?=$weight?></td>
					</tr>

					<tr>
						<td> <?=cclang('Height')?></td>
						<td><?=$height?></td>
					</tr>

					<tr>
						<td> <?=cclang('Blood Group')?></td>
						<td><?=$blood_group?></td>
					</tr>

					<tr>
						<td> <?=cclang('Gender')?></td>
						<td><?=$gender?></td>
					</tr>

					<tr>
						<td> <?=cclang('Skin')?></td>
						<td><?=$skin?></td>
					</tr>

					<tr>
						<td> <?=cclang('Shape')?></td>
						<td><?=$shape?></td>
					</tr>

					<tr>
						<td> <?=cclang('Defect')?></td>
						<td><?=$defect?></td>
					</tr>

					<tr>
						<td> <?=cclang('Congenital Disease')?></td>
						<td><?=$congenital_disease?></td>
					</tr>

					<tr>
						<td> <?=cclang('E Name')?></td>
						<td><?=$e_name?></td>
					</tr>

					<tr>
						<td> <?=cclang('E Surname')?></td>
						<td><?=$e_surname?></td>
					</tr>

					<tr>
						<td> <?=cclang('These')?></td>
						<td><?=$these?></td>
					</tr>

					<tr>
						<td> <?=cclang('Registration Date')?></td>
						<td><?=$registration_date?></td>
					</tr>

					<tr>
						<td> <?=cclang('Ethnicity')?></td>
						<td><?=$ethnicity?></td>
					</tr>

					<tr>
						<td> <?=cclang('Nationality')?></td>
						<td><?=$nationality?></td>
					</tr>

					<tr>
						<td> <?=cclang('Religion')?></td>
						<td><?=$religion?></td>
					</tr>

					<tr>
						<td> <?=cclang('Address')?></td>
						<td><?=$address?></td>
					</tr>

					<tr>
						<td> <?=cclang('District')?></td>
						<td><?=$district?></td>
					</tr>

					<tr>
						<td> <?=cclang('Districts')?></td>
						<td><?=$districts?></td>
					</tr>

					<tr>
						<td> <?=cclang('Province')?></td>
						<td><?=$province?></td>
					</tr>

					<tr>
						<td> <?=cclang('Email')?></td>
						<td><?=$email?></td>
					</tr>

					<tr>
						<td> <?=cclang('Father Name')?></td>
						<td><?=$father_name?></td>
					</tr>

					<tr>
						<td> <?=cclang('Father Surname')?></td>
						<td><?=$father_surname?></td>
					</tr>

					<tr>
						<td> <?=cclang('Father Age')?></td>
						<td><?=$father_age?></td>
					</tr>

					<tr>
						<td> <?=cclang('Father Occupation')?></td>
						<td><?=$father_occupation?></td>
					</tr>

					<tr>
						<td> <?=cclang('Father Status')?></td>
						<td><?=$father_status?></td>
					</tr>

					<tr>
						<td> <?=cclang('Mother Name')?></td>
						<td><?=$mother_name?></td>
					</tr>

					<tr>
						<td> <?=cclang('Mother Surname')?></td>
						<td><?=$mother_surname?></td>
					</tr>

					<tr>
						<td> <?=cclang('Mother Age')?></td>
						<td><?=$mother_age?></td>
					</tr>

					<tr>
						<td> <?=cclang('Mother Occupation')?></td>
						<td><?=$mother_occupation?></td>
					</tr>

					<tr>
						<td> <?=cclang('Mother Status')?></td>
						<td><?=$mother_status?></td>
					</tr>

					<tr>
						<td> <?=cclang('Wife Name')?></td>
						<td><?=$wife_name?></td>
					</tr>

					<tr>
						<td> <?=cclang('Wife Surname')?></td>
						<td><?=$wife_surname?></td>
					</tr>

					<tr>
						<td> <?=cclang('Wife Occupation')?></td>
						<td><?=$wife_occupation?></td>
					</tr>

					<tr>
						<td> <?=cclang('Wife Age')?></td>
						<td><?=$wife_age?></td>
					</tr>

					<tr>
						<td> <?=cclang('A Created At')?></td>
						<td><?=$a_created_at?></td>
					</tr>

					<tr>
						<td> <?=cclang('A Updated At')?></td>
						<td><?=$a_updated_at?></td>
					</tr>

        </table>

        <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger mt-3">
          <?=cclang("back")?>
        </a>
      </div>
    </div>
  </div>
</div>
