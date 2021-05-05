<?php include('partials/menu.php'); ?>

<div class="main-content">
      <div class="wrapper">
        <h1>Цэцэг нэмэх</h1>

        <br></br>
        <?php
         if(isset($_SESSION['upload'])) 
         {
           echo $_SESSION['upload'];  
           unset($_SESSION['upload']);
         }
        ?>

        <form action = ""method="POST" enctype="multipart/form-data">
           <table class="tbl-30" >
           <tr>
             <td>Гарчиг : </td>
              <td>
                  <input type="text" name="title" placeholder="Цэцгийн нэр ">
               </td>
         </tr>

         <tr>
             <td>Тодорхойлолт : </td>
              <td>
                  <textarea name="description" cols="30" rows="5" placeholder="Цэцгийн тодорхойлолт "></textarea>
               </td>
         </tr>

         <tr>
             <td>Үнэ: </td>
              <td>
                  <input type="number" name="price">
               </td>
         </tr>

         <tr>
             <td>Зургийг сонгоно уу : </td>
              <td>
                  <input type="file" name="image">
               </td>
         </tr>

         <tr>
             <td>Бэлгийн багц: </td>
              <td>
                  <select name="gift package" >

                  <?php 
                  $sql = "SELECT * FROM t_gift package WHERE active ='Yes'";

                  $res = mysqli_query($conn, $sql);

                  $count = mysqli_num_rows($res);

                  if($count>0);
                   {
                      while($row=mysqli_fetch_assoc($res))
                      {
                          $id = $row['id'];
                          $title = $row['title'];

                          ?>

                           <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                           
                          <?php
                       }
                
                       ?>
                       <option value="0">No Category Found</option>
                       <?php
                   }
                  ?>

                
                  </select>
               </td>
         </tr>
         
               
         <tr>
             <td>Онцлох : </td>
              <td>
                  <input type="radio" name ="featured"value="Тийм">Тийм
                  <input type="radio" name ="featured"value="Үгүй">Үгүй
               </td>
         </tr>   

         <tr>
             <td>Идэвхтэй : </td>
              <td>
                  <input type="radio" name ="active"value="Тийм">Тийм
                  <input type="radio" name ="active"value="Үгүй">Үгүй
               </td>
         </tr>   
                
        <tr>
               <td clospan="2">
               <input type="submit" name="submit" value="Нэмэх" class=" btn-secondary">
             </td>
        </tr>


            </table>
       </form>

        <?php
              if(isset($_POST['submit']))
        {
                  $title = $_POST['title'];
                  $description = $_POST['description'];
                  $price = $_POST['price'];
                  $category = $_POST['category'];
            

           if(isset($_POST['featured']))
           {        
               $featured = $_POST['featured'];
           }
           else
            {
               $featured ="NO"; 
           }
         
           if(isset($_POST['active']))
           {
             $active = $_POST['active'];
           }
           else
            {
               $active = "NO";
           }
            
            if(isset($_FILES['image']['name']))
            {
                $image_name = $_FILES['image']['name'];

                if($image_name != "")
                {
                    $ext = end(explode('.',$image_name));
                    $image_name = "Flowers-Name-".rand().'.'.$ext;
                    $src= $_FILES['image']['tmp_name'];
                    $dst = "../images/flowers/".$image_name;
                    $upload = move_uploaded_file($src, $dst);
                    
                    if($upload==false)
                    {
                
                    $_SESSION['upload'] = "<div class ='eroor'>Зураг байршуулж чадсангүй. </div>";
                     header('location:'.SITEURL.'admin/add-flower.php');
                     die();
                   }
                   

                }
            }
             else
              {
                $image_name = "";
              }

              $sql2 ="INSERT INTO t_flowers SET
              title = '$title',
              description ='$description',
              price = '$price',
              image_name ='$image_name',
              category_id ='$category',
              featured = '$featured',
              active = '$active'
              ";

              
                $res2 = mysqli_query($conn, $sql2);

                if($res2 == true)
                {
                    $_SESSION['add'] = "<div class ='success'>Цэцэг амжилттай нэмсэн .</div>";
                      header('location:'.SITEURL.'admin/manage-flower.php');
                }
                else
                    {
                        $_SESSION['add'] = "<div class ='error'>Цэцэг нэмж чадсангүй.</div>";
                        header('location:'.SITEURL.'admin/manage-flower.php');
                   }

        }
          ?>


    </div>
</div>

        
        <?php include('partials/flower.php'); ?>     
