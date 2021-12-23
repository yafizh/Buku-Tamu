<?php

$mysqli = new mysqli("localhost","root","","db_buku_tamu");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}