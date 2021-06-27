<?php
session_start();

ini_set("display_errors", 1);
ini_set("error_reporting", E_ALL);

require_once "config.php";

session_destroy();

header("Location: " . BASE_URL . "/login.php");
