
<!--name: Almir Razic
title: exo2_array_and_string
date: 02.12.2019
version: 1.0
-->







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
<html>



<h1>CSS Calendar</h1>

<div class="month">
    <ul>
        <li class="prev">&#10094;</li>
        <li class="next">&#10095;</li>
        <li>
            August<br>
            <span style="font-size:18px">2017</span>
        </li>
    </ul>
</div>

<ul class="weekdays">
    <li>Mo</li>
    <li>Tu</li>
    <li>We</li>
    <li>Th</li>
    <li>Fr</li>
    <li>Sa</li>
    <li>Su</li>
</ul>

<ul class="days">
    <?php
    $jours = date("j");
    $mois = date("F");
    for ($q = 1; $q < $jours; $q++) {
        /*foreach($jours as $element) {
        echo $element.'<br>'; 			//affichera toutes les valeurs de $jours*/
        if ($q == $jours) {
            echo '<td class="active">';
            echo $q;
        } else {
            echo '<td >';
            echo $q;
        }

        if ($q == 7 || $q == 14 || $q == 21 || $q == 28) {
            echo '</td>';
            echo '</tr>';
        }
    }

    ?>
    }
    <li>1</li>
    <li>2</li>
    <li>3</li>
    <li>4</li>
    <li>5</li>
    <li>6</li>
    <li>7</li>
    <li>8</li>
    <li>9</li>
    <li><span class="active">10</span></li>
    <li>11</li>
    <li>12</li>
    <li>13</li>
    <li>14</li>
    <li>15</li>
    <li>16</li>
    <li>17</li>
    <li>18</li>
    <li>19</li>
    <li>20</li>
    <li>21</li>
    <li>22</li>
    <li>23</li>
    <li>24</li>
    <li>25</li>
    <li>26</li>
    <li>27</li>
    <li>28</li>
    <li>29</li>
    <li>30</li>
    <li>31</li>
</ul>


</html>