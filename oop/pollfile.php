<?php
include "Poll_file.php";
$naam = "test";

$MijnPoll = new Poll_file();
$MijnPoll->haalOp($naam);
$MijnPoll->toon($naam);
$MijnPoll->verwerkStem($naam);
$MijnPoll->updatePoll($naam);


?>