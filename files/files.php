<?php 
include('Models\FilesList.php'); 
use files\Models\FilesList;
?>

<a href="../index.php">НА ГОЛОВНУ</a> <br><br>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    Завантажити файл: <br><br>
    <input type="file" name="filename" ><br><br>
    <input type="submit" value="Завантажити" ><br><br>
</form>

<?php

$upload_dir = 'upload'; // upload
$backup_dir = 'backup'; // upload/backup

if (isset($_FILES['filename'])) { 
    $filename = $_FILES['filename']['name'];
    $tmp_filename = $_FILES['filename']['tmp_name'];
    move_uploaded_file($tmp_filename, "$upload_dir/$filename");
}

$files = new FilesList($upload_dir);
$files->backupFiles($backup_dir, 259200);
$files->printFiles();
$files->deleteTextFilesWith("тест");
$files->reverseWords("source.txt");
?>