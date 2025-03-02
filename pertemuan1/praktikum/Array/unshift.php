<?php

$laptop = ["Asus", "Lenovo", "HP", "Dell"];

//menambahkan element di awal
array_unshift($laptop, "HP", "Acer");

//hasil
echo "hasil";
foreach ($laptop as $p) {
    echo "<br>". $p;
    }
?>