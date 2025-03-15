<?php

$db = getDatabaseClass();

$offset = empty($_GET['p']) ? 0 : ($_GET['p'] - 1) * 5;

if (empty($_GET['q'])) {
    $communications = $db->query("SELECT * FROM communications ORDER BY created_at DESC LIMIT 5 OFFSET {$offset}")->getAll();
    $communicationsLen = $db->query('SELECT count(communication_id) FROM communications')->getAll();
} else {
    $searchVal = $_GET['q'];
    $communications = $db->query("SELECT * FROM communications WHERE communication_id = :id OR sender LIKE :q OR subject LIKE :q ORDER BY created_at DESC LIMIT 5 OFFSET {$offset}", [
        ':id' => $searchVal,
        ':q' => "%{$searchVal}%",
    ])->getAll();
    $communicationsLen =$db->query("SELECT count(communication_id) FROM communications WHERE communication_id = :id OR sender LIKE :q OR subject LIKE :q", [
        ':id' => $searchVal,
        ':q' => "%{$searchVal}%",
    ])->getAll();
}

return view('communications/index.view.php', [
    'hasTrackerClass' => "tracker-main",
    'title' => "Communications Dashboard",
    'communications' => $communications,
    'pageLen' => ceil($communicationsLen[0]["count(communication_id)"] / 5),
    'query' => $_GET['q'] ?? ''
]);