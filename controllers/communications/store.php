<?php

function sanitize(mixed $data) {
    return htmlspecialchars(trim($data));
}

$subject = sanitize($_POST['subject']);
$sender = sanitize($_POST['sender']);
$docdate = $_POST['date-doc'];
$category = $_POST['category'];
$actReq = $_POST['action-requested'];
$status = $_POST['status'];
$targetdate = $_POST['date-target'];
$overdue = $_POST['days-overdue'];
$receivedate = $_POST['date-received'];

// for attachment
$targetDir = "communication-uploads/";
$targetPdfFile = basename($_FILES['attachment']['name']);
$uploadDir = $targetDir . $targetPdfFile;
$pdfFileType = strtolower(pathinfo($targetPdfFile, PATHINFO_EXTENSION));

