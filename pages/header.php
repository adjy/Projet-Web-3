
<header id = "header">

    <div class="part1">
       <div class="title centrer"><img class="img-logo" src ="<?= $GLOBALS['IMG_DIR']?>src/logo.png"/></div>
        <div class="menu centrer">

<!--            <a class = " item-menu" href="--><?php //echo $GLOBALS['DOCUMENT_DIR'] ?><!--">sale</a>-->
<!--            <a class = " item-menu" href="--><?php //echo $GLOBALS['DOCUMENT_DIR'] ?><!--">sucre</a>-->
<!--            <a class = " item-menu" href="--><?php //echo $GLOBALS['DOCUMENT_DIR'] ?><!--">sale</a>-->
<!--            <a class = " item-menu" href="--><?php //echo $GLOBALS['DOCUMENT_DIR'] ?><!--">sale</a>-->
<!--            <a class = " item-menu" href="--><?php //echo $GLOBALS['DOCUMENT_DIR'] ?><!--">sale</a>-->
<!--            <a class = " item-menu" href="--><?php //echo $GLOBALS['DOCUMENT_DIR'] ?><!--">sale</a>-->
<!--            <a class = " item-menu" href="--><?php //echo $GLOBALS['DOCUMENT_DIR'] ?><!--">sale</a>-->
<!--            <a class = " item-menu" href="--><?php //echo $GLOBALS['DOCUMENT_DIR'] ?><!--">sale</a>-->

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