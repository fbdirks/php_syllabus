<?php

include "Poll_db.php";

$poll = new Poll_db();
if (isset($_POST['id'])) {
	$poll->haalOp($_POST['id']);
} else {
	$poll->wijzigen();
}

