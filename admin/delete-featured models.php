<?php 
//Include Constants Page
include('../config/constants.php');

//echo "Delete Page";
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    
   $id = $_GET['id'];
   $image_name = $GET['image_name'];

 
     if($image_name != "")
     {
         
         $path = "../images/flowers/".$image_name;
         $remove = unlink($path);

        
         if($remove==false)
         {
          
          $_SESSION['upload'] = "<div class ='error '>Ангиллын зургийг устгах файл .</div>";
          header('location:'.SITEURL.'admin/manage-flower.php');
          
          die();
         }
     }
   
   $sql = "DELETE FROM `t_featured-models` WHERE  id =$id";

   $res = mysqli_query($conn, $sql);

  
   if($res==true)
   {
      
       $_SESSION['delete']= "<div class='success '>Ангиллыг амжилттай устгалаа .</div>";
       header('location:'.SITEURL.'admin/manage-flower.php');
   }
   else
    {
      
              $_SESSION['delete']= "<div class='error '>Ангиллыг устгаж чадсангүй.</div>";
              header('location:'.SITEURL.'admin/manage-flower.php');
    }
}
    else 
    {
        $_SESSION['unauthorize'] = "<div class='error '>Зөвшөөрөлгүй нэвтрэх .</div>";
        header('location:'.SITEURL.'admin/manage-flower.php');
    }
  
  


?>