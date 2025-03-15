<?php

$db = getDatabaseClass();

if (empty($_GET['s']) && empty($_GET['d'])) {
    $communicationReports = $db->query("SELECT communication_id, sender, subject, docdate, status FROM communications ORDER BY created_at DESC")->getAll();
} else {
    $status = $_GET['s'];
    $docdate = $_GET['d'];
    $filtered = true;

    $communicationReports = $db->query("SELECT communication_id, sender, subject, docdate, status FROM communications WHERE status = :status AND docdate = :docdate ORDER BY created_at DESC", [
        ':status' => $status,
        ':docdate' => $docdate
    ])->getAll();
}

return view('reports.view.php', [
    'hasTrackerClass' => "tracker-main",
    'title' => "Reports Dashboard",
    'reports' => $communicationReports,
    'filtered' => $filtered ?? false
]);