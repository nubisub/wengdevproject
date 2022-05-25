<?php
session_start();
require("../../../../php/connect.php");
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$desk = isset($_POST['desk']) ? $_POST['desk'] : '';
$asal = isset($_POST['asal']) ? $_POST['asal'] : '';
$porsi = isset($_POST['porsi']) ? $_POST['porsi'] : '';
$lama = isset($_POST['lama']) ? $_POST['lama'] : '';
$username = $_SESSION['username'];
$id_del = $_SESSION['id_delete'];
$sql = "UPDATE recipe SET nama = ?, deskripsi = ?, asal = ?, porsi = ?, lama = ? WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $nama);
$stmt->bindParam(2, $desk);
$stmt->bindParam(3, $asal);
$stmt->bindParam(4, $porsi);
$stmt->bindParam(5, $lama);
$stmt->bindParam(6, $id_del);

$stmt->execute();

$sql = "DELETE FROM bahan WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id_del);

$stmt->execute();
$sql = "DELETE FROM langkah WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id_del);
$stmt->execute();

$last_id = $_SESSION['id_delete'];
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
        move_uploaded_file($file_tmp,"../../../../create/foto/".$file_name);
        $sql = "UPDATE recipe SET foto = ? WHERE id = ?";
        
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $file_name);
$stmt->bindParam(2, $last_id);

$stmt->execute();
    }else{
        $image = "" ;
    }
    
}



header("Location: ../../");
?>