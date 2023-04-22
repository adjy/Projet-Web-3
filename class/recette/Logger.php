<?php
namespace recette ;

class Logger{

    public function generateLoginForm(string $action, $erreur): void{?>

        <form method="post" action="<?php $action ?>" id="login-form">
            <div class="photo-log">
                <img src="<?= $GLOBALS['IMG_DIR']?>src/login.jpg"  alt=""/>
            </div>
            <div class="admin-info">
                <span class = "admin-Log">Admin</span>
                <span class="error"> <?php echo $erreur?> </span>
                    <input type="text" class = "input-form-log" name="username" placeholder="login">
                    <input type="password" class = "input-form-log" name="password" placeholder="password">
                <div class="log-connecte">
                    <div class="reste-conn"><label>
                            <input name="rester-connecter" type="checkbox">
                        </label>Rester connecté</div>
                    <button type="submit" class="btn">LOGIN</button>
                </div>
            </div>
        </form>
        <?php
    }

    public function log(string $username, string $password) : array{

        $tab = array("granted" => false, "nick" => null, "error" => null) ;
        if( $username == "login" && $password == "recette"){
            $tab["granted"] = true;
            $tab["nick"] = "tony";
        }

        else{
            $tab["error"] = " Authentication failed ";
            $tab["granted"] = false;

            if(empty($username)){
                $tab["error"] = " USERNAME IS EMPTY ";
            }
            else if(empty($password)){
                $tab["error"] = " PASSWORD IS EMPTY ";
            }
        }
        return $tab;
    }

}