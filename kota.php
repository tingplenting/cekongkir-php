<?php
include 'db.php';

$provinsi_id = (int) $_GET['provinsi_id'];
$sql = "SELECT * FROM tbl_kota WHERE provinsi_id=$provinsi_id";
$result = mysqli_query($connection, $sql);
	echo "<option disabled selected>--Pilih Kota--</option>";
while($row = mysqli_fetch_assoc($result)){
	echo "<option value='" . $row['kota_id'] . "'>" . $row['kota'] ."</option>";
}

?>