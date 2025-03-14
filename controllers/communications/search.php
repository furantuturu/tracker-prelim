<?php

$searchVal = sanitize($_POST['search-communication']);

redirect("/communications?q={$searchVal}");