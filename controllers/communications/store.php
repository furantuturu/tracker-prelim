<?php

use Classes\Session;
use Classes\ValidateFile;

$subject = sanitize($_POST['subject']);
$sender = sanitize($_POST['sender']);
$docdate = $_POST['date-doc'];
$category = $_POST['category'];
$actReq = $_POST['action-requested'];
$status = $_POST['status'];
$targetdate = $_POST['date-target'];
$overdue = $_POST['days-overdue'];
$receivedDate = $_POST['date-received'];
$targetPdfFile = basename($_FILES['attachment']['name']) == "" ? null : basename($_FILES['attachment']['name']);

if (isEmpty($subject, $sender, $docdate, $category, $actReq, $status, $targetdate, $overdue, $receivedDate)) {
    Session::flash('emptyfielderror', "Some of the input fields are left empty");
    redirect('/communications-create');
}

if ((int)$overdue < 1 || is_float($overdue)) {
    Session::flash('dayerror', "Wrong day format");
    redirect('/communications-create#days-overdue');
}

// for attachment
if (!empty($targetPdfFile)) {
    if ($_FILES['attachment']['error'] !== 0) {
        Session::flash('uploaderror', "Something wrong while uploading the file");
        redirect('/communications-create#attachment');
    }

    $targetDir = "communication-uploads/";
    $uploadDir = $targetDir . $targetPdfFile;
    $pdfFileType = strtolower(pathinfo($targetPdfFile, PATHINFO_EXTENSION));
    
    makeDirectory($targetDir);
    
    if (ValidateFile::validate($pdfFileType, $uploadDir)) {
        redirect('/communications-create#attachment');
    }

    if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadDir)) {
        // nothing to do
    } else {
        Session::flash('uploaderror', "Something wrong while uploading the file");
        redirect('/communications-create#attachment');
    }
}

$db = getDatabaseClass();

$db->query("INSERT INTO communications (sender, subject, docdate, category, action_required, status, target_date, overdue, date_received, pdf_file) VALUES (:sender, :subject, :docdate, :category, :action_required, :status, :target_date, :overdue, :date_received, :pdf_file)", [
    ':sender' => $sender,
    ':subject' => $subject,
    ':docdate' => $docdate,
    ':category' => $category,
    ':action_required' => $actReq,
    ':status' => $status,
    ':target_date' => $targetdate,
    ':overdue' => $overdue,
    ':date_received' => $receivedDate,
    ':pdf_file' => $targetPdfFile
]);

redirect('/communications');