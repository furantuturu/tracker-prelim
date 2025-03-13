<?php

use Classes\Session;

$id = $_POST['_id'];
$file = $_POST['_file'];

$db = getDatabaseClass();
$db->query("DELETE FROM uploads WHERE upload_id = :id", [
    ':id' => $id
]);

unlink($file);

Session::flash("filedelete", "PDF File deleted");

redirect('/attach#uploaded-files');