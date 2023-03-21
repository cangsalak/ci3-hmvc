<?php 

$string = "<div class=\"container-fluid\">
        <h3 style=\"margin-top:0px\"><?= \$button ?> ".ucfirst($table_name)."</h3>
        <hr>
        <form action=\"<?= \$action; ?>\" method=\"post\" enctype=\"multipart/form-data\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?= form_error('".$row["column_name"]."') ?></label>
            <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?= $".$row["column_name"]."; ?></textarea>
        </div>";
    } else {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["data_type"]."\">".label($row["column_name"])." <?= form_error('".$row["column_name"]."') ?></label>
            <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" autocomplete=\"off\" value=\"<?= $".$row["column_name"]."; ?>\" />
        </div>";
    }
}
$string .= "\n\t    <input type=\"hidden\" name=\"".$pk."\" value=\"<?= $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-primary\"><?= \$button ?></button> ";
$string .= "\n\t    <a href=\"<?= site_url('".$c_url."') ?>\" class=\"btn btn-default\"><?=lang('Cancelled')?></a>";
$string .= "\n\t</form>";

$hasil_view_form = createFile($string, $target."views/". $v_form_file);

?>