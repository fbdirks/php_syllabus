<?php

session_start();

session_unset();

session_destroy();

header('Location: poll_session_voorbeeld.php');

?>