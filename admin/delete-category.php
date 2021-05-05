<?php 
//Include Constants File
include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
   
   $id = $_GET['id'];
   $image_name = $GET['image_name'];

   
     if($image_name != "")
     {
     
         $path = "../images/category/".$image_name;
         $remove = unlink($path);

         if($remove==false)
         {
          
          $_SESSION['remove'] = "<div class ='error '>Ангиллын зургийг устгах файл .</div>";
         
          header('location:'.SITEURL.'admin/manage-category.php');
          die();
         }
     }

   $sql = "DELETE FROM `t_gift package` WHERE  id =$id";
   $res = mysqli_query($conn, $sql);

  
   if($res==true)
   {
        
       $_SESSION['delete']= "<div class='success '>Ангиллыг амжилттай устгалаа .</div>";
       header('location:'.SITEURL.'admin/manage-category.php');
   }
   else
    {
      
              $_SESSION['delete']= "<div class='error '>Ангиллыг амжилттай устгалаа .</div>";
              header('location:'.SITEURL.'admin/manage-category.php');
   }


}
else
 {

    header('location:'.SITEURL.'admin/manage-category.php');

}
?>