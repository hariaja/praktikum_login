<?php

require '../config/config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$cek_data = "SELECT * FROM users WHERE email = '$email'";
$query_cek = mysqli_query($conn, $cek_data);

if (mysqli_num_rows($query_cek) > 0) {
  $response['error'] = '403';
  $response['message'] = 'Akun sudah tersedia';
} else {

  $query = "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$password')";
  $hasil = mysqli_query($conn, $query);

  if ($hasil) {
    $response['error'] = '200';
    $response['message'] = 'Akun berhasil dibuat';
  } else {
    $response['error'] = '401';
    $response['message'] = 'Akun gagal dibuat';
  }
}

echo json_encode($response);
