
<?php include('partials /menu.php'); ?>

<div class="main-content">
      <div class="wrapper">
        <h1> Бэлгийн багц нэмэх</h1>

        <br></br>

             
        <?php
            if(isset($_SESSION['add'])) 
            {
              echo $_SESSION['add'];  
              unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload'])) 
            {
              echo $_SESSION['upload'];  
              unset($_SESSION['upload']);
            }
        ?>

        <br><br>

     <!--Add Category form Starts -->
     <form action = ""method="POST" enctype='multipart/form-data'>
           <table class="tbl-30" >
           <tr>
             <td>Гарчиг : </td>
              <td>
                  <input type="text" name="title" placeholder="Ангиллын нэр ">
               </td>
         </tr>
          
         <tr>
              <td> Зургийг сонгоно уу </td>
              <td>
               <input type ="file" name="image">
              </td>
          </tr>
           
         <tr>
             <td>Онцлох : </td>
              <td>
                  <input type="radio" name="featured" value="yes">Тийм
                  <input type="radio" name="featured" value="no"> Үгүй
               </td>
         </tr>

         <tr>
             <td>Идэвхтэй: </td>
              <td>
                  <input type="radio" name="active" value="yes">Тийм
                  <input type="radio" name="active" value="no"> Үгүй
               </td>
         </tr>
    
               <tr>
               <td clospan="2">
               <input type="submit" name="submit" value="Багц нэмэх" class=" btn-secondary">
             </td>
        </tr>


           </table>
     
     </form>
     </div>
</div>

<?php include('partials/flower.php'); ?>

    <!--Add Category form Starts -->

       <?php
       if(isset($_POST['submit']))
       {
        
              $category = $_POST['category'];
              $title = isset($_POST['title']) ? $_POST['title'] : '';
              $featured = isset($_POST['featured']) ? $_POST['featured'] : 'no';
              $active = isset($_POST['active']) ? $_POST['active'] : 'no';

               if(isset($_FILES['image']['name']))
              {
                 $image_name = $_FILES['image']['name'];

                if($image_name != "")
                {
                    $ext = end(explode('.',$image_name));
                    $image_name = "Flowers_Category_".rand().'.'.$ext;   
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/".$image_name;
                    $upload = move_uploaded_file($source_path, $destination_path);

                  if($upload==false)
                 {
                   
                   $_SESSION['upload'] = "<div class ='eroor'>Зураг байршуулж чадсангүй. </div>";                  
                   header('location:'.SITEURL.'admin/add-category.php');                   
                   die();
                 }
                }
               }
              else {
                $image_name="";
              }

               $sql = "INSERT INTO `t_gift package` SET
               `title` = '$title',
               `image_name`='$image_name',
               `featured` ='$featured',
               `active`='$active'
               
                ";
               $res = mysqli_query($conn, $sql);
              
              if($res == true)
              {
               $_SESSION['add'] = "<div  class='success'> Амжилттай оруулсан .</div>";
               header("location:".SITEURL.'admin/manage-category.php');
              }
              else 
              {
                   $_SESSION['add'] = "<div  class='error'> Нэмж чадсангүй .</div>";
                   header("location:".SITEURL.'admin/add-category.php');
              }
       }
        ?>     
 
 
<?php include('partials/flower.php'); ?>