<?php

use Classes\Session;

$id = $_POST['_id'];
$file = $_POST['_file'];

$db = getDatabaseClass();
$db->query("DELETE FROM communications WHERE communication_id = :id", [
    ':id' => $id
]);

unlink($file);

redirect('/communications');