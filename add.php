<?php include('config.php'); ?>

		<center><font size="6">Add Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id_dvd	  = $_POST['id_dvd'];
			$title    = $_POST['judul'];
			$price    = $_POST['harga'];
			$category	= $_POST['nama_kategori'];

			$cek = mysqli_query($connect, "SELECT * FROM DVD WHERE id_dvd='$id_dvd'") or die(mysqli_error($connect));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($connect, "INSERT INTO DVD(id_dvd, judul, harga, nama_kategori) VALUES('$id_dvd', '$title', '$price', '$nama_kategori')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Data successfully added."); document.location="index.php?page=display_dvd";</script>';
				}else{
					echo '<div class="alert alert-warning">Failed to add data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Failed, DVD ID has been taken</div>';
			}
		}
		?>

		<form action="index.php?page=add_dvd" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">DVD ID</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id_dvd" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Title</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="judul" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Price</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="harga" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Category</label>
				<div class="col-md-6 col-sm-6">
					<select name="nama_kategori" class="form-control" required>
						<option value="">Choose Category</option>
						<option value="Action">Action</option>
						<option value="Adventure">Adventure</option>
						<option value="Children" >Children</option>
						<option value="Drama" >Drama</option>
						<option value="Horror" >Horror</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Save">
			</div>
		</form>
	</div>
