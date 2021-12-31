<?php

require '../config/config.php';

$email = $_POST['email'];
$current = md5($_POST['current']);
$new = md5($_POST['new']);

$check_user = "SELECT * FROM users WHERE email = '$email' and password = '$current'";
$hasil = mysqli_query($conn, $check_user);

if (mysqli_num_rows($hasil) > 0) {
  $update_pass = mysqli_query($conn, "UPDATE users SET password = '$new' WHERE email = '$email'");
  if (mysqli_num_rows($hasil) > 0) {
    $response['error'] = "200";
    $response['message'] = "Password berhasil diubah";
  } else {
    $response['error'] = "401";
    $response['message'] = "Password tidak diubah";
  }
} else {
  $response['error'] = "403";
  $response['message'] = "Password lama tidak sesuai";
}

echo json_encode($response);
