<?php

include "Poll_file.php";

$MijnPoll = new Poll_file();
$poll = "test";

$MijnPoll->haalOp($poll);
$MijnPoll->toon();
$MijnPoll->verwerkStem($poll);
$MijnPoll->updatePoll($poll);

?>
