<?php
require_once "../config.php" ;
session_start();

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use recette\Template;
use recette\Logger;

ob_start() ;

$instance = new Logger();

if(isset($_POST['username']) && isset($_POST['password']) ){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $tab = $instance->log($username,$password);

    if( $tab['granted'] == false){?>
        <div class="log-connection centrer">

            <?php
            $instance->generateLoginForm("",$tab['error']); ?>
        </div>
        <?php }

    else{/*l utilisateur a trouvé le login*/

        $_SESSION['username'] = $_POST['username'];//On veut afficher l username

        $tab['granted'] = false;?>
        <?php
        header("Location: ".$GLOBALS['DOCUMENT_DIR']."index.php");
        exit();
    }
}

else{/*ce n est pas bon donc on retourne vers la page*/
    ?>
<div class="log-connection centrer">
   <?php $instance->generateLoginForm("",""); ?>

</div>
<?php
}


$content = ob_get_clean();
Template::render($content, $title = "Loging");
