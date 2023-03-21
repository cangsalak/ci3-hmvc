<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated <?=setting("animation")?>  delay-2s">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <i class="ti-pencil-alt"></i> 
        <?=ucwords($title_module)?>
      </div>
      <div class="card-body">
        <form id="form" action="<?=$action?>" autocomplete="off">
          
					<div class="form-group">
					<label for="r_sname" ><?=cclang('R Sname')?></label>
						<input type="text" class="form-control form-control-sm" name="r_sname" id="r_sname" value="<?=$r_sname?>" placeholder=<?= cclang("R Sname")?> >
					</div>

					<div class="form-group">
					<label for="r_fname" ><?=cclang('R Fname')?></label>
						<input type="text" class="form-control form-control-sm" name="r_fname" id="r_fname" value="<?=$r_fname?>" placeholder=<?= cclang("R Fname")?> >
					</div>


          <input type="hidden" name="params" value="<?=strtolower($params)?>">

        <div class="mt-4">
          <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger">
            <?=cclang("cancel")?>
          </a>
          <button type="submit" id="submit" name="submit" class="btn btn-sm btn-primary">
            <?=cclang("save")?>
          </button>
        </div>

        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$("#form").submit(function(e){
e.preventDefault();
var me = $(this);
$("#submit").prop('disabled',true).html('Loading...');
$(".form-group").find('.text-danger').remove();
$.ajax({
      url             : me.attr('action'),
      type            : 'post',
      data            :  new FormData(this),
      contentType     : false,
      cache           : false,
      dataType        : 'JSON',
      processData     :false,
      success:function(json){
        if (json.success==true) {
          location.href = json.redirect;
          return;
        }else {
          $("#submit").prop('disabled',false)
                      .html('<?=cclang("save")?>');
          $.each(json.alert, function(key, value) {
            var element = $('#' + key);
            $(element)
            .closest('.form-group')
            .find('.text-danger').remove();
            $(element).after(value);
          });
        }
      }
    });
});
</script>
