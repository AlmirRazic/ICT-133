<link href="exo2_array_and_string.css" type="text/css" rel="stylesheet">
<?php

$index = 0;

echo date("F") . '<br>';
echo '<table>';
echo '<tr>';
for ($i = 1; $i < 31; $i++) {

    if (($i % 2 )!= 0){
        echo '<td class="td1">';
        echo $i;
    }else{
        echo '<td class="td2">';
        echo $i;
    }
    if ($i == 7 || $i == 14 || $i == 21 || $i == 28) {
        echo '</td>';
        echo '</tr>';
    }

}

echo '</table>';


?>
