
    <?php include('partials front/menu.php');?>
         <?php
        if(isset($_GET['gift package_id']))
        {
         $category_id = $_GET['gift package_id'];
         $sql = "SELECT title FROM t_gift package WHERE id=$category_id";
         $res = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($res);
         $category_title = $row['title'];
        }
        else
         {
            header('location:'.SITEURL);
        }
    ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="flower-search text-center">
        <div class="container">
            
            <h2>Сонгсон цэцэг<a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    
    <!-- fOOD sEARCH Section Ends Here -->


    <?php
         if(isset($_SESSION['order']))
         {
             echo $_SESSION['order'];
             unset($_SESSION['order']);
         }
         if(isset($_SESSION['baskets']))
         {
             echo $_SESSION['baskets'];
             unset($_SESSION['baskets']);
         }
    ?>

    <!-- fOOD MEnu Section Starts Here -->
    <section class="flower-menu">
        <div class="container">
            <h2 class="text-center">Бүх цэцэгс</h2>
            <?php 
                
                $sql2 = "SELECT * FROM t_flowers WHERE category_id=$category_id";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
            
                if($count2>0)
                {
                  while($row2=mysqli_fetch_assoc($res2))
                  {
                    $category_id = $row2['category_id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    ?>
                       <div class="flower-menu-box">
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
                           <h4><?php echo $title; ?></h4>
                          <p class="flower-price"><?php echo $price; ?>₮</p>
                          <p class="flower-detail">
                            <?php echo $description; ?>
                          </p>
                          <br>
                          <a href="<?php echo SITEURL; ?>baskets.php?baskets_id=<?php echo $image_name; ?>" class="btn btn-primary">Захиалах</a>
                          <a href="<?php echo SITEURL; ?>order.php?tood_id=<?php echo $image_name; ?>" class="btn btn-primary">Захиалах</a>
                          </div>
                         </div>

                    <?php
                  }
                  
                }
                else 
                 {
                    echo "<div class='error'>цэцэг байхгүй байна .</div>";
                }
            
            ?>
            <div class="clearfix"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

  
    <?php include('partials front/footer.php');?>