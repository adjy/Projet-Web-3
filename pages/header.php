
<header id = "header">

    <div class="part1 centrer">
       <a href="<?= $GLOBALS['DOCUMENT_DIR']?>index.php" class="title centrer"><img class="img-logo" src ="<?= $GLOBALS['IMG_DIR']?>src/logo.png"/></a>
        <div id="menu">
<!--            --><?php
//                if(isset($_SESSION['tag'])){
//                    foreach ($_SESSION['tag'] as $tag){ ?>
<!--                        <a class = "item-menu" href="#ID_--><?php //echo trim($tag->nom," ")?><!--">--><?php //echo $tag->nom ?><!--</a>-->
<!--                 --><?php // }
//                }?>

        </div>

        <div class="logMenu">

            <?php

            if(isset($_SESSION['username'])){?>
                <a class = "btn" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/admSpace.php" >Admin</a>
                <a class = "btn" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/logout.php" >Logout</a>

                <?php
            }
            else{?>
                <a class = "btn" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/login.php">Sign in</a>
                <?php
            }
            ?>


        </div>
    </div>

    <div class="search centrer">
        <form id = "searchID-form" class = "form-search centrer"  action="<?php $GLOBALS['DOCUMENT_DIR'] ?>pages/rechercheTraitement.php" method="POST">
            <input class = "input-search" type="text" id="searchID" name="fname" placeholder="dessert / chocolat / fruit " required>
            <button class= "btn search-btn" type="submit" value="Search">Search</button>
        </form>
    </div>


</header>