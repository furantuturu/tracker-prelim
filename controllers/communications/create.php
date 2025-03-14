<?php

use Classes\Session;

$fileErr = "";
if (Session::get('fileexists')) {
    $fileErr = Session::get('fileexists'); 
} else if (Session::get('filetypeerr')) {
    $fileErr = Session::get('filetypeerr');
} else if (Session::get('fileerror')) {
    $fileErr =  Session::get('fileerror');
}

return view('communications/create.view.php', [
    'hasTrackerClass' => "",
    'title' => "Create Communication",
    "emptyField" => Session::get("emptyfielderror"),
    "dayErr" => Session::get("dayerror"),
    "uploadErr" => Session::get("uploaderror"),
    "fileErr" => $fileErr
]);