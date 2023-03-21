<div class="row">
  <div class="col-md-12 col-xl-12 mx-auto animated <?=setting("animation")?>  delay-2s">
    <div class="card m-b-30">
      <div class="card-header bg-primary text-white">
        <i class="ti-files"></i> 
        <?=ucwords($title_module)?>
      </div>
      <div class="card-body">
        <div class="mb-1">
          <a href="<?=url("army/add")?>" id="add" class="btn btn-sm btn-success btn-icon-text">
          <i class="fa fa-file btn-icon-prepend"></i> 
            <?=cclang("add_new")?>
          </a>
          <button type="button" id="reload" class="btn btn-sm btn-info-2 btn-icon-text"><i class="mdi mdi-backup-restore btn-icon-prepend"></i> 
            <?=cclang("reload")?>
          </button>
          <a href="<?=url("army/filter/")?>" id="filter-show" class="btn btn-sm btn-primary btn-icon-text">
          <i class="mdi mdi-magnify btn-icon-prepend"></i>
            <?=cclang("Filter")?>
          </a>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover" id="table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead class="thead-light">
              <tr class="text-center">
								<th><?= cclang('Image')?></th>
								<th><?= cclang('Rank R Id').' '. cclang('A Fname').'  '.cclang('A Lname')?></th>
								<th><?= cclang('Position Po Id')?></th>
								<th><?= cclang('Affiliation Af Id')?></th>
                <th><?=cclang("action")?></th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
