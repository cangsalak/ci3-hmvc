<?php 

$string = "<div class=\"container-fluid\">

        <h2 style=\"margin-top:0px\"><i class=\"fa fa-file\"> </i>&nbsp;<?=lang('List')?> ".ucfirst($table_name)."</h2>
        <hr>
        <div class=\"row\" style=\"margin-bottom: 10px\">
            <div class=\"col-md-4\">
                <?= anchor(site_url('".$c_url."/create'),'<i class=\"fa fa-plus-square\"></i>  '.lang('create'), 'class=\"btn btn-primary\"'); ?>
            </div>
            <div class=\"col-md-4 text-center\">
                <div style=\"margin-top: 8px\" id=\"message\">
                    <?= \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class=\"col-md-1\">
            </div>
            <div class=\"col-md-3 text-right\">
                <form action=\"<?= site_url('$c_url'); ?>\" class=\"form-inline\" method=\"get\">
                    <div class=\"input-group\">
                    <input type=\"text\" class=\"form-control\" name=\"q\" value=\"<?= \$q; ?>\">
                        <div class=\"input-group-append\">
                    
                        <?php 
                            if (\$q <> '')
                            {
                                ?>
                                <a href=\"<?= site_url('$c_url'); ?>\" class=\"btn btn-outline-secondary\"><i class=\"fa fa-search-minus\"></i></a>
                                <?php
                            }
                        ?>
                            <button class=\"btn btn-outline-secondary\" type=\"submit\"><i class=\"fa fa-search\"></i> <?=lang('Search')?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class=\"col-sm-12 table table-responsive\">

        <table class=\"table table-hover table-bordered dataTable\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\" role=\"grid\" aria-describedby=\"dataTable_info\" style=\"width: 100%;\">
            <tr class=\"text-center\">
    <th><?=lang('No')?></th>";
    foreach ($non_pk as $row) {
        $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
    }
    $string .= "\n\t\t<th><?=lang('Action')?></th></tr>";
    $string .= "<?php foreach ($" . $c_url . "_data as \$$c_url){ ?>
                <tr>";
    $string .= "\n\t\t\t<td width=\"80px\"><?= ++\$start ?></td>";
    foreach ($non_pk as $row) {
        $string .= "\n\t\t\t<td><?= $" . $c_url ."->". $row['column_name'] . " ?></td>";
    }
    $string .= "<td>
        <div class=\"btn-group\" role=\"group\" aria-label=\".$c_url.\">
            <a href=\"<?=site_url('$c_url/read/'.\$$c_url->$pk)?>\" class=\"btn btn-primary\"><i class=\"fa fa-search-plus\"></i></a>
            <a href=\"<?=site_url('$c_url/update/'.\$$c_url->$pk)?>\" class=\"btn btn-info\"><i class=\"fa fa-pencil-square-o\"></i></a>

            <a href=\"\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#happy\">
                <i class=\"fa fa-trash\"></i>
            </a>
        </div></td>
        

        <!-- Modal -->
        <div class=\"modal fade\" id=\"happy\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"happyLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"happyLabel\">Clear Data?</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
            <div class=\"modal-body\">
                <?=lang('Are you sure you want to delete this?')?>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\"><?=lang('Cancelled')?></button>
                <?= anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),lang('submit'),'class=\"btn btn-danger\"')?>
            </div>
            </div>
        </div>
        </div>";
        echo "\n\t\t\t</td>";

$string .=  "\n\t\t</tr>
        <?php } ?>
        </table>
        </div>
        <div class=\"row\">
            <div class=\"col-md-6\">
                <a href=\"#\" class=\"btn btn-primary\"><?=lang('Total')?> : <?= \$total_rows ?></a>";
if ($export_excel == '1') {
    $string .= "\n\t\t<?= anchor(site_url('".$c_url."/excel'), '<i class=\"fa fa-file-excel-o\"></i> '.lang('Excel'), 'class=\"btn btn-primary\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?= anchor(site_url('".$c_url."/word'), '<i class=\"fa fa-file-word-o\"></i> '.lang('Word'), 'class=\"btn btn-primary\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?= anchor(site_url('".$c_url."/pdf'), '<i class=\"fa fa-file-pdf-o\"></i> '.lang('PDF'), 'class=\"btn btn-primary\"'); ?>";
}
$string .= "\n\t    </div>
            <div class=\"col-md-6 text-right\">
                <?= \$pagination ?>
            </div>
        </div>";


$hasil_view_list = createFile($string, $target."views/". $v_list_file);

?>