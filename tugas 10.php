<?php
if(isset($_POST['hitung'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    // bersihin titik koma biar bisa dihitung
    $harga = str_replace(".", "", $harga);
    $harga = str_replace(",", ".", $harga);
    $harga = (float)$harga;
    $jumlah = (float)$jumlah;

    $total = $harga * $jumlah;

    if($total > 100000){
        $diskon = $total * 0.10;
    } else {
        $diskon = 0;
    }

    $bayar = $total - $diskon;

    echo "=== STRUK BELANJA ===<br>";
    echo "Nama Barang : " . $nama . "<br>";
    echo "Harga : Rp " . number_format($harga, 0, ',', '.') . "<br>";
    echo "Jumlah : " . $jumlah . "<br>";
    echo "Total Belanja : Rp " . number_format($total, 0, ',', '.') . "<br>";
    echo "Diskon 10% : Rp " . number_format($diskon, 0, ',', '.') . "<br>";
    echo "Total Bayar : Rp " . number_format($bayar, 0, ',', '.') . "<br>";
}
?>

<form method="POST" action="">
Nama Barang: <input type="text" name="nama"><br>
Harga: <input type="text" name="harga"><br>
Jumlah: <input type="text" name="jumlah"><br>
<input type="submit" name="hitung" value="Hitung">
</form>