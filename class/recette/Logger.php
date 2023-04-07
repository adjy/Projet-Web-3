<?php

namespace recette ;

class Logger
{

    public function generateLoginForm(string $action): void{?>
        <form method="post" action="<?php $action ?>" class="magic-card" id="login-form">
            <div class="form-group">
                <input type="text" name="username" placeholder="login">
                <input type="password" name="password" placeholder="password">
            </div>
            <button type="submit" class="btn btn-primary">LOGIN</button>
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
            $tab["error"] = "Authentication failed ";
            $tab["granted"] = false;

            if(empty($username)){
                $tab["error"] = " USERNAME IS EMPTY ";
            }
            if(empty($password)){
                $tab["error"] = " PASSWORD IS EMPTY ";
            }

        }
        return $tab;
    }

}