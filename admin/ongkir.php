<?php
include '../koneksi.php';
?>
<h2>Data Ongkir</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama kota</th>
			<th>tarif</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM ongkir"); ?>
		<?php while($pecah = $ambil -> fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_kota']; ?></td>
			<td><?php echo $pecah['tarif']; ?></td>
			<td>
				<a href="index.php?halaman=hapusongkir&id=<?php echo $pecah['id_ongkir']; ?>" class="btn-danger btn"><i class="bi bi-trash"></i> </a>
				<a href="index.php?halaman=ubahongkir&id=<?php echo $pecah['id_ongkir'];?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahongkir" class = "btn btn-primary"><i class="bi bi-building-add"></i> Tambah Data</a>