<?php 

$string = "<div class=\"container-fluid\">
        <h3 style=\"margin-top:0px\">Baca ".ucfirst($table_name)."</h3>
        <br>
        <table class=\"table\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?= $".$row["column_name"]."; ?></td></tr>";
}

$string .= "\n\t</table>
<a href=\"<?= site_url('".$c_url."') ?>\" class=\"btn btn-primary\"><?=lang('Close')?></a>";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>