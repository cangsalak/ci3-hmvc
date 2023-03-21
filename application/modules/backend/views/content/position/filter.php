<form autocomplete="off">
  <div class="row">
    
		<div class="form-group col-sm-6">
			<input type="text" class="form-control form-control-sm" id="po_id" placeholder=<?= cclang("Po Id" )?>/>
		</div>
		<div class="form-group col-sm-6">
			<input type="text" class="form-control form-control-sm" id="po_num" placeholder=<?= cclang("Po Num" )?>/>
		</div>
		<div class="form-group col-sm-6">
			<input type="text" class="form-control form-control-sm" id="po_name" placeholder=<?= cclang("Po Name" )?>/>
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
