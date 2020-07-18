<?php
include 'config.php';
?>
 
<h3>Data Pengunjung</h3>
 
<form action="index.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>
 
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
 
<table border="1">
	<tr>
		<th>Id</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>No Kamar</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysql_query("select * from data where nama like '%".$cari."%'");				
	}else{
		$data = mysql_query("select * from data");		
	}
	$no = 1;
	while($d = mysql_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['nama']; ?></td>
		<td><?php echo $d['alamat']; ?></td>
		<td><?php echo $d['no_kamar']; ?></td>
	</tr>
	<?php } ?>
</table>