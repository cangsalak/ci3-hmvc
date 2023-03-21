<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated <?=setting("animation")?>  delay-2s">
    <div class="card-header bg-primary text-white">
      <i class="ti-file"></i> 
      <?=ucwords($title_module)?>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped table-responsive">
          
					<tr>
						<td> <?=cclang('R Sname')?></td>
						<td><?=$r_sname?></td>
					</tr>

					<tr>
						<td> <?=cclang('R Fname')?></td>
						<td><?=$r_fname?></td>
					</tr>

        </table>

        <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger mt-3">
          <?=cclang("back")?>
        </a>
      </div>
    </div>
  </div>
</div>
