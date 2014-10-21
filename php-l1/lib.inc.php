<?php

function drawMenu($menu, $vertical = true) {
    $style = "";

    if (!$vertical) {
        $style = " style='display:inline;margin-right:15px;'";
    }
    echo "<ul>";
    foreach ($menu as $item) {
        echo "<li$style>";
        echo "<a href='{$item['href']}'>${item['link']}</a>";
        echo "</li>";
    }
    echo "</ul>";
}

function drawTable($cols = 10, $rows = 10, $color = "yellow") {
        echo "<table border='1' width='300'>";
        for ($tr = 1; $tr <= $rows; $tr++) {
            echo "<tr>";
            for ($td = 1; $td <= $cols; $td++) {
                if ($tr == 1 OR $td == 1) {
                    echo "<th style='background:$color'>" . $tr * $td . "</th>";
                } else {
                    echo "<td>" . $tr * $td . "</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    $cols = 10;
    $rows = 10;

    $color = "yellow";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

