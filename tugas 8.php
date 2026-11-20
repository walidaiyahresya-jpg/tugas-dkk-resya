<?php
if(isset($_POST['daftar'])){
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $umur = $_POST['umur'];
    $hobi = $_POST['hobi'];

    if($nama == "" || $kelas == "" || $umur == "" || $hobi == ""){
        echo "Semua kolom harus diisi!<br>";
    } else {
        echo "Nama: $nama <br>";
        echo "Kelas: $kelas <br>";
        echo "Umur: $umur <br>";
        echo "Hobi: $hobi";
    }
}
?>

<form method="POST">
Nama: <input type="text" name="nama"><br>
Kelas: <input type="text" name="kelas"><br>
Umur: <input type="text" name="umur"><br>
Hobi: <input type="text" name="hobi"><br>
<input type="submit" name="daftar" value="Daftar">
</form>