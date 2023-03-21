<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated <?=setting("animation")?> delay-2s">
    <div class="card-header bg-primary text-white">
      <i class="ti-file"></i> 
      <?=ucwords($title_module)?>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped table-responsive">
          
					<tr>
						<td> <?=cclang('Af Sname')?></td>
						<td><?=$af_sname?></td>
					</tr>

					<tr>
						<td> <?=cclang('Af Fname')?></td>
						<td><?=$af_fname?></td>
					</tr>

					<tr>
						<td> <?=cclang('Af Address')?></td>
						<td><?=$af_address?></td>
					</tr>

					<tr>
						<td> <?=cclang('Af Web')?></td>
						<td><?=$af_web?></td>
					</tr>

					<tr>
						<td> <?=cclang('Af Social')?></td>
						<td><?=$af_social?></td>
					</tr>

					<tr>
						<td> <?=cclang('Af Tel')?></td>
						<td><?=$af_tel?></td>
					</tr>

					<tr>
						<td> <?=cclang('Af Created At')?></td>
						<td><?=DateThai($af_created_at)?></td>
					</tr>

					<tr>
						<td> <?=cclang('Af Update At')?></td>
						<td><?=DateThai($af_update_at)?></td>
					</tr>

        </table>

        <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger mt-3">
          <?=cclang("back")?>
        </a>
      </div>
    </div>
  </div>
</div>
