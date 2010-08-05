<?php
include 'system/installer/functions/delete/app.php';

$appName = $argv['2'];

deleteApp($appName);

