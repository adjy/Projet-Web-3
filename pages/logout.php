<?php
require __DIR__."/../config.php" ;

session_start() ;
session_destroy() ;
$expire = time() - 3600 ;
setcookie('username', '', $expire) ;
header("Location: ".$GLOBALS['DOCUMENT_DIR']."index.php");
exit() ;