<form autocomplete="off">
  <div class="row">
    
		<div class="form-group col-sm-6">
			<input type="text" class="form-control form-control-sm" id="rank_r_id" placeholder=<?= cclang("Rank R Id" )?>/>
		</div>
		<div class="form-group col-sm-6">
			<input type="text" class="form-control form-control-sm" id="a_fname" placeholder=<?= cclang("A Fname" )?>/>
		</div>
		<div class="form-group col-sm-6">
			<input type="text" class="form-control form-control-sm" id="a_lname" placeholder=<?= cclang("A Lname" )?>/>
		</div>
		<div class="form-group col-sm-6">
			<input type="text" class="form-control form-control-sm" id="position_po_id" placeholder=<?= cclang("Position Po Id" )?>/>
		</div>
		<div class="form-group col-sm-6">
			<input type="text" class="form-control form-control-sm" id="affiliation_af_id" placeholder=<?= cclang("Affiliation Af Id" )?>/>
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
