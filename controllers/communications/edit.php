<?php

use Classes\Session;

$id = $_GET['id'];

if (empty($id)) {
    redirect('/communications');
}

$db = getDatabaseClass();
$currCommunication = $db->query("SELECT * FROM communications WHERE communication_id = :id" , [
    ':id' => $id
])->get();

$fileErr = "";
if (Session::get('fileexists')) {
    $fileErr = Session::get('fileexists'); 
} else if (Session::get('filetypeerr')) {
    $fileErr = Session::get('filetypeerr');
} else if (Session::get('fileerror')) {
    $fileErr =  Session::get('fileerror');
}

return view('communications/edit.view.php', [
    'hasTrackerClass' => "",
    'title' => "Edit Communication",
    "emptyField" => Session::get("emptyfielderror"),
    "dayErr" => Session::get("dayerror"),
    "uploadErr" => Session::get("uploaderror"),
    "fileErr" => $fileErr,
    "currCom" => $currCommunication
]);

