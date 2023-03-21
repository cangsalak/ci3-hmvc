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
						<td> <?=cclang('Po Num')?></td>
						<td><?=$po_num?></td>
					</tr>

					<tr>
						<td> <?=cclang('Po Name')?></td>
						<td><?=$po_name?></td>
					</tr>

					<tr>
						<td> <?=cclang('Po Details')?></td>
						<td><?=$po_details?></td>
					</tr>

					<tr>
						<td> <?=cclang('Po Created At')?></td>
						<td><?=DateThai($po_created_at)?></td>
					</tr>

					<tr>
						<td> <?=cclang('Po Update At')?></td>
						<td><?=DateThai($po_update_at)?></td>
					</tr>

        </table>

        <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger mt-3">
          <?=cclang("back")?>
        </a>
      </div>
    </div>
  </div>
</div>
