<!DOCTYPE html>
<html lang="en">
    <?php

		try {
		require("../create/connect.php");
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$_SESSION['id_delete'] = $id;
		if(empty($id)) {
			throw new Exception('Error');
		}
		$sql = "SELECT * FROM recipe WHERE id = '$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		// if result is empty
		if(empty($result)) {
			throw new Exception('Error');
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
			// $conn = null;
			// sanitized data
			$id = '';
			$result = '';
			$bahan = '';
			$langkah = '';
			header('Location:404.html');
			// header('Location: http://www.example.com/');
			// $conn = null;
			// echo $th->getMessage();
		}

		
		
		
		
	?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php

			echo 'CookFood-'.$result[0]['nama'];
			?>
        </title>
        <link rel="stylesheet" href="/styles/view.css">
        <link rel="stylesheet" href="config.css">
        <script src="/script/navbar.js"></script>
        <!-- <script src="../script/detail/view.js"></script> -->
        <?php
		require '../favicon.php';
		?>
    </head>


    <body>
        <script>
        checkCookie();
        </script>
        <?php
			require './navbar.php';
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
                    <img src="../create/foto/<?php
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

        <div class="modalwrapper">
            <div id="login">
                <div class="headcontainer">
                    <button class="exitbutton" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                        </svg>
                    </button>

                    <div class="welcome">
                        <h4>Welcome to CookFood</h4>
                    </div>
                </div>
                <hr />
                <div class="bodycontainer">
                    <div class="loginsignup">
                        <div class="login">
                            <a href="#">Sign In</a>
                        </div>
                        <div class="signup">
                            <a href="#">Sign Up</a>
                        </div>
                    </div>
                    <div id="form">
                        <form>
                            <div class="form">
                                <label for="email">E-mail Address</label>
                                <input required type="email" name="email" id="email" />
                            </div>
                            <div class="form">
                                <label for="password">Password</label>
                                <input required type="password" name="password" id="password" />
                            </div>
                            <div class="form signinbtn">
                                <input type="submit" value="Continue" />
                            </div>
                            <div class="form">
                                <a href="#">Forgot Password?</a>
                            </div>
                            <div class="separate">or</div>

                            <div class="form">
                                <button type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px"
                                        height="48px">
                                        <path fill="#FFC107"
                                            d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                                        <path fill="#FF3D00"
                                            d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                                        <path fill="#4CAF50"
                                            d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                                        <path fill="#1976D2"
                                            d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                                    </svg>
                                    Continue with Google
                                </button>
                            </div>
                            <!-- login with google -->
                            <div class="form">
                                <button type="button">
                                    <svg class="apple" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path
                                            d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z" />
                                    </svg>
                                    Continue with Apple
                                </button>
                            </div>
                            <!-- login with facebook -->
                            <div class="form">
                                <button type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px"
                                        height="48px">
                                        <linearGradient id="Ld6sqrtcxMyckEl6xeDdMa" x1="9.993" x2="40.615" y1="9.993"
                                            y2="40.615" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#2aa4f4" />
                                            <stop offset="1" stop-color="#007ad9" />
                                        </linearGradient>
                                        <path fill="url(#Ld6sqrtcxMyckEl6xeDdMa)"
                                            d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z" />
                                        <path fill="#fff"
                                            d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z" />
                                    </svg>

                                    <span>Continue with Facebook</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require 'config.php';
        ?>
    </body>

</html>
<?php
	// sql disconnect
	// $conn->close();
	$conn = null;
?>