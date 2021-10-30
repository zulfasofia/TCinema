<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['id_dvd'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id_dvd = $_GET['id_dvd'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($connect, "SELECT * FROM DVD WHERE id_dvd='$id_dvd'") or die(mysqli_error($connect));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($connect, "DELETE FROM DVD WHERE id_dvd='$id_dvd'") or die(mysqli_error($connect));
		if($del){
			echo '<script>alert("Successfully delete data."); document.location="index.php?page=display_dvd";</script>';
		}else{
			echo '<script>alert(Data failed to delete."); document.location="index.php?page=display_dvd";</script>';
		}
	}else{
		echo '<script>alert("ID not found."); document.location="index.php?page=display_dvd";</script>';
	}
}else{
	echo '<script>alert("ID not found."); document.location="index.php?page=display_dvd";</script>';
}

?>
