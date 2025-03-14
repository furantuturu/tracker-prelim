<?php

use Classes\Session;

$db = getDatabaseClass();
$uploadedPDFS = $db->query("SELECT * FROM uploads ORDER BY created_at DESC")->getAll();

$fileErr = "";
if (Session::get('fileexists')) {
    $fileErr = Session::get('fileexists'); 
} else if (Session::get('filetypeerr')) {
    $fileErr = Session::get('filetypeerr');
} else if ( Session::get('fileerror')) {
    $fileErr =  Session::get('fileerror');
}

return view('attach.view.php', [
    'hasTrackerClass' => "",
    'title' => "Upload PDF",
    'fileErr' => $fileErr,
    'fileSucc' => Session::get('filesuccess'),
    'fileDel' => Session::get('filedelete'),
    'uploadedPDFS' => $uploadedPDFS
]);