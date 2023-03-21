<?php 
// var_dump($_SESSION);
?>

<div class="row">
  <div class="col-md-12 col-xl-12 mx-auto animated <?=setting("animation")?>  delay-2s">
    <div class="card m-b-30">
      <div class="card-header bg-primary text-white">
        <i class="ti-files"></i> 
        <?=ucwords($title_module)?>
      </div>
      <div class="card-body">
        <div class="mb-1">
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


<script type="text/javascript">
$(document).ready(function(){
var table;
//datatables
  table = $('#table').DataTable({
      "processing": true, //คุณสมบัติควบคุมตัวบ่งชี้การประมวลผล
      "serverSide": true, //โหมดการประมวลผลฝั่งเซิร์ฟเวอร์ของ DataTables ควบคุมคุณลักษณะ
      "order": [], //ไม่มีคำสั่งเริ่มต้น
      "searching": false,
      // "info": false,
      "bLengthChange": false,
      oLanguage: {
          sProcessing: '<i class="fa fa-spinner fa-spin fa-fw"></i> กำลังประมวลผล...'
      },
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?=url("commission/json")?>",
          "type": "POST",
          "data":function(data){
						data.image = $("#image").val();
						data.rank_r_id = $("#rank_r_id").val();
						data.a_fname = $("#a_fname").val();
						data.a_lname = $("#a_lname").val();
						data.position_po_id = $("#position_po_id").val();
						data.affiliation_af_id = $("#affiliation_af_id").val();
          }
      },
      //Set column definition initialisation properties.
        "columnDefs": [
					{
              "className": "text-center",
              'orderable': true,
              'targets': 0
          },
					{
              'orderable': true,
              'targets': 1
          },
					{
              'orderable': true,
              'targets': 2
          },
					{
              'orderable': true,
              'targets': 3
          },
					{
              'className': 'text-center',
              'orderable': false,
              'targets': 4
          }
      ],
    });

  $("#reload").click(function(){
	$("#rank_r_id").val("");
	$("#image").val("");
	$("#a_fname").val("");
	$("#a_lname").val("");
	$("#position_po_id").val("");
	$("#affiliation_af_id").val("");
    table.ajax.reload();
  });

  $(document).on("click","#filter-show",function(e){
    e.preventDefault();
    $('.modal-dialog').addClass('modal-md');
    $("#modalTitle").text('Filter');
    $('#modalContent').load($(this).attr('href'));
    $("#modalGue").modal('show');
  });

  $(document).on("click","#delete",function(e){
    e.preventDefault();
    $('.modal-dialog').addClass('modal-sm');
    $("#modalTitle").text('<?=cclang("confirm")?>');
    $('#modalContent').html(`<p class="mb-4"><?=cclang("delete_description")?></p>
                              <button type='button' class='btn btn-default btn-sm' data-dismiss='modal'><?=cclang("cancel")?></button>
                              <button type='button' class='btn btn-primary btn-sm' id='yes-rmv' data-id=`+$(this).attr('alt')+`  data-url=`+$(this).attr('href')+`><?=cclang("delete_action")?></button>
                              `);
    $("#modalGue").modal('show');
  });

  $(document).on('click','#yes-rmv',function(e){
    $(this).prop('disabled',true)
            .text('ประมวลผล...');
    $.ajax({
            url:$(this).data('url'),
            type:'POST',
            cache:false,
            dataType:'json',
            success:function(json){
              $('#modalGue').modal('hide');
              swal(json.msg, {
                icon:json.type_msg
              })
              $('#table').DataTable().ajax.reload();
            }
          });
  });
});
</script>
