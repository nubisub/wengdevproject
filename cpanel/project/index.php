<?php
// session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- HTML Meta Tags -->
        <title>CookFood - Mau masak apa hari ini ?</title>
        <meta name="description" content="Website resep makanan dan minuman" />

        <!-- Facebook Meta Tags -->
        <?php
            require 'require/graphql.php';
        ?>
        <meta property="og:title" content="CookFood - Mau masak apa hari ini ?" />
        <meta property="og:description" content="Website resep makanan dan minuman" />


        <!-- Twitter Meta Tags -->
        <meta name="twitter:title" content="CookFood - Mau masak apa hari ini ?" />
        <meta name="twitter:description" content="Website resep makanan dan minuman" />


        <!-- Meta Tags Generated via https://www.opengraph.xyz -->

        <link rel="stylesheet" href="styles/homepage.css" />
        <link rel="stylesheet" href="styles/dialogbox.css" />

        <script src="script/navbar.js"></script>

        <?php
		require 'require/favicon.php';
		?>
    </head>

    <body>
        <script>
        checkCookie();
        </script>
        <?php
            if(isset($_SESSION['username'])){
			require 'require/navbarlogin.php';
                
            }else{
			require 'require/navbar.php';
            }
		?>


        <main class="landing">
            <div class="content">
                <div class="desc">
                    <h1>Let's start cooking with our recipes</h1>
                    <p>
                        Want to learn cook but confused how to start? <br />
                        No need to worry again! we have collected various recipes for you to
                        learn.
                    </p>
                    <div class="btn-main">
                        <a href="recipe"> Explore Menu </a>
                        <a href="create">
                            Write Recipe
                            <svg class="rightarrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path
                                    d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="dua">
                    <img id="lightfood" class="food" src="images/1mainfood.webp" alt="Food in plate" width="430" />
                    <img id="darkfood" class="hidden darkfood" src="images/1mainfooddark.webp" alt="Food in plate"
                        width="430" />
                </div>

                <div class="card">
                    <div class="image-header">
                        <img src="images/2secfood.webp" alt="Food recomendation" width="44" />
                        <h4>Bread Berry</h4>
                    </div>
                    <p>Bread, Strawberry, Jam, Blueberry, Raspberry</p>
                </div>
            </div>
        </main>

        <div class="secmain">
            <div class="wilayah">
                <h1>Inspiration for your next dish</h1>
                <div class="wrapper">
                    <!--<a href=""> </a>-->
                    <a style="text-decoration: none;" href="/recipe/?search=minang" class="clash-card cardminang">
                        <div class="bg minang"></div>
                        <h2 class="judulmasak">Minang</h2>
                        <p class="isimasak">
                            Rendang, Balado, Sate Padang, Soto Padang, Lamang
                        </p>
                    </a>
                    <a style="text-decoration: none;" href="/recipe/?search=jawa" class="clash-card cardjava">
                        <div class="bg java"></div>
                        <h2 class="judulmasak">Jawa</h2>
                        <p class="isimasak">
                            Rawon, Pecel, Gudeg, Surabi, Seblak, Tahu Tek, Garang Asem
                        </p>
                    </a>
                    <a style="text-decoration: none;" href="/recipe/?search=healthy" class="clash-card cardhealthy">
                        <div class="bg healthy"></div>
                        <h2 class="judulmasak">Healthy</h2>
                        <p class="isimasak">We don't do that here</p>
                    </a>
                    <a style="text-decoration: none;" href="/recipe/?search=chinese" class="clash-card cardchinese">
                        <div class="bg chinese"></div>
                        <h2 class="judulmasak">Chinese</h2>
                        <p class="isimasak">
                            Fuyunghai, Dim Sum, Bebek Peking, Yu Seng, Lun Pia
                        </p>
                    </a>
                </div>
            </div>
        </div>

        <?php
        if(!isset($_SESSION['username'])){
		    require 'require/login.php';
        }
		?>

        <?php
		require 'require/footer.php';
		?>

        <?php
        if(!isset($_SESSION['logintime'])){
            $_SESSION['logintime']=time();
        }
        if(isset($_SESSION['alert'])){
        require 'require/logindialogsuccess.php';
        }
        if(isset($_SESSION['accountcreate'])){
        require 'require/loginwithcreate.php';
        }
        if(isset($_SESSION['logout'])){
        require 'require/logoutdialog.php';
        }
        ?>
        <?php
            unset($_SESSION['alert']);
            unset($_SESSION['accountcreate']);
            unset($_SESSION['logout']);
        ?>

    </body>

</html>