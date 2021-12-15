<a href="index.php"><- Go Back</a><br>
<?php
session_start();
if($_SESSION['zalogowany']!=true) {
    die("Nie Autoryzowano!");
}
require_once "config.php";
$ext = $_GET['ext'];
delete_directory($wpPath."/wp-content/plugins/".$ext);
echo "Gotowe!";
header( "refresh:2;url=index.php" );
exit;
function delete_directory($dirname) {
    if (is_dir($dirname))
        $dir_handle = opendir($dirname);
    if (!$dir_handle)
        return false;
    while($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname."/".$file))
                unlink($dirname."/".$file);
            else
                delete_directory($dirname.'/'.$file);
        }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
}