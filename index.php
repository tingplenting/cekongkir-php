<?php
include 'db.php';
$sql = "SELECT * FROM tbl_provinsi";
$result = mysqli_query($connection, $sql);

$arr = array();
while ($row = mysqli_fetch_assoc($result)) {
	$arr[$row['provinsi_id']] = $row['provinsi'];
}

$stmt = "SELECT DISTINCT tb1.hrg_kota, tb2.kota
				FROM tbl_harga AS tb1, tbl_kota AS tb2
				WHERE tb1.hrg_kota = tb2.kota_id";

?>

<!DOCTYPE html>
<html>

<head>
	<title>Ajax Cek Ongkir</title>
	<style type="text/css">
		#kelurahan,
		#kecamatan,
		#kota {
			display: none;
		}
	</style>
</head>

<body>
	<div id="form">
		<h2>Asal Pengiriman</h2>
		<div id="pengiriman">
			<select id="pengiriman-select">
				<option disabled selected>--Pilih Asal Pengiriman--</option>
				<?php $asal = mysqli_query($connection, $stmt); ?>
				<?php while ($obj = mysqli_fetch_object($asal)) : ?>
					<option value="<?= $obj->hrg_kota ?>"><?= $obj->kota ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<h2>Tujuan Pengiriman</h2>
		<div id="privinsi">
			<p>Privinsi Tujuan*</p>
			<select id="provinsi-select">
				<option disabled selected>--Pilih Privinsi Tujuan--</option>
				<?php foreach ($arr as $k => $v) : ?>
					<option value="<?= $k ?>"><?= $v ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div id="kota">
			<p>Kota Tujuan*</p>
			<select id="kota-select"></select>
		</div>
	</div>
	<div id="harga"></div>
</body>
<script src="index.js"></script>

</html>