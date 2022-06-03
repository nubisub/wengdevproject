<?php
session_start();

// connect with pdo
require "connect.php";

// get the data from the form
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$desk = isset($_POST['desk']) ? $_POST['desk'] : '';
$asal = isset($_POST['asal']) ? $_POST['asal'] : '';
$porsi = isset($_POST['porsi']) ? $_POST['porsi'] : '';
$lama = isset($_POST['lama']) ? $_POST['lama'] : '';
$username = $_SESSION['username'];

// foto upload
if(isset($_FILES['fileToUpload'])){
    $errors= array();
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size =$_FILES['fileToUpload']['size'];
    $file_tmp =$_FILES['fileToUpload']['tmp_name'];
    $file_type=$_FILES['fileToUpload']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));
    
    $expensions= array("jpeg","jpg","png","webp");
    
    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if(empty($errors)==true){
        // create random name for file
        global $file_name;
        $file_name = uniqid().".".$file_ext;
        move_uploaded_file($file_tmp,"../create/foto/".$file_name);       
    }else{
        $image = "" ;
    }
}

$sql = "INSERT INTO recipe (username, nama, deskripsi, asal, porsi, lama, foto) VALUES (?, ?, ?, ?, ?, ?, ?)"; 

$stmt = $conn->prepare($sql);
// bindparam
$stmt->bindParam(1, $username);
$stmt->bindParam(2, $nama);
$stmt->bindParam(3, $desk);
$stmt->bindParam(4, $asal);
$stmt->bindParam(5, $porsi);
$stmt->bindParam(6, $lama);
$stmt->bindParam(7, $file_name);

$stmt->execute();

// last id
$last_id = $conn->lastInsertId();

for ($i=1; $i < $_POST['jumlahbahan']; $i++) { 
    $bahan = isset($_POST['bahan'.$i]) ? $_POST['bahan'.$i] : '';
}
for ($i=1; $i < $_POST['jumlahlangkah']; $i++) { 
    $langkah = isset($_POST['langkah'.$i]) ? $_POST['langkah'.$i] : '';
}

for ($i=1; $i < $_POST['jumlahbahan']; $i++) { 
  $bahan = "bahan".$i;
  $bahan = isset($_POST[$bahan]) ? $_POST[$bahan] : '';
  if ($bahan != '') {
    $sql = "INSERT INTO bahan (id, bahan) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $last_id);
    $stmt->bindParam(2, $bahan);
    $stmt->execute();
  }
}

  for ($i=1; $i < $_POST['jumlahlangkah']; $i++) { 
    $langkah = "langkah".$i;
    $langkah = isset($_POST[$langkah]) ? $_POST[$langkah] : '';
    if ($langkah != '') {
      $sql = "INSERT INTO langkah (id, langkah) VALUES (?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(1, $last_id);
      $stmt->bindParam(2, $langkah);

      $stmt->execute();
    }
  }
$conn = null;

header("Location: /recipe/myrecipes/");
// echo "Disconnected successfully";

?>