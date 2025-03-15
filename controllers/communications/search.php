<?php

$searchVal = sanitize($_POST['search-communication']);

redirect("/communications?p=1&q={$searchVal}");