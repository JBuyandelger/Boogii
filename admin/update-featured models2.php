<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
<h1>Шинэчлэх </h1>
                     
                     <br><br>
<?php 
ob_start();
 if(isset($_GET['id']))
 {
    $id = $_GET['id'];
    $sql2 = "SELECT * FROM `t_featured-models` WHERE id=$id";
    $res2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($res2);
    $title = $row['title'];
    $description = $row['description'];
    $price = $row['price'];
    $current_image = $row['image_name'];
    $current_category = $row['category_id'];
    $featured = $row['featured'];
    $active = $row['active'];
    echo "echoing ::" . $title;
  
 }
 else
  {
     header('location:'.SITEURL.'admin/manage-flower.php');
 }

?>
<form action="" method="POST" enctype="multipart/form-data">

            
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
                  $sql ="SELECT * FROM` t_featured-models`  WHERE active='yes'";
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
               <input <?php if ($active=="yes") echo "checked='checked'"?> type="radio" name="featured" value = "yes">Тийм
               <input <?php if ($active=="no") echo "checked='checked'"?> type="radio" name="featured" value = "no">Үгүй
               </td>
            </tr>

            <tr>
               <td>Идэвхтэй : </td>
               <td>
               <input <?php if ($active=="yes") echo "checked='checked'"?> type="radio" name="active" value = "yes">Тийм
               <input <?php if ($active=="no") echo "checked='checked'"?> type="radio" name="active" value = "no">Үгүй
               </td>
            </tr>
           

           
            <tr>
               <td>
               <input  type="hidden" name="id" value="<?php echo $id; ?>">
               <input type="hidden" name="current_image" value="<?php echo $current_image?> ">

               <input type="submit" name="submit" value="Засах" class ="btn-secondary">
               </td>
            </tr>
 
            </table>
            </form>


            <?php
 if(isset($_POST['submit'])){
  header('location:'.SITEURL.'admin/manage-featured models.php');
 }
  ?>
            
 
   </div>
   
</div>
<?php include('partials/flower.php'); ?>
