<?php include('partials/menu.php'); ?>

<div class="main-content">
                 <div class="wrapper">
                       <h1>Шинэчлэх </h1>
                     
                       <br><br>
<?php 

   if(isset($_GET['id']))
   {
      $id = $_GET['id'];
      $sql2 = "SELECT * FROM t_flowers WHERE id=$id ";
      $res2 = mysqli_query($conn, $sql2);
      $row = mysqli_fetch_assoc($res2);
      $title = $row['title'];
      $description = $row['description'];
      $price = $row['price'];
      $current_image = $row['image_name'];
      $current_category = $row['category_id'];
      $featured = $row['featured'];
    
   } 
   else
    {
       header('location:'.SITEURL.'admin/manage-flower.php');
   }

?>

            
            <from action=""method="POST" enctype="multipart/form-data">
            
            <table class="tbl-30">

            <tr>
               <td>Гарчиг: </td>
               <td>
                  <input type="text" name="title" value="<?php echo $title; ?>" >
               </td>
            </tr>

            <tr>
               <td>Тодорхойлолт: </td>
               <td>
                  <textarea name="description" cols="30"rows="5"><?php echo $description; ?></textarea>
               </td>
            </tr>

            <tr>
               <td>Үнэ : </td>
               <td>
               <input type="number" name="price" value = "<?php echo $price; ?>">
               </td>
            </tr>


            <tr>
               <td>Одоогийн зураг : </td>
               <td>
                  <?php 
                  if($current_image == "")
                  {
                    echo "<div class='error'> Зураг байхгүй байна .</div>";
                  }
                  else
                   {
                      ?>
                      <img src="<?php echo SITEURL; ?>images/flowers/<?php echo $current_image;?>"width="150px">
                      <?php
                  }
                  ?>
               </td>
            </tr>

            <tr>
               <td>Шинэ зураг сонгоно уу : </td>
               <td>
               <input type="file" name="image ">
               </td>
            </tr>



            <tr>
               <td>Бэлгийн багц: </td>
               <td>
                  <select name="category">
                  <?php 
                  $sql ="SELECT * FROM t_gift package WHERE active='Yes'";
                  $res =mysqli_query($conn, $sql);
                  $count= mysqli_num_rows($res);
                  if($cout>0)
                  {
                     while($row=mysqli_fetch_assoc($res))
                     {
                         $category_title = $row['title'];
                         $category_id = $row['id'];
                         ?>
                         <option <?php if($current_category==$category_id){echo "selected"; }?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                         <?php
                     }
                  }
                  else
                   {
                    echo "<option value='0'>Category Not Available.</option>";
                  }
                  ?>
                    <option value="0">Test Category</option>
                  </select>
               </td>
            </tr>

            <tr>
               <td>Онцлох : </td>
               <td>
                  <input <?php if($featured=="Yes") {echo "checked";}?>type="radio" name="fuetured" value="Yes">Yes
                  <input <?php if($featured=="No") {echo "checked";}?>type="radio" name="fuetured" value="NO">NO
               </td>
            </tr>

            <tr>
               <td>Идэвхтэй : </td>
               <td>
               <input <?php if($featured=="Yes"){echo "checked";}?>type="radio" name="active" value="Yes">Yes
               <input <?php if($featured=="No"){echo "checked";}?>type="radio" name="active" value="NO">No
               </td>
            </tr>
           

           
            <tr>
               <td>
               <input  type="hidden" name="id" value="<?php echo $id; ?>">
               <input type="hidden" name="current_image" value="<?php echo $current_image?> ">

               <input type="submit" name="submit" value=" Нэмэх" class ="btn-secondary">
               </td>
            </tr>
 
            </table>
            </from>

            <?php
            if(isset($_POST['submit']))
            {
               //echo"boloroo";
               $id = $_POST['id'];
               $title = $_POST['title'];
               $description = $_POST['description'];
               $price = $_POST['price'];
               $current_image = $_POST['current_image'];
               $category = $_POST['category'];

               $featured = $_POST['featured'];
               $active = $_POST['active'];

               if(isset($_FILES['image']['name']))
               {
                 $image_name = $_FILES['image']['name'];
                 if($image_name!="")
                 {
                    $ext = end(explode('.', $image_name));
                    $image_name = "Flowers-Name-".rand().'.'.$ext;
                    $src_path = $_FILES['image']['tmp_name'];
                    $dest_path = "../images/flowers/".$image_name;
                    $upload = move_uploaded_file($src_path, $dest_path);
                    if($upload==false)
                    {
                       $_SESSION['upload'] = "<div class='error'>Шинэ зураг байршуулж чадсангүй . </div>";
                       header('location:'.SITEURL.'admin/manage-flower.php');
                       die();
                    }
                    if($current_image!="")
                    {
                       $remove_path = "../images/flowers/".$current_image;
                       $remove = unlink($remove_path);
                    }
                    if($remove==false)
                    {
                       $_SESSION['remove-failed'] = "<div class='error'>Одоогийн дүр төрхийг арилгах .</div>";
                       header('location:'.SITEURL.'admin/manage-flower.php');
                       die();
                    }
                 }
               }
               else
                {
                  $image_name = $current_image;
               }
              
               $sql3 = "UPDATE t_flowers SET
               title = '$title',
               description = ' $description ',
               price = '$price',
               image_name = '$image_name',
               category = '$category',
               featured = '$featured',
               active = '$active',
               WHERE id=$id
               ";
               $res3 = mysqli_query($conn, $sql3);
               if($res3==true)
               {
                 $_SESSION['update'] = "<div class='success'>Цэцэг амжилттай шинэчлэгдсэн .</div>";
                 header('location:'.SITEURL.'admin/manage-flower.php');
               }
               else
                {
                  $_SESSION['update'] = "<div class='error'>Цэцгийг шинэчилж чадсангүй.</div>";
                  header('location:'.SITEURL.'admin/manage-flower.php');
               }
            }
            ?>
   </div>
</div>

<?php include('partials/flower.php'); ?>
