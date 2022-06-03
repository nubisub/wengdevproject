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
        <meta name="description" content="Cari resep">
        <title>CookFood - Explore Recipes</title>
        <link rel="stylesheet" href="../styles/recipe.css">
        <link rel="stylesheet" href="../styles/dialogbox.css" />
        <link rel="stylesheet" href="../styles/searchbar.css" />
        <script src="../script/searchbar.js"></script>
        <script src="../script/navbar.js"></script>


        <?php
		require '../require/favicon.php';
		require '../require/graphql.php';
		?>
        <meta name="twitter:title" content="CookFood - Explore Recipes" />
        <meta property="og:title" content="CookFood - Explore Recipes" />
        <meta property="og:description"
            content="Mau masak apa hari ini ? temukan resep populer dan mudah dimasak di CookFood" />
        <meta name="twitter:description"
            content="Mau masak apa hari ini ? temukan resep populer dan mudah dimasak di CookFood" />
    </head>

    <body>
        <script>
        checkCookie();
        </script>
        <?php
            if(isset($_SESSION['username'])){
			require '../require/navbarlogin.php';
                
            }else{
			require '../require/navbar.php';
            }
		?>

        <div class="secmain">
            <?php
                require '../require/search.php';
            ?>
            <div class="wilayah">
                <h1>Our Popular Recipe</h1>
                <div class="wrapper">
                    <?php
					require('../php/connect.php');
                    $sql = "SELECT * FROM recipe WHERE visibility = 1";
						$stmt = $conn->prepare($sql);
						$stmt->execute();
						$result = $stmt->fetchAll();
					// echo $result[0]['recipe_name'];
					foreach ($result as $row) {
						// href='php09F.php?slot=
						echo '<a  href="view/?id='. $row['id'];
						echo '" class="card cardminang">';
                        if ($row['foto'] == "") {
                            echo '<div style="background:url(../create/foto/404.png);	background-position:center;background-repeat: no-repeat;background-size: cover;" class="bg minang"></div>';
                        } else {
                            echo '<div style="background:url(../create/foto/'.$row['foto'].');background-position: center;background-repeat: no-repeat;background-size: cover;" class="bg minang"></div>';
                        }
                        
                        echo '<h2 class="judulmasak">'.$row['nama']. '</h2>';
                        // 20 first word
                        
                
                     	echo '<p class="isimasak">' .substr($row['deskripsi'], 0, 210).'</p>';
						 echo'</a>';
					}
					?>



                    <!-- <a href="#" class="card cardminang">
                        <div class="bg minang"></div>
                        <h2 class="judulmasak">Greek Chicken and Potato Bowl</h2>
                        <p class="isimasak">
                            How do you make our Big Fat Greek Salad bigger and fatter? By adding garlic, lemo...
                        </p>
                    </a>
                    <a href="#" class="card cardjava">
                        <div class="bg java"></div>
                        <h2 class="judulmasak">Easy Shrimp and Asparagus Quiche</h2>
                        <p class="isimasak">
                            This recipe uses a store-bought pie crust to save time. Prep time is about 15...
                        </p>
                    </a>
                    <a href="#" class="card cardhealthy">
                        <div class="bg healthy"></div>
                        <h2 class="judulmasak">Sicilian Roasted Chicken</h2>
                        <p class="isimasak">I made up this one to resemble the rotisserie chicken I love so much. It
                            is
                            so</p>
                    </a>
                    <a href="#" class="card cardchinese">
                        <div class="bg chinese"></div>
                        <h2 class="judulmasak">Best Chocolate Chip Cookies</h2>
                        <p class="isimasak">
                            Crisp edges, chewy middles, and so, so easy to make. Try this wildly-popular..
                        </p>
                    </a>
                    <a href="#" class="card cardhealthy">
                        <div class="bg healthy"></div>
                        <h2 class="judulmasak">Sicilian Roasted Chicken</h2>
                        <p class="isimasak">I made up this one to resemble the rotisserie chicken I love so much. It
                            is
                            so</p>
                    </a>
                    <a href="#" class="card cardchinese">
                        <div class="bg chinese"></div>
                        <h2 class="judulmasak">Best Chocolate Chip Cookies</h2>
                        <p class="isimasak">
                            Crisp edges, chewy middles, and so, so easy to make. Try this wildly-popular..
                        </p>
                    </a>
                    <a href="#" class="card cardjava">
                        <div class="bg java"></div>
                        <h2 class="judulmasak">Easy Shrimp and Asparagus Quiche</h2>
                        <p class="isimasak">
                            This recipe uses a store-bought pie crust to save time. Prep time is about 15...
                        </p>
                    </a>
                    <a href="#" class="card cardhealthy">
                        <div class="bg healthy"></div>
                        <h2 class="judulmasak">Sicilian Roasted Chicken</h2>
                        <p class="isimasak">I made up this one to resemble the rotisserie chicken I love so much. It
                            is
                            so</p>
                    </a>
                    <a href="#" class="card cardchinese">
                        <div class="bg chinese"></div>
                        <h2 class="judulmasak">Best Chocolate Chip Cookies</h2>
                        <p class="isimasak">
                            Crisp edges, chewy middles, and so, so easy to make. Try this wildly-popular..
                        </p>
                    </a>
                    <a href="#" class="card cardjava">
                        <div class="bg java"></div>
                        <h2 class="judulmasak">Easy Shrimp and Asparagus Quiche</h2>
                        <p class="isimasak">
                            This recipe uses a store-bought pie crust to save time. Prep time is about 15...
                        </p>
                    </a>
                    <a href="#" class="card cardhealthy">
                        <div class="bg healthy"></div>
                        <h2 class="judulmasak">Sicilian Roasted Chicken</h2>
                        <p class="isimasak">I made up this one to resemble the rotisserie chicken I love so much. It
                            is
                            so</p>
                    </a>
                    <a href="#" class="card cardchinese">
                        <div class="bg chinese"></div>
                        <h2 class="judulmasak">Best Chocolate Chip Cookies</h2>
                        <p class="isimasak">
                            Crisp edges, chewy middles, and so, so easy to make. Try this wildly-popular..
                        </p>
                    </a> -->
                </div>
            </div>
        </div>

        <?php
        if(!isset($_SESSION['username'])){
		    require '../require/login.php';
        }
        if(isset($_SESSION['alert'])){
            require '../require/logindialogsuccess.php';
            unset($_SESSION['alert']);
        }
        $conn = null;
		?>
    </body>

</html>