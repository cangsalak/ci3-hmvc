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
					<label for="af_sname" ><?=cclang('Af Sname')?></label>
						<input type="text" class="form-control form-control-sm" name="af_sname" id="af_sname" value="<?=$af_sname?>" placeholder=<?= cclang("Af Sname")?> >
					</div>

					<div class="form-group">
					<label for="af_fname" ><?=cclang('Af Fname')?></label>
						<input type="text" class="form-control form-control-sm" name="af_fname" id="af_fname" value="<?=$af_fname?>" placeholder=<?= cclang("Af Fname")?> >
					</div>

					<div class="form-group">
					<label for="af_address" ><?=cclang('Af Address')?></label>
						<input type="text" class="form-control form-control-sm" name="af_address" id="af_address" value="<?=$af_address?>" placeholder=<?= cclang("Af Address")?> >
					</div>

					<div class="form-group">
					<label for="af_web" ><?=cclang('Af Web')?></label>
						<input type="text" class="form-control form-control-sm" name="af_web" id="af_web" value="<?=$af_web?>" placeholder=<?= cclang("Af Web")?> >
					</div>

					<div class="form-group">
					<label for="af_social" ><?=cclang('Af Social')?></label>
						<input type="text" class="form-control form-control-sm" name="af_social" id="af_social" value="<?=$af_social?>" placeholder=<?= cclang("Af Social")?> >
					</div>

					<div class="form-group">
					<label for="af_tel" ><?=cclang('Af Tel')?></label>
						<input type="number" class="form-control form-control-sm" name="af_tel" id="af_tel" value="<?=$af_tel?>" placeholder=<?= cclang("Af Tel")?> >
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
