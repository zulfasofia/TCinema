<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Movie List</font></center>
		<hr>
		<a href="index.php?page=add_dvd"><button class="btn btn-dark right">Add Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
          <th>Movie ID</th>
					<th>Title</th>
					<th>Price</th>
					<th>Category</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($connect, "SELECT * FROM DVD ORDER BY id_dvd ASC") or die(mysqli_error($connect));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['id_dvd'].'</td>
							<td>'.$data['judul'].'</td>
							<td>'.$data['harga'].'</td>
							<td>'.$data['nama_kategori'].'</td>
							<td>
								<a href="index.php?page=edit_dvd&id_dvd='.$data['id_dvd'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?id_dvd='.$data['id_dvd'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this data?\')">Delete</a>
							</td>
						</tr>
						';
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Data not available.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
