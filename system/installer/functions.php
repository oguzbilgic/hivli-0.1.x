<?php
function newLog($type, $method, $dir)
{
    switch ($method) {
        case 'add':
            $pre = ' +  ';
            break;
        case 'delete':
            $pre = ' -  ';
            break;
        case 'update':
            $pre = '+/- ';
            break;
        case '0':
            $pre = ' 0  ';
            break;
    }
    print '>> ' . $pre . ' ' . $type . '   ' . $dir . "\n";
}
function copyFile($source, $destination)
{
    if (file_exists($destination)) {
        newLog('file', '0', $source);
    } else {
        copy($source, $destination);
        newLog('file', 'add', $source);
    }
}

function copyFolder($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                copyFolder($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file);
                newLog('file', 'add', $dst . '/' . $file);
            } 
        } 
    } 
    closedir($dir); 
} 


function createDir($path)
{
    if (is_dir($path)) {
        newLog('dir ', '0', $path);
    } else {
        mkdir($path);
        newLog('dir ', 'add', $path);
    }
}
function deleteDir($path)
{
    if (! is_dir($path)) {
        newLog('dir ', '0', $path);
    } else {
        removeDir($path);
        newLog('dir ', 'delete', $path);
    }
}
function updateFile($path, $string)
{
    $fp = fopen($path, 'w');
    fwrite($fp, $string);
    fclose($fp);
    newLog('file', 'update', $path);
}
function createEditFile($path, $string)
{
	if (is_file($path)){
		newLog('file', 'update', $path);
	} else {
		newLog('file', 'add', $path);
	}
    $fp = fopen($path, 'w+');
    fwrite($fp, $string);
    fclose($fp);
}
function createFile($path)
{
    $fp = fopen($path, 'w+');
    fclose($fp);
    newLog('file', 'add', $path);
}
function removeDir($dirname)
{
    if (is_dir($dirname))
        $dir_handle = opendir($dirname);
    if (! $dir_handle)
        return false;
    while ($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (! is_dir($dirname . "/" . $file))
                unlink($dirname . "/" . $file);
            else {
                $a = $dirname . '/' . $file;
                removedir($a);
            }
        }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
}
?>