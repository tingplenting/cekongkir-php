<?php
include 'db.php';

$tujuan_id = (int) $_GET['kota_id'];
$pengiriman_id = (int) $_GET['pengiriman_id'];
$sql = "SELECT * FROM tbl_harga WHERE hrg_kota=$pengiriman_id AND hrg_kota_tujuan=$tujuan_id";
$result = mysqli_query($connection, $sql);
echo '<table>
<tr>
  <th>Kurir</th>
  <th>Jenis</th>
  <th>Hari</th>
  <th>Jumlah</th>
</tr>
';
while($row = mysqli_fetch_object($result)){
  $kurir = strtoupper($row->hrg_kurir);
  $jenis = strtoupper($row->hrg_jenis);
  $hari = $row->hrg_hari;
  $jumlah = (int) $row->hrg_jumlah * 250;
  echo "<tr>
    <td>{$kurir}</td>
    <td>{$jenis}</td>
    <td>{$hari}</td>
    <td>{$jumlah}</td>
  </tr>";
}
echo '</table>';

?>