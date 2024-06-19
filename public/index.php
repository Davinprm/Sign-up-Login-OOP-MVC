<?php
if (!session_id())
    session_start();

//use bootstraping technique, to call one file that will call every file with init.php
require_once '../app/init.php';

//instancetiate the App class on core file
$app = new App;