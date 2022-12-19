<?php

//logout.php

if(!isset($_SESSION)){
    session_start();
}

session_destroy();

header("location:../../index.php");

?>