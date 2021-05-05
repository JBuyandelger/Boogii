
    <?php include('partials front/menu.php');?>
        <?php 
            if(isset($_GET['flowers_id']))
          {
          $tood_id = $_GET['flowers_id'];
          $sql = "SELECT * FROM t_flowers WHERE id=$tood_id";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);
          if($count==1)
          {
             $row = mysqli_fetch_assoc($res);
             
             $title = $row['title'];
             $price = $row['price'];
             $image_name = $row['image_name'];

          }
          else
           {
              header('location:'.SITEURL);
             }
            }
               else
               {
                header('location:'.SITEURL);
             }
        ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="flower-search">
        <div class="container">
            
            <h2 class="text-center text-white">Захиалгаа баталгаажуулахын тулд бөглөнө үү.</h2>

            <form action="" method="POST" class="Зориулалт">
                <fieldset>
                    <legend>Сонгосон цэцэг</legend>

                    <div class="flower-menu-img">
                         <?php 
                             if($image_name=="")
                             {
                                echo "<div class='error'>зураг байхгүй байна.</div>";
                             }
                             else
                              {
                                 ?>
                                    <img src="<?php echo SITEURL; ?>images/flowers/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                 <?php
                             }
                         ?>
                        
                    </div>
    
                    <div class="flower-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden"name="food" value="<?php echo $title; ?>">
                        <p class="flower-price">$<?php echo $price;?></p>
                        <input type="hidden" name="price" value="<?php echo  $price; ?>">

                        <div class="order-label">Тоо хэмжээ</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Захиалгын мэдээлэл</legend>
                    <div class="order-label">Нэр</div>
                    <input type="text" name="full-name" placeholder="E.g boloroo" class="input-responsive" required>

                    <div class="order-label">Утасны дугаар</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>
                    </tr>
                  <div class="order-label">Хэзээ хүрүүлэх вэ?</div>
                 <select name="status">
                   <option  <?php if($status=="Ordered"){echo "selected";}?> value="Ordered">Захиалсан </option>
                   <option  <?php if($status=="On Delivary"){echo "selected";}?>value="On Delivery">Хүргэлттэй </option>
                   <option  <?php if($status=="Delivered"){echo "selected";}?>value="Delivered">Хүргэв </option>
                   <option  <?php if($status=="Cancelled"){echo "selected";}?>value="Cancelled">Цуцлагдсан </option>
                 </select>
                  
            
                   </tr>
                    <div class="order-label">Гэрийн хаяг</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
                          
                    
                    <input type="submit" name="submit" value="Захиалах" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
                if(isset($_POST['submit']))
                {
                  $food = $_POST['food'];
                  $price = $_POST['price'];
                  $qty = $_POST['qty'];

                  $total = $price * $qty;

                  $order_date = date("Y-m-d h:i:sa");

                  $status = "Ordered";

                  $customer_name = $_POST['full-name'];

                  $customer_contact = $_POST['contact'];

                  $customer_address = $_POST['address'];


                  $sql2 = "INSERT INTO t_order SET
                      food = '$food',
                      price = '$price',
                      qty = '$qty',
                      total = '$total',
                      order_date = '$order_date',
                      status = '$status',
                       customer_name = '$customer_name',
                       customer_contact = '$customer_contact',
                       customer_address = '$customer_address'
                  
                    ";
                  
                  $res2 = mysqli_query($conn, $sql2);
                  if($res2==true)
                  {
                    $_SESSION['order'] = "<div class='success text-center'>цэцэг амжилттай захиалав. </div>";
                    header('location:'.SITEURL);

                  }
                  else
                   {
                            $_SESSION['order'] = "<div class='error text-center'>цэцэг захиалж чадсангүй . </div>";
                            header('location:'.SITEURL);
                    }
                }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials front/footer.php');?>