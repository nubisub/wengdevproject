<?php
// session
session_start();
if(!isset($_SESSION['username'])){
	header("Location: ../../../../signin");
}
if(!isset($_SESSION['id_delete'])){
    header("Location:../../");
}
$id_del = $_SESSION['id_delete'];
require("../../../../php/connect.php");
try {
        $sql = "SELECT * FROM recipe WHERE id = ?";
						$stmt = $conn->prepare($sql);
                        $stmt->bindparam(1, $id_del);
                        
						$stmt->execute();
						$result = $stmt->fetchAll();

    } catch (\Throwable $th) {
        echo 'hello';
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Tulis Dan Bagikan Resep">
        <title>CookFood - Tulis Resep</title>

        <link rel="stylesheet" href="/styles/create.css">


        <script src="/script/navbar.js"></script>

        <?php
		require '../../../../require/favicon.php';
		require '../../../../require/graphql.php';
		?>
        <meta name="twitter:title" content="CookFood - Tulis Resep" />
        <meta property="og:title" content="CookFood - Tulis Resep" />
        <meta property="og:description" content="Tulis dan bagikan resepm favoritmu agar dapat dilihat orang lain" />
        <meta name="twitter:description" content="Tulis dan bagikan resepm favoritmu agar dapat dilihat orang lain" />
    </head>

    <body>
        <script>
        checkCookie();
        </script>
        <?php
			require '../../../../require/navbarlogin.php';
		?>

        <div class="container">
            <form id="survey-form" data-netlify="true" method="post" action="editrecipe.php"
                enctype="multipart/form-data">
                <div class="form">
                    <label id="name" for="judul">Nama Masakan</label>
                    <input id="judul" name="nama" type="text" class="control" placeholder="Lamb Sauce" <?php
                        echo "value='".$result[0]['nama']."'";
                    ?> required />
                    <p id="warningnama"></p>

                </div>

                <div class="form">
                    <label for="desk">Deskripsi Masakanmu</label>
                    <textarea class="text control" name="desk" id="desk"
                        placeholder="Ceritakan Tentang masakanmu yang unik dan istimewa itu"><?php
                        echo $result[0]['deskripsi'];
                    ?></textarea>
                </div>

                <div class="form">
                    <label for="asal">Asal Daerah Masakanmu</label>
                    <input type="text" id="asal" name="asal" class="control" <?php
                        echo "value='".$result[0]['asal']."'";
                    ?> placeholder="Minang, Jawa Ternate" />
                </div>

                <div class="form">
                    <label for="porsi">Porsi</label>
                    <input type="text" name="porsi" id="porsi" class="control" placeholder="4 Orang" <?php
                        echo "value='".$result[0]['porsi']."'";
                    ?> />
                </div>

                <div class="form">
                    <label for="lama">Lama Memasak</label>
                    <input type="text" name="lama" id="lama" placeholder="1 Jam 20 Menit" class="control" <?php
                        echo "value='".$result[0]['lama']."'";
                    ?> />
                </div>

                <?php
                try {
                    $sql = "SELECT * FROM bahan WHERE id = ?";
					$stmt = $conn->prepare($sql);
                    $stmt->bindParam(1, $id_del);
                    
					$stmt->execute();
					$result = $stmt->fetchAll();

    } catch (\Throwable $th) {
        echo 'hello';
    }
                ?>

                <div class="bahan">
                    <?
                    $GLOBALS[$i] = 1;
                    foreach ($result as $row) {
                        $i++;
                        echo '<div class="form">';
                        echo '<label ';
                        echo "for=bahan$i";
                        echo '>Bahan-bahan</label>';
                        echo "<input required name='bahan$i' id='bahan$i' type='text' class='control'
                            placeholder='1Kg Ayam Kampung' value='".$row['bahan']."' />";
                        echo '</div>';
                        if($i==2){
                        echo '<div class="form hidden tambahbahan">';
                        echo'<label for="bahan">Bahan-bahan</label>';
                        echo '<input name="bahan" type="text" class="control" placeholder="Bahan berikutnya..." />';
                        echo "</div>";
                        }
                        
                            
                    }
                    if($i<2){
                        echo '<div class="form hidden tambahbahan">';
                        echo'<label for="bahan">Bahan-bahan</label>';
                        echo '<input name="bahan" type="text" class="control" placeholder="Bahan berikutnya..." />';
                        echo "</div>";
                        }
                // <script ></script>
                    ?>
                    <!--<div class="form">-->
                    <!--    <label for="bahan1">Bahan-bahan</label>-->
                    <!--    <input required name="bahan1" id="bahan1" type="text" class="control"-->
                    <!--        placeholder="1Kg Ayam Kampung" />-->
                    <!--</div>-->

                    <!--<div class="form">-->
                    <!--    <label for="bahan2">Bahan-bahan</label>-->
                    <!--    <input name="bahan2" id="bahan2" type="text" class="control"-->
                    <!--        placeholder="Bahan berikutnya..." />-->
                    <!--</div>-->


                </div>

                <div class="tambah">
                    <button type="button" onclick="tambahbahan()"> <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                        </svg> Add</button>
                    <button class="buttonremove" type="button" onclick="kurangbahan()">Remove</button>
                </div>

                <div class="langkah">
                    <!--<div class="form">-->
                    <!--    <label for="langkah1">Langkah-langkah</label>-->
                    <!--    <input required name="langkah1" id="langkah" type="text" class="control"-->
                    <!--        placeholder="Masukkan Air ke Termos" />-->
                    <!--</div>-->
                    <!--<div class="form">-->
                    <!--    <label for="langkah2">Langkah-langkah</label>-->
                    <!--    <input name="langkah2" id="langkah2" type="text" class="control"-->
                    <!--        placeholder="Langkah Berikutnya..." />-->
                    <!--</div>-->
                    <?php
                try {
                    $sql = "SELECT * FROM langkah WHERE id = ?";
					$stmt = $conn->prepare($sql);
                    $stmt->bindParam(1, $id_del);
					$stmt->execute();
					$result = $stmt->fetchAll();

    } catch (\Throwable $th) {
        echo 'hello';
    }?>
                    <?
                    $GLOBALS[$j] = 1;
                    foreach ($result as $row) {
                        $j++;
                        echo '<div class="form">';
                        echo '<label ';
                        echo "for=langkah$j";
                        echo '>Langkah-langkah</label>';
                        echo "<input required name='langkah$j' id='langkah$j' type='text' class='control'
                            placeholder='Masukkan Air ke Termos' value='".$row['langkah']."' />";
                        echo '</div>';
                        if($j==2){
                        echo '<div class="form hidden tambahlangkah">';
                        echo'<label for="langkah">Langkah-langkah</label>';
                        echo '<input name="langkah3" type="text" class="control" placeholder="Langkah berikutnya..." />';
                        echo "</div>";
                        }
                    }
                    
                    if($j<2){
                        echo '<div class="form hidden tambahlangkah">';
                        echo'<label for="langkah">Langkah-langkah</label>';
                        echo '<input name="langkah3" type="text" class="control" placeholder="Langkah berikutnya..." />';
                        echo "</div>";
                    }
                    
                // <script ></script>
                    ?>
                    <!--<div class="form hidden tambahlangkah">-->
                    <!--    <label for="langkah">Langkah-langkah</label>-->
                    <!--    <input name="langkah3" type="text" class="control" placeholder="Langkah Berikutnya..." />-->
                    <!--</div>-->
                </div>
                <div class="tambah">
                    <button class="tambahlangkah1" type="button" onclick="tambahlangkah()"> <svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                        </svg> Add</button>
                    <button type="button" onclick="kuranglangkah()">Remove</button>
                </div>

                <span class="foto">Tambahkan Foto Agar Lebih Ciamik </span>
                <div class="form upload">


                    <label for="fileToUpload"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">! Font
                            Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License -
                            https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.
                            <path
                                d="M144 480C64.47 480 0 415.5 0 336C0 273.2 40.17 219.8 96.2 200.1C96.07 197.4 96 194.7 96 192C96 103.6 167.6 32 256 32C315.3 32 367 64.25 394.7 112.2C409.9 101.1 428.3 96 448 96C501 96 544 138.1 544 192C544 204.2 541.7 215.8 537.6 226.6C596 238.4 640 290.1 640 352C640 422.7 582.7 480 512 480H144zM223 263C213.7 272.4 213.7 287.6 223 296.1C232.4 306.3 247.6 306.3 256.1 296.1L296 257.9V392C296 405.3 306.7 416 320 416C333.3 416 344 405.3 344 392V257.9L383 296.1C392.4 306.3 407.6 306.3 416.1 296.1C426.3 287.6 426.3 272.4 416.1 263L336.1 183C327.6 173.7 312.4 173.7 303 183L223 263z" />
                        </svg></label>
                    <!-- check input type -->
                    <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);" />


                    <!-- <input enctype="multipart/form-data" type="file" name="fileToUpload" id="fileToUpload"  /> -->
                </div>
                <p id="warningfile"></p>


                <div class="form">
                    <button onclick="btnsubmit()" id="submit" class="submit" type="submit">Post Recipe</button>
                </div>
                <?php
                $jumlahlangkah=$j+1;
                $jumlahbahan=$i+1;
                    echo"<input name='jumlahlangkah' class='jumlahlangkah' type='hidden' value='$jumlahlangkah'>";
                    echo "<input name='jumlahbahan' class='jumlahbahan' type='hidden' value='$jumlahbahan'>"
                ?>



            </form>
        </div>
        <script>
        <?php
            $i=$i+1;
            $j++;
            echo "let countbahan=$i,countlangkah=$j,";
            ?>tambahbahan = () => {
            const e = document.getElementsByClassName("tambahbahan")[0],
                t = e.cloneNode(!0);
            t.classList.remove("hidden"), document.getElementsByClassName("bahan")[0].appendChild(t), document
                .getElementsByClassName("bahan")[0].lastElementChild.lastElementChild.setAttribute("name", "bahan" +
                    countbahan), document.getElementsByClassName("bahan")[0].lastElementChild.firstElementChild
                .setAttribute("for", "bahan" + countbahan), countbahan++, document.getElementsByClassName(
                    "jumlahbahan")[0].setAttribute("value", countbahan)
        }, kurangbahan = () => {
            if (!(document.getElementsByClassName("bahan")[0].childElementCount <= 3)) {
                let e = document.getElementsByClassName("bahan")[0];
                e.removeChild(e.lastElementChild), countbahan--, document.getElementsByClassName("jumlahbahan")[0]
                    .setAttribute("value", countbahan)
            }
        }, tambahlangkah = () => {
            const e = document.getElementsByClassName("tambahlangkah")[0],
                t = e.cloneNode(!0);
            t.classList.remove("hidden"), document.getElementsByClassName("langkah")[0].appendChild(t), document
                .getElementsByClassName("langkah")[0].lastElementChild.lastElementChild.setAttribute("name",
                    "langkah" + countlangkah), document.getElementsByClassName("langkah")[0].lastElementChild
                .firstElementChild.setAttribute("for", "langkah" + countlangkah), countlangkah++, document
                .getElementsByClassName("jumlahlangkah")[0].setAttribute("value", countlangkah)
        }, kuranglangkah = () => {
            if (!(document.getElementsByClassName("langkah")[0].childElementCount <= 3)) {
                let e = document.getElementsByClassName("langkah")[0];
                e.removeChild(e.lastElementChild), countlangkah--, document.getElementsByClassName("jumlahlangkah")[
                    0].setAttribute("value", countbahan)
            }
        }, readURL = e => {
            e.files[0].type.match("image.*") ? ((type = document.getElementById("submit")).setAttribute("type",
                "submit"), document.getElementById("warningfile").style.display = "none") : (e.value = "",
                type = document.getElementById("submit"), document.getElementById("warningfile").innerHTML =
                "File harus berupa gambar  !!!", document.getElementById("warningfile").style.display = "block",
                type.setAttribute("type", "button"))
        }, btnsubmit = () => {
            "" == (judul = document.getElementById("judul").value) ? (type = document.getElementById("submit"),
                document.getElementById("judul").focus(), type.setAttribute("type", "button"), document
                .getElementById("warningnama").innerText = "Judul tidak boleh kosong !!!", document.getElementById(
                    "warningnama").style.display = "block") : ((type = document.getElementById("submit"))
                .setAttribute("type", "submit"), document.getElementById("warning").style.display = "none")
        };
        </script>

    </body>

</html>
<?php
    $conn = null;
    
?>