<?php
require __DIR__."/../config.php" ;

session_start() ;
session_destroy() ;
header("Location: ".$GLOBALS['DOCUMENT_DIR']."index.php");
exit() ;