<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_dvd'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_dvd = $_GET['id_dvd'];

			//query ke database SELECT tabel DVD berdasarkan id = $id
			$select = mysqli_query($connect, "SELECT * FROM DVD WHERE id_dvd='$id_dvd'") or die(mysqli_error($connect));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID not found.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$judul		= $_POST['judul'];
			$harga	  = $_POST['harga'];
			$nama_kategori	= $_POST['nama_kategori'];

			$sql = mysqli_query($connect, "UPDATE DVD SET judul='$judul', harga='$harga', nama_kategori='$nama_kategori' WHERE id_dvd='$id_dvd'") or die(mysqli_error($connect));

			if($sql){
				echo '<script>alert("Data successfully updated."); document.location="index.php?page=display_dvd";</script>';
			}else{
				echo '<div class="alert alert-warning">Failed to update data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_dvd&id_dvd=<?php echo $id_dvd; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID DVD</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_dvd" class="form-control" size="4" value="<?php echo $data['id_dvd']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Title</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Price</label>
        <div class="col-md-6 col-sm-6">
					<input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Category</label>
				<div class="col-md-6 col-sm-6">
					<select name="nama_kategori" class="form-control" required>
						<option value="">Choose Category</option>
						<option value="Action" <?php if($data['nama_kategori'] == 'Action'){ echo 'selected'; } ?>>Action</option>
						<option value="Adventure" <?php if($data['nama_kategori'] == 'Adventure'){ echo 'selected'; } ?>>Adventure</option>
						<option value="Children" <?php if($data['nama_kategori'] == 'Children'){ echo 'selected'; } ?>>Children</option>
						<option value="Drama" <?php if($data['nama_kategori'] == 'Drama'){ echo 'selected'; } ?>>Drama</option>
						<option value="Horror" <?php if($data['nama_kategori'] == 'Horror'){ echo 'selected'; } ?>>Horror</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Save">
					<a href="index.php?page=display_dvd" class="btn btn-warning">Back</a>
				</div>
			</div>
		</form>
	</div>
