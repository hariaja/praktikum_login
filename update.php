<?php

require 'config/config.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

$update = "UPDATE users SET name='$name', email='$email' WHERE id='$id'";
$result = mysqli_query($conn, $update);

if ($result > 0) {
  $ambil = mysqli_query($conn, "SELECT id, name, email FROM users WHERE email = '$email'");

  if (mysqli_num_rows($ambil) > 0) {
    while ($row = $ambil->fetch_assoc()) {
      $response['user'] = $row;
    }
    $response['error'] = '200';
    $response['message'] = "User berhasil diubah";
  } else {
    $response['user'] = (object) [];
    $response['error'] = '401';
    $response['message'] = "User terubah tapi tidak ada data yang diambil";
  }
} else {
  $response['user'] = (object) [];
  $response['error'] = '403';
  $response['message'] = "User gagal Diubah";
}

echo json_encode($response);
