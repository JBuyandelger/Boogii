
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
             
        
             $price = $row['price'];
            

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
            
            <h2 class="text-center text-white">Таны Сагсанд</h2>

            <form action="" method="POST" class="Зориулалт">
                <fieldset>
                    <legend>1.</legend>

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

                        
                    </div>

                </fieldset>
                
                <fieldset>
                     <input type="submit" name="submit" value="Үргэлжүүлэх" class="btn btn-primary">
                    <legend>Үргэлжүүлэх</legend>
                    <div class="order-label">Нэр</div>
                    <input type="text" name="full-name" placeholder="E.g boloroo" class="input-responsive" required>

                    <div class="order-label">Утасны дугаар</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

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
                  $baskets_date = $_POST['baskets_date'];
                  $flowers = $_POST['flowers'];
              


                  $sql2 = "INSERT INTO t_baskets SET
                      food = '$food',
                      price = '$price',
                      qty = '$qty',
                      qty = $qty,
                      baskets_date = $baskets_date,
                      flowers = $rowflowers,
                    ";
                  
                  $res2 = mysqli_query($conn, $sql2);
                  if($res2==true)
                  {
                    $_SESSION['baskets'] = "<div class='success text-center'>цэцэг амжилттай захиалав. </div>";
                    header('location:'.SITEURL);

                  }
                  else
                   {
                            $_SESSION['baskets'] = "<div class='error text-center'>цэцэг захиалж чадсангүй . </div>";
                            header('location:'.SITEURL);
                    }
                }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials front/footer.php');?>