<h1>HOME BERO</h1>

<?php
if (isset($_POST["message"])) {
	echo "<h3>Message: " . $_POST["message"] . "</h3>";
}
?>

<form action="input_aduan" method="post">

<select name="taman">
<?php
require_once("/../../models/taman.php");
$allTaman = Taman::getAll();
foreach ($allTaman as $taman) {
	echo "<option value='" . $taman->id . "'>" . $taman->nama . "</option>";
}
?>
</select>

<select name="kategori">
<?php
require_once("/../../models/kategori.php");
$allKategori = Kategori::getAll();
foreach ($allKategori as $kategori) {
	echo "<option value='" . $kategori->id . "'>" . $kategori->nama_kategori . "</option>";
}
?>
</select>

<br>
<input name="deskripsi" type="text" row="5" placeholder="Tulis keluhan/masukan/saranmu!"/>

</form>
