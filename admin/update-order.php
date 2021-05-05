<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
          <h1>Таны сагс</h1>
            <br><br>

            <?php
             if(isset($_GET['id']))
             {
                
                $id=$_GET['id'];
                $sql = "SELECT * FROM t_order WHERE id=$id ";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                  $row = mysqli_fetch_assoc($res);
                  $food = $row['food'];
                  $price = $row['price'];
                  $qty = $row['qty'];
                  $status = $row['status'];
                  $customer_name = $row['customer_name'];
                  $customer_contact= $row['customer_contact'];
                  $customer_addresss = $row['customer_address'];
                }
                else
                 {
                    header('location:'.SITEURL.'admin/manage-Order.php');
                }
             }
             else
              {
                 header('location:'.SITEURL.'admin/manage-Order.php');
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
               <td>Статус </td>
               <td>
                 <select name="status">
                   <option  <?php if($status=="Ordered"){echo "selected";}?> value="Ordered">Захиалсан </option>
                   <option  <?php if($status=="On Delivary"){echo "selected";}?>value="On Delivery">Хүргэлттэй </option>
                   <option  <?php if($status=="Delivered"){echo "selected";}?>value="Delivered">Хүргэв </option>
                   <option  <?php if($status=="Cancelled"){echo "selected";}?>value="Cancelled">Цуцлагдсан </option>
                 </select>
               </td>   
            
            </tr>

             <tr>
                <td>Хэрэглэгчийн нэр: </td>
                <td>
                    <input type="text" name="custome_name"value="<?php echo $customer_name; ?>">
                </td>
             </tr>

             <tr>
                <td>Үйлчлүүлэгчтэй холбоо барих дугаар : </td>
                <td>
                    <input type="text" name="custome_name"value="<?php echo $customer_contact; ?>">
                </td>
             </tr>

             <tr>
                <td>Үйлчлүүлэгчийн хаяг : </td>
                <td>
                  <textarea name="customes_adderss" id="" cols="30" rows="5"><?php echo  $customer_addresss;?></textarea>
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
                   $total = $price * $sql;
                   $statuc = $_POST['statuc'];
                   $customer_name=$_POST['customer_name'];
                   $customer_contact = $_POST['customer_contact'];
                   $customer_addresss = $_POST['$customer_addrersss'];

                   $sql2=" UPDATE tdl_order SET
                   qty= $sqy,
                   total=$total,
                   status=$status,
                   customer_name='$customer_name',
                   customer_contact='$customer_contact',
                   customer_address='$customer_addresss'
                    WHERE id=$id
                   ";
                 $res2 = mysqli_query($conn,$sql);
                 if($res2==true)
                 {
                   $_SESSION['update'] = "<div class='success'>Захиалга амжилттай шинэчлэгдсэн .</div>";
                   header('location:'.SITEURL.'admin/manage-Order.php');
                 }
                 else
                  {
                    $_SESSION['update'] = "<div class='error'>Захиалгыг шинэчилж чадсангүй  .</div>";
                    header('location:'.SITEURL.'admin/manage-Order.php');
                 }
               }
            
            ?>
          </div>
     </div>             



