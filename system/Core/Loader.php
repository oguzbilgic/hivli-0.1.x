<?php
require_once 'system/Core/Core.php';
/*
 * Include Basic MVC Classes
 */
foreach (glob('system/Core/MVC/*.php') as $class_filename) {
    require_once ($class_filename);
}
foreach (glob('system/Core/MVC/Model/*.php') as $class_filename) {
    require_once ($class_filename);
}
foreach (glob('system/Core/MVC/Controller/*.php') as $class_filename) {
    require_once ($class_filename);
}
foreach (glob('system/Core/MVC/Plugin/*.php') as $class_filename) {
    require_once ($class_filename);
}
require_once 'system/Library/Library.php';
/*
 * Include Core Library Classes
 */
foreach (glob('system/Library/*.php') as $class_filename) {
    require_once ($class_filename);
}


