<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $file=$_FILES['files'];
    $fileName=$_FILES['files']['name'];
    $fileTmpName=$_FILES['files']['tmp_name'];

    $file_ex = pathinfo($fileName, PATHINFO_EXTENSION);
			$file_ex_lc = strtolower($file_ex);


			if($file_ex_lc=="pdf"){
				$new_file_name = uniqid("FILE-", true).'.'.$file_ex_lc;
				$file_upload_path = 'upload/'.$new_file_name;
				move_uploaded_file($fileTmpName, $file_upload_path);

				// Insert into Database
				$sql = "INSERT INTO filesTable(url) 
				        VALUES('$new_file_name')";
				mysqli_query($conn, $sql);
				header("Location: index.php");}
				else if($file_ex_lc=="img" or $file_ex_lc=="jpeg" or $file_ex_lc=="jpg" or $file_ex_lc=="png"){
				$new_file_name = uniqid("FILE-", true).'.'.$file_ex_lc;
				$file_upload_path = 'upload/'.$new_file_name;
				move_uploaded_file($fileTmpName, $file_upload_path);

				// Insert into Database
				$sql = "INSERT INTO imgTable(url) 
				        VALUES('$new_file_name')";
				mysqli_query($conn, $sql);
				header("Location: index.php");}
				else
				echo "<SCRIPT> 
        alert('formato invalido')
        window.location.replace('index.php');
    </SCRIPT>";
			}

?>