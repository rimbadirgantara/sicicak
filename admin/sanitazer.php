<?php 
session_start();
// error_reporting(0);
if (!isset($_SESSION['login'])) {
  header('Location: ../asdf/logout');
  exit;
} elseif ($_SESSION['login']['level'] !== 'admin') {
	header('Location: ../dashboard');
  exit;
}
 ?>