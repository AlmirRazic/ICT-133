

<?php
echo 'elo';


$value = 20;
$step = 3;
$i = 0;
while ($i < 10){
    if ($value >= 30){
        echo 'le nombre vaut'.$value.'<br>';
    }else{
        echo 'nombre trop petit';
    }
    $value += $step;
    $i = $i + 1;
}
echo 'chien';
echo $value;
return 0;
?>
<?php?>