<?php
session_start();
require_once 'system/Core/Loader.php';

$front = new Core_Controller_Front;
$front->run();
