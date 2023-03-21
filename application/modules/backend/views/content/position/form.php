<div class="row">
    <div class="col-md-12 col-xl-10 mx-auto animated <?=setting("animation")?>  delay-2s">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <i class="ti-pencil-alt"></i>
                <?=ucwords($title_module)?>
            </div>
            <div class="card-body">
                <form id="form" action="<?=$action?>" autocomplete="off">
                    <div class="row">

                        <div class="form-group col-sm-12 col-md-8">
                            <label for="po_name"><?=cclang('Po Name')?></label>
                            <input type="text" class="form-control form-control-sm" name="po_name" id="po_name"
                                value="<?=$po_name?>" placeholder=<?= cclang("Po Name")?>>
                        </div>

                        <div class="form-group col-sm-12 col-md-4">
                            <label for="po_num"><?=cclang('Po Num')?></label>
                            <input type="text" class="form-control form-control-sm" name="po_num" id="po_num"
                                value="<?=$po_num?>" placeholder=<?= cclang("Po Num")?>>
                        </div>

                        <div class="form-group col-sm-12 col-md-12">
                            <label for="po_details"><?=cclang('Po Details')?></label>
                            <textarea class="form-control" rows="3" name="po_details"
                                id="po_details"><?=$po_details?></textarea>
                        </div>
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
$("#form").submit(function(e) {
    e.preventDefault();
    var me = $(this);
    $("#submit").prop('disabled', true).html('Loading...');
    $(".form-group").find('.text-danger').remove();
    $.ajax({
        url: me.attr('action'),
        type: 'post',
        data: new FormData(this),
        contentType: false,
        cache: false,
        dataType: 'JSON',
        processData: false,
        success: function(json) {
            if (json.success == true) {
                location.href = json.redirect;
                return;
            } else {
                $("#submit").prop('disabled', false)
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