<form autocomplete="off">
  <div class="row">
    
		<div class="form-group col-sm-6">
			<input type="text" class="form-control form-control-sm" id="af_sname" placeholder=<?= cclang("Af Sname" )?>/>
		</div>
		<div class="form-group col-sm-6">
			<input type="text" class="form-control form-control-sm" id="af_fname" placeholder=<?= cclang("Af Fname" )?>/>
		</div>
		<div class="form-group col-sm-6">
			<input type="text" class="form-control form-control-sm" id="af_social" placeholder=<?= cclang("Af Social" )?>/>
		</div>
		<div class="form-group col-sm-6">
			<input type="text" class="form-control form-control-sm" id="af_tel" placeholder=<?= cclang("Af Tel" )?>/>
		</div>

    <div class="col-sm-12 mt-2">
      <button type='button' class='btn btn-default btn-sm' data-dismiss='modal'>
        <?=cclang("cancel")?>
      </button>
      <button type="button" class="btn btn-primary btn-sm" id="filter">
        <?=cclang("Filter")?>
      </button>
    </div>
  </div>
</form>

<script type="text/javascript">
$("#filter").click(function(){
  $('#modalGue').modal('hide');
  $("#table").DataTable().ajax.reload();  //just reload table
});
</script>
