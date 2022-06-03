<?php
// session
session_start();
try {
		require("../../php/connect.php");
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		if(empty($id)) {
			throw new Exception('Error');
// 			echo 'hello';
		}
		$sql = "SELECT * FROM recipe WHERE id = ?";
		$stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        
		$stmt->execute();
		$result = $stmt->fetchAll();
		if($result[0]['visibility'] != 1){
		     header("Location: 404/html");
		}
		// if result is empty
		if(empty($result)) {
			throw new Exception('Error');
// 			echo 'hello';
		}
		
		$sql = "SELECT * FROM bahan WHERE id = '$id'";
		$bahan = $conn->prepare($sql);
		$bahan->execute();
		$bahan = $bahan->fetchAll();
		
		$sql = "SELECT * FROM langkah WHERE id = '$id'";
		$langkah = $conn->prepare($sql);
		$langkah->execute();
		$langkah = $langkah->fetchAll();
		} catch (\Throwable $th) {
		  //  echo 'hello1';
		    header('Location:404.html');
			// $conn = null;
			// sanitized data
			$id = '';
			$result = '';
			$bahan = '';
			$langkah = '';

		}

		
		

?>
<!DOCTYPE html>
<html lang="en">
    <?php

		
		
		
	?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php

			echo 'CookFood - '.$result[0]['nama'];
			?>
        </title>
        <link rel="stylesheet" href="/styles/view.css">
        <link rel="stylesheet" href="/styles/dialogbox.css" />
        <script src="/script/view.js"></script>

        <script src="/script/navbar.js"></script>

        <?php
		require '../../require/favicon.php';
		require '../../require/graphql.php';
		?>
        <meta name="twitter:title" content="<?php
		    echo $result[0]['nama'];
		?>" />
        <meta property="og:title" content="<?php
		    echo $result[0]['nama'];
		?>" />
        <meta property="og:description" content="<?php
		    echo $result[0]['deskripsi'];
		?>" />
        <meta name="twitter:description" content="<?php
		    echo $result[0]['deskripsi'];
		?>" />

    </head>


    <body>
        <script>
        checkCookie();
        </script>
        <?php
			if(isset($_SESSION['username'])){
			require '../../require/navbarlogin.php';
                
            }else{
			require '../../require/navbar.php';
            }
		?>

        <div class="wrapperview">
            <div class="view">
                <div class="judul">
                    <h1>
                        <?php
		
						echo $result[0]['nama'];
						// echo 'haoi';
						?>
                    </h1>
                </div>
                <div class="deskripsi">
                    <p><?php
						echo $result[0]['deskripsi'];
						// echo 'haoi';
						?></p>
                </div>
                <div class="foto">
                    <img src="/create/foto/<?php
                    if ($result[0]['foto'] == '') {
                        echo '404.png';
                    } else {
                        echo $result[0]['foto'];
                    }
						// echo $result[0]['foto'];
						// echo 'haoi';
						?>" alt="">
                </div>
                <hr>
                <div class="bahan">
                    <h2>Bahan-bahan</h2>
                    <?php
					$index = 1;
					foreach ($bahan as $row) {
						echo '<div class="checkbox">';
                        echo '<input id="langkah'.$index.'" type="checkbox">';
						echo '<label class="detaillangkah" for="langkah'.$index.'">'. $row['bahan'].'</label>';
						echo '</div>';
						$index++;
						// echo '<p>' . $row['bahan'] . '</p>';
					}
					?>
                    <!-- <div class="checkbox">
                        <input id="langkah" type="checkbox">
                        <label for="langkah">234324234</label>
                    </div>
                    <div class="checkbox">
                        <input id="langkah1" type="checkbox">
                        <label for="langkah1">150 g wholewheat couscous</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox">
                        <label>olive oil</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox">
                        <label>2 x 120 g free-range skinless chicken breasts</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox">
                        <label>1 teaspoon runny honey</label>
                    </div> -->
                </div>
                <hr>
                <div class="langkah">
                    <h2>Langkah-langkah</h2>
                    <ol>
                        <?php
						foreach ($langkah as $row) {
							echo '<li>'. $row['langkah'].'</li>';
							// echo '<p>' . $row['langkah'] . '</p>';
						}
						?>
                        <!-- <li>Soak 6 wooden skewers in a tray of cold water – this will prevent them from burning on
                            the barbecue later.</li>
                        <li>Place the couscous in a bowl and add ½ a tablespoon of oil. Finely grate in the zest of
                            ½ a lemon, squeeze in half the juice, then add the squeezed half for extra flavour. Just
                            cover with boiling kettle water – get an adult to help you if you need to. Cover the
                            bowl and put aside.</li>
                        <li>Now, very carefully push 3 skewers horizontally into each chicken breast (if the skewers
                            are too long, cut them in half). Wash your hands, then season the chicken breasts with
                            black pepper, squeeze over the juice of ½ a lemon and drizzle with ½ a tablespoon of
                            olive oil.</li>
                        <li>You can cook the skewers on a hot barbecue or in a hot frying pan on the hob. Always get
                            an adult to help you! Either way, cook the skewers for 8 to 10 minutes, or until golden
                            and cooked through, turning regularly with tongs. For the final minute of cooking, grab
                            your rosemary sprigs and use them to brush the honey over the chicken, giving it a
                            lovely sticky glaze.</li>
                        <li>To make a zingy salsa, first clean down your board. Halve, deseed and finely chop the
                            pepper. Peel and finely chop the onion and the pineapple, then pop everything in a bowl,
                            dress with a squeeze of lemon juice and a drizzle of extra virgin olive oil, then season
                            to perfection. If you’ve got them, finely chop some fresh soft herbs using the
                            cross-chop method, and add to the mix.</li> -->
                    </ol>
                </div>
            </div>
        </div>

        <?php
        if(!isset($_SESSION['username'])){
		    require '../../require/login.php';
        }
        if(isset($_SESSION['alert'])){
        require '../../require/logindialogsuccess.php';
unset($_SESSION['alert']);
        }
		?>
    </body>

</html>
<?php
	// sql disconnect
	// $conn->close();
	$conn = null;
?>