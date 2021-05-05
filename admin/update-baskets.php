<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
          <h1>Таны сагс</h1>
            <br><br>
            <?php
             if(isset($_GET['id']))
             {
                
                $id=$_GET['id'];
                $sql = "SELECT * FROM tdl_baskets WHERE id=$id ";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                  $row = mysqli_fetch_assoc($res);
                  $food = $row['food'];
                  $price = $row['price'];
                  $qty = $row['qty'];
                  $baskets_date = $row['baskets_date'];
                   $flowers = $row['flowers'];
                
                }
                else
                 {
                    header('location:'.SITEURL.'admin/manage-baskets.php');
                }
             }
             else
              {
                 header('location:'.SITEURL.'admin/manage-baskets.php');
             }
 
           ?>
            <form action="" method="POST">
            <table class="tbl-30">
              <tr>
               <td>Цэцгийн нэр </td>
               <td><b><?php echo $food; ?></b></td>   
            
            </tr>
            <td>Үнэ </td>
            <td>
                <b>$<?php echo $price;?></b>
            </td>

            <tr>
               <td>Тоо ширхэг</td>
               <td>
                 <input type="number" name="qty" value="<?php echo $qty; ?>">
               </td>   
            
            </tr>
  
          
            <tr>
               <td clospan="2">
                    <input type="hidden"name="id" value="<?php echo $id;?>">
                     <input type="hidden"name="id" value="<?php echo $price;?>">
                   <input type="submit" name="submit" value="Нэмэх" class="btn-secondary">
                </td>
            </tr>
              </table>
            </form>
            <?php 
               if(isset($_POST['submit']))
               {
                   //echo "boloroo";
                   $id = $_POST['id'];
                   $price = $_POST['price'];
                   $qty = $_POST['qty'];
                   $baskets_date = $row['baskets_date'];
                   $flowers = $row['flowers'];

                   $sql2=" UPDATE tdl_baskets SET                   
                   price = $price,
                   qty = $qty,
                   baskets_date = $baskets_date,
                   flowers = $rowflowers,

        
                    WHERE id=$id
                   ";
                 $res2 = mysqli_query($conn,$sql);
                 if($res2==true)
                 {
                   $_SESSION['update'] = "<div class='success'>Захиалга амжилттай шинэчлэгдсэн .</div>";
                   header('location:'.SITEURL.'admin/manage-baskets.php');
                 }
                 else
                  {
                    $_SESSION['update'] = "<div class='error'>Захиалгыг шинэчилж чадсангүй  .</div>";
                    header('location:'.SITEURL.'admin/manage-baskets.php');
                 }
               }
               ?>
            </div>
     </div>  