<?php 

$string = "<!doctype html>
<html>
    <head>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>".str_replace("_"," ", ucfirst($table_name))." List</h2>
        <table class=\"word-table\" style=\"margin-bottom: 10px\">
            <tr>
                <th>No</th>";
                    foreach ($non_pk as $row) {
                        $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
                    }
                    $string .= "\n\t\t
                                </tr>";
                    $string .= "<?php
                                foreach ($" . $c_url . "_data as \$$c_url)
                                {
                                    ?>
                                    <tr>";

                    $string .= "\n\t\t      <td><?php echo ++\$start ?></td>";

                    foreach ($non_pk as $row) {
                        $string .= "\n\t\t      <td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
                    }

                    $string .=  "\t
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>";


$hasil_view_pdf = createFile($string, $target."views/" . $v_pdf_file);

?>