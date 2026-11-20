<?php
function luas($r) {
    return 22/7 * $r * $r;
}

function keliling($r) {
    return 2 * 22/7 * $r;
}

echo "Jari-jari 7<br>";
echo "Luas: " . luas(7) . "<br>";
echo "Keliling: " . keliling(7) . "<br><br>";

echo "Jari-jari 14<br>";
echo "Luas: " . luas(14) . "<br>";
echo "Keliling: " . keliling(14);
?>