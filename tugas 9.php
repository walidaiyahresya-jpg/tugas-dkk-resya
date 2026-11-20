<form method="POST" action="">
    Angka 1: <input type="number" name="a" required><br><br>
    Operator: 
    <select name="operator">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br><br>
    Angka 2: <input type="number" name="b" required><br><br>
    <input type="submit" name="hitung" value="Hitung">
</form>

<?php
if (isset($_POST['hitung'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $op = $_POST['operator'];
    $hasil = 0;
    $error = false;

    switch ($op) {
        case '+': $hasil = $a + $b; break;
        case '-': $hasil = $a - $b; break;
        case '*': $hasil = $a * $b; break;
        case '/':
            if ($b == 0) {
                echo "<p style='color:red;'>Error: Tidak dapat melakukan pembagian dengan angka nol (0)!</p>";
                $error = true;
            } else {
                $hasil = $a / $b;
            }
            break;
    }

    if (!$error) {
        echo "<h3>Hasil: $a $op $b = $hasil</h3>";
    }
}
?>