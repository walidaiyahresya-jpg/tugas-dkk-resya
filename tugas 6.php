<?php
$data = [
    "Sasuke" => 85,
    "Sakura" => 90,
    "Neji" => 80,
    "Naruto" => 75,
    "Shikamaru" => 95
];

echo "<table border='1'>";
echo "<tr><th>Nama</th><th>Nilai</th></tr>";

foreach ($data as $nama => $nilai) {
    echo "<tr>";
    echo "<td>$nama</td>";
    echo "<td>$nilai</td>";
    echo "</tr>";
}

echo "</table>";

$rata = array_sum($data) / count($data);

echo "Rata-rata: " . $rata . "<br>";
echo "Nilai tertinggi: " . max($data) . "<br>";
echo "Nilai terendah: " . min($data);
?>