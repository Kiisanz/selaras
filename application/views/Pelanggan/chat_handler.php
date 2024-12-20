<?php
include 'config.php';

// Menerima pesan dari pengguna dan menyimpannya ke database
if(isset($_POST['chatting'])){
  $username = $_POST['username'];
  $message = $_POST['message'];

  $query = "INSERT INTO chatting (username, message) VALUES ('{$username}', '{$message}')";

  if(mysqli_query($koneksi, $query)){
    echo "Pesan berhasil dikirim.";
  }
}

// Mengambil pesan dari database
$query = "SELECT * FROM messages";
$result = mysqli_query($koneksi, $query);
$chat = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($chat);
?>