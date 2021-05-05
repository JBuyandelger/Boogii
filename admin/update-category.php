<?php include('partials/menu.php'); ?>

<!--Main Content Setion Starts-->
    <div class="main-content">
                 <div class="wrapper">
                       <h1>Бэлгийн багц шинэчлэх </h1>
           
                       <br><br>
             <?php
                      if(isset($_GET['id']))
                      {
                        $id = $_GET['id']; 
                        $sql = "SELECT * FROM `t_gift package` WHERE `id` = '$id' ";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if($count==1)
                        {
                          
                          $row = mysqli_fetch_assoc($res) ;
                          $title = $row['title'];
                          $current_image = $row['image_name'];
                          $featured = $row['featured'];
                          $active = $row['active'];
                        }
                        else 
                        {
                        
                          $_SESSION['no-category-found'] = "<div class ='error'> Олдсонгүй .</div>";
                          header('location:'.SITEURL.'admin/manage-category.php');
                        }
                      }
                      else 
                      {
                        header('location:'.SITEURL.'admin/manage-category.php');
                      }
                      
                ?>

                    <from action=""method="POST" enctype="multipart/form-data">
                    <table class="tbl-30">

                    <tr>
                    <td>Гарчиг:  </td>
                    <td>
                    <input type="text" name="title" value="<?php echo $title; ?>" >
                    </td>
                    </tr>

                  <tr>
            <td>Одоогийн зураг:  </td>
            <td>
              <?php 
                    if($current_image != "")
                    {
                      ?>
                       <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>"with ="150px">
                      <?php
                    }
                    else 
                    {
                       echo"<div calss ='error '>Зураг нэмэгдээгүй .</div>";
                    }
                 ?>
              </td>
          </tr>

            <tr>
            <td>Шинэ зураг:  </td>
            <td>
              <input type="file" name="image">
            </td>
            </tr>

            <tr>
            <td>Онцлох:  </td>
            <td>
              <input <?php if($featured=="yes"){echo "checked";}?> type="radio" name="featured" value="yes">Тийм
              
              <input <?php if($featured=="no"){echo "checked";}?> type="radio" name="featured" value="no"> Үгүй
               </td>
            </tr>

            
            <tr>
            <td>Идэвхтэй : </td>
            <td>
               <input <?php if($active=="yes"){echo "checked";}?> type="radio" name="active" value="yes">Тийм

              <input <?php if($active=="no"){echo "checked";}?>type="radio" name="active" value="no"> Үгүй
                 
            </td>
            </tr>

            <tr>
                <td>
                      <input type="hidden" name="current_image" value="<?php echo $current_image; ?>" >
                      <input type="hidden" name= "id" value="<?php echo $price;?>">     
                     <input type="submit" name="submit" value="Нэмэх" class=" btn-secondary">
                </td>
           </tr>

            </table>

        </form>

        <?php
            if(isset($_POST['submit']))
            {
              //echo  "Clicked"
              $id = $_POST['id'];
             $title = $_POST['title'];
             $current_image = $_POST['current_image'];
             $featured = $_POST['featured'];
             $active = $_POST['active'];  
 
             if(isset($_FILES['image']['name']))
             {
              $image_name = $_FILES['image']['name'];

              
              if($image_name !="")
              {
                $ext = end(explode('.',$image_name));

               
             $image_name = "Flowers_Category_".rand().'.'.$ext;
                
             $source_path = $_FILES['image']['tmp_name'];

             $destination_path = "../images/category/".$image_name;

           
             $upload = move_uploaded_file($source_path, $destination_path);

             if($upload==false)
             {
              
               $_SESSION['upload'] = "<div class ='eroor'>Зураг байршуулж чадсангүй. </div>";
               
               header('location:'.SITEURL.'admin/manage-category.php');
              
               die();
             }
              if($current_image!="")
              {
                $remove_path = "../images/category/".$current_image;

                $remove = unlink($remove_path);
   
                if($remove== false)
                {
                  $_SESSION['failed-remove'] = "<div class='error'>Одоогийн зургийг устгахын тулд алдаа гарав.</div>";
                  header('location:'.SITEURL.'admin/manage-category.php');
                  die();
                }
              }

            
              }
              else
              {
                $image_name = $current_image;
              }
             }
             else 
             {
              $image_name = $current_image;
             }
                
              $sql2 = "UPDATE t_gift package SET
              `title` = '$title',
              `image_name` = '$image_name',
              `featured` ='$featured',
              `active` = '$active',
              WHERE id=$id 

             ";
          
             $res2 = mysqli_query($conn, $sql2);

             if($res2==true)
             {
               $_SESSION['update']= "<div class='success'> Амжилттай шинэчлэв .</div>";
               header('location:'.SITEURL.'admin/manage-category.php');
             }
             else 
             {
              $_SESSION['update']= "<div class='error'> Шинэчилж чадсангүй.</div>";
              header('location:'.SITEURL.'admin/manage-category.php');
             }

         
            }   
      
        ?>   
   </div>
</div>     
                       
       <?php include('partials/flower.php'); ?>

