<?php

use Classes\Session;
use Classes\ValidateFile;

$targetDir = "uploads/";
$targetPdfFile = basename($_FILES['attachment']['name']);
$uploadDir = $targetDir . $targetPdfFile;
$pdfFileType = strtolower(pathinfo($targetPdfFile, PATHINFO_EXTENSION));

makeDirectory($targetDir);

if (ValidateFile::validate($pdfFileType, $uploadDir)) {
    redirect('/attach');
}

if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadDir)) {
    $db = getDatabaseClass();

    $db->query("INSERT INTO uploads (filename) VALUES (:pdf)", [
        ':pdf' => $targetPdfFile
    ]);

    Session::flash('filesuccess','PDF File has been uploaded');
} else {
    Session::flash('fileerror','PDF file can\'t be uploaded');
}

redirect('/attach');

