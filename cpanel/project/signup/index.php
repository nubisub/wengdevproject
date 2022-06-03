<?php
// 
// session
session_start();
if(isset($_SESSION['username'])){
    header("Location: ../");
}

// $time = time();
if (!isset($_SESSION['timeregister'])) {
    $_SESSION['timeregister'] = time();
}
$delta = time()-$_SESSION['timeregister'];
// if reload delete sesion
// if (isset($_SESSION['usernameexist'])) {
//     unset($_SESSION['usernameexist']);
// }

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CookFood - Sign up</title>
        <link rel="stylesheet" href="../styles/homepage.css">
        <link rel="stylesheet" href="../styles/body.css">
        <style>
        </style>
        <?php
        require '../require/favicon.php';
        require '../require/graphql.php';
        ?>
        <meta property="og:title" content="CookFood - Sign up" />
        <meta property="og:description" content="Buat akun dan tulis resep favoritmu" />
        <meta name="twitter:title" content="CookFood - Sign up" />
        <meta name="twitter:description" content="Buat akun dan tulis resep favoritmu" />
    </head>

    <body class="background">
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <span class="circle"></span>
        <div id="login">
            <div class="headcontainer">


                <div class="welcome">
                    <h4>SignUp to <a href="/">CookFood</a></h4>
                </div>
            </div>
            <hr />
            <div class="bodycontainer">

                <div id="form">
                    <form action="/php/register.php" method="POST">
                        <div class="form">
                            <label for="username">Username
                                <?php
                                    if(isset($_SESSION['usernameexist'])){
                                        // echo $_SESSION['error'];
                                        echo "<span id='error'> (".$_SESSION['usernameexist'].")</span>";
                                    }
                                    unset($_SESSION['usernameexist']);
                                ?>

                            </label>
                            <input required type="text" name="username" id="username" <?php
                                if(isset($_SESSION['usernametemp'])){
                                        // echo $_SESSION['error'];
                                        // value
                                        echo "value='".$_SESSION['usernametemp']."'";
                                        unset($_SESSION['usernametemp']);
                                        
                                    }
                            
                            ?> />
                        </div>
                        <div class=" form">
                            <label for="email">Email-Address</label>
                            <input required type="email" name="email" id="email" <?php
                                if(isset($_SESSION['emailtemp'])){
                                        // echo $_SESSION['error'];
                                        // value
                                        echo "value='".$_SESSION['emailtemp']."'";
                                        unset($_SESSION['emailtemp']);
                                        
                                    }
                            
                            ?> />
                        </div>
                        <div class="form">
                            <label for="password" 
                            
                            
                            >Password <?php
                                    if(isset($_SESSION['passwordkurang'])){
                                        // echo $_SESSION['error'];
                                        echo "<span id='error'> (".$_SESSION['passwordkurang'].")</span>";
                                    }
                                    unset($_SESSION['passwordkurang']);
                                ?></label>
                            <input required type="password" name="password" id="password"
                                placeholder="(8 Character minimum)" />
                        </div>
                        <div class="form signinbtn " id="create">
                            <input type="submit" value="Create an Account" />
                        </div>
                        <div class="form">
                                <a href="/signin">Already have an account?</a>
                            </div>
                        <div class="separate">or</div>

                        <div class="form">
                            <button type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px">
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
                        <!--<div class="form">-->
                        <!--    <button style="z-index: 2;" type="button">-->
                        <!--        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px">-->
                        <!--            <linearGradient id="Ld6sqrtcxMyckEl6xeDdMa" x1="9.993" x2="40.615" y1="9.993"-->
                        <!--                y2="40.615" gradientUnits="userSpaceOnUse">-->
                        <!--                <stop offset="0" stop-color="#2aa4f4" />-->
                        <!--                <stop offset="1" stop-color="#007ad9" />-->
                        <!--            </linearGradient>-->
                        <!--            <path fill="url(#Ld6sqrtcxMyckEl6xeDdMa)"-->
                        <!--                d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z" />-->
                        <!--            <path fill="#fff"-->
                        <!--                d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z" />-->
                        <!--        </svg>Continue with Facebook-->
                        <!--    </button>-->
                        <!--</div>-->
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>