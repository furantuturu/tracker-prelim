<?php

$status = $_POST['status'];
$docdate = $_POST['date-doc'];

redirect("/reports?s={$status}&d={$docdate}");