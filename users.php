<?php

require 'config/config.php';

$users = "SELECT id, name, email FROM users";
$hasil = mysqli_query($conn, $users);

if (mysqli_num_rows($hasil) > 0) {
  while ($row = $hasil->fetch_assoc()) {
    $response['users'][] = $row;
    $response['error'] = '200';
  }
} else {
  $response['error'] = "400";
  $response['users'][] = "";
}
echo json_encode($response);
