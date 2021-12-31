<?php

require 'config/config.php';

$id = $_POST['id'];

$delete = mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");

if ($delete > 0) {
  $response['error'] = '200';
  $response['message'] = 'Akun berhasil Dihapus';
} else {
  $response['error'] = '401';
  $response['message'] = 'Akun gagal Dihapus';
}

echo json_encode($response);
