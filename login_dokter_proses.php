<?php
session_start();
include "conf/conn.php";
// Ambil nilai dari formulir login
$username = $_POST['username'];
$password = md5($_POST['password']);

// Query untuk memeriksa apakah user ada dalam tabel user
$query = "SELECT * FROM user WHERE username='$username'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($password === $row['password']) {
        // Jika kata sandi cocok, set session dan peran (role)
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role']; // Misalnya, 'admin' atau 'dokter'

        // Redirect ke halaman sesuai peran
        if ($_SESSION['role'] === 'admin') {
            header('Location: index_admin.php');
        } elseif ($_SESSION['role'] === 'dokter') {
            // header('Location: index_dokter.php');
            header('Location: index_dokter.php');
        } else {
            // Jika peran tidak diketahui
            echo "Peran tidak valid";
        }
    } else {
        // Jika kata sandi tidak cocok
        echo "Kata sandi salah";
    }
} else {
    // Jika user tidak ditemukan
    echo "User tidak ditemukan";
}

$conn->close();
?>