<?php

use Classes\Session;
use Classes\ValidateFile;

$id = $_GET['id'];
$subject = sanitize($_POST['subject']);
$sender = sanitize($_POST['sender']);
$docdate = $_POST['date-doc'];
$category = $_POST['category'];
$actReq = $_POST['action-requested'];
$status = $_POST['status'];
$targetdate = $_POST['date-target'];
$overdue = $_POST['days-overdue'];
$receivedDate = $_POST['date-received'];
$newPdfFile = basename($_FILES['attachment']['name']) == "" ? null : basename($_FILES['attachment']['name']);
$oldPdfFile = $_POST['_oldpdffile'];

if (isEmpty($subject, $sender, $docdate, $category, $actReq, $status, $targetdate, $overdue, $receivedDate)) {
    Session::flash('emptyfielderror', "Some of the input fields are left empty");
    redirect("/communications-edit?id={$id}");
}

if ((int)$overdue < 1 || is_float($overdue)) {
    Session::flash('dayerror', "Wrong day format");
    redirect("/communications-edit?id={$id}#days-overdue");
}

// for attachment
if (!empty($newPdfFile)) {    
    unlink($oldPdfFile);
    if ($_FILES['attachment']['error'] !== 0) {
        Session::flash('uploaderror', "Something wrong while uploading the file");
        redirect("/communications-edit?id={$id}#attachment");
    }

    $targetDir = "communication-uploads/";
    $uploadDir = $targetDir . $newPdfFile;
    $pdfFileType = strtolower(pathinfo($newPdfFile, PATHINFO_EXTENSION));
    
    makeDirectory($targetDir);
    
    if (ValidateFile::validate($pdfFileType, $uploadDir)) {
        redirect("/communications-edit?id={$id}#attachment");
    }

    if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadDir)) {
        // nothing to do
    } else {
        Session::flash('uploaderror', "Something wrong while uploading the file");
        redirect("/communications-edit?id={$id}#attachment");
    }
}

$db = getDatabaseClass();

$db->query("UPDATE communications SET sender = :sender, subject = :subject, docdate = :docdate, category = :category, action_required = :action_required, status = :status, target_date = :target_date, overdue = :overdue, date_received = :date_received, pdf_file = :pdf_file WHERE communication_id = :id", [
    ':sender' => $sender,
    ':subject' => $subject,
    ':docdate' => $docdate,
    ':category' => $category,
    ':action_required' => $actReq,
    ':status' => $status,
    ':target_date' => $targetdate,
    ':overdue' => $overdue,
    ':date_received' => $receivedDate,
    ':pdf_file' => $newPdfFile,
    ':id' => $id
]);

redirect('/communications');