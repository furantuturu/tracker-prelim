<?php

use Classes\Session;

$db = getDatabaseClass();
$uploadedPDFS = $db->query("SELECT * FROM uploads ORDER BY created_at DESC")->getAll();

$uploadErr = "";
if (Session::get('fileexists')) {
    $uploadErr = Session::get('fileexists'); 
} else if (Session::get('filetypeerr')) {
    $uploadErr = Session::get('filetypeerr');
} else if ( Session::get('fileerror')) {
    $uploadErr =  Session::get('fileerror');
}

return view('attach.view.php', [
    'hasTrackerClass' => "",
    'title' => "Upload PDF",
    'uploadErr' => $uploadErr,
    'uploadSucc' => Session::get('filesuccess'),
    'fileDel' => Session::get('filedelete'),
    'uploadedPDFS' => $uploadedPDFS
]);