<?php include('partials front/menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">

        <div class="container">
            
            <form action="<?php echo SITEURL; ?>flower-search.php" method="POST">
                <input type="search" name="search" placeholder="Цэцэг хайх" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

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

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center"> Онцлох загварууд</h2>

            <?php 
            $sql2 = "SELECT * FROM t_flowers WHERE active='Тийм' AND featured='Тийм'LIMIT 6";
            $res2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2>0)
            {
              while($row=mysqli_fetch_assoc($res2))
              {
                  $id = $row['id'];
                  $title = $row['title'];
                  $price = $row['price'];
                  $description = $row['description'];
                  $image_name = $row['image_name'];
                  ?>                        
                    <div class="flower-menu-box">
                        <div class="flower-menu-img">
                            <?php
                                if($image_name=="")
                                {
                                   echo "<div class='error'>Зураг байхгүй байна.</div>";
                                }
                                else
                                 {
                                    ?>
                                   <img src="<?php  echo SITEURL; ?>images/flowers/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                    <?php
                                }

                             ?>
                      
                      </div>

                      <div class="flower-menu-desc">
                         <h4><?php  echo $title; ?></h4>
                          <p class="flower-price"><?php echo $price; ?>₮</p>
                           <p class="flower-detail">
                              <?php echo $description; ?>
                         
                         </p>
                          <br>

                          <a href="<?php echo SITEURL; ?>order.php?flowers_id=<?php echo $image_name; ?>" class="btn btn-primary">Сагсанд хийх</a>
                         <a href="<?php echo SITEURL; ?>order.php?flowers_id=<?php echo $id; ?>" class="btn btn-primary">Захиалах</a> </br>
                      
                      </div>
                    </div>
                  <?php
                   }
                }
                else
                 {
                    echo "<div class='error'>Ангилал нэмэгдээгүй .</div>";
                }
            ?>


            <div class="clearfix"></div>
        </div>

    </section>
    <!-- Categories Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="flower-menu">
        <div class="container">
            <h2 class="text-center">Шинэ загварууд</h2>
             
            <?php 
            $sql2 = "SELECT * FROM t_flowers WHERE active='NO' AND featured='NO'LIMIT 6";
            $res2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2>0)
            {
              while($row=mysqli_fetch_assoc($res2))
              {
                  $id = $row['id'];
                  $title = $row['title'];
                  $price = $row['price'];
                  $description = $row['description'];
                  $image_name = $row['image_name'];
                  ?>
                         
                    <div class="flower-menu-box">
                        <div class="flower-menu-img">
                            <?php
                                if($image_name=="")
                                {
                                   echo "<div class='error'>Зураг байхгүй байна.</div>";
                                }
                                else
                                 {
                                    ?>
                                   <img src="<?php  echo SITEURL; ?>images/flowers/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                    <?php
                                }

                             ?>
                      
                      </div>

                      <div class="flower-menu-desc">
                         <h4><?php  echo $title; ?></h4>
                          <p class="flower-price"><?php echo $price; ?>₮</p>
                           <p class="flower-detail">
                              <?php echo $description; ?>
                         
                         </p>
                          <br>
                          <a href="<?php echo SITEURL; ?>order.php?tood_id=<?php echo $image_name; ?>" class="btn btn-primary">Сагсанд хийх</a>
                      <a href="<?php echo SITEURL; ?>order.php?tood_id=<?php echo $id; ?>" class="btn btn-primary">Захиалах</a> </br>
                      </div>
                     </div>
                  <?php

              }
            }
            else
             {
                echo "<div class= 'error'>цэцэг байхгүй байна. </div>";
            }
            
            ?>
     

            <div class="clearfix"></div>

        
        </div>

        <p class="text-center">
            <a href="#">See All Flower</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials front/footer.php');?>