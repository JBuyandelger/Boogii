<?php


include('../config/constants.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM t_admin WHERE id = $id";
	$res = mysqli_query($conn, $sql);
	if($res == true)
	{
		$_SESSION['delete'] = "<div class='success'>Админыг амжилттай устгалаа .</div>";
		header('location:'.SITEURL.'admin/manage-admin.php');

	}
	else 
		{
			$_SESSION['delete'] = "<div class='error'>Админыг устгаж чадсангүй. Дараа дахин оролдоорой .</div>";
			header('location:'.SITEURL.'admin/manage-admin.php');

		}

?>