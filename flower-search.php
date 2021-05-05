
    <?php include('partials front/menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="flower-search text-center">
        <div class="container">
            
            <h2> Цэцэг хайх <a href="#" class="text-white">"Би чамд хайртай"</a></h2>

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
            <h2 class="text-center">Цэцгийн зураг</h2>

            <?php  
               
                $sql = "SELECT * FROM t_flowers WHERE title LIKE '%$search%' OR description LIKE '%$search%'"  ;
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                   while($row=mysqli_fetch_assoc($res))
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
                                 echo "<div class='error'>зураг байхгүй байна.</div>";
                               }
                               else
                                {
                                   ?>
                                    <img src="<?php echo SITEURL;?>images/flowers/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
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
                       <a href="<?php echo SITEURL; ?>baskets.php?baskets_id=<?php echo $image_name; ?>" class="btn btn-primary">Сагсанд хийх</a>
                         <a href="<?php echo SITEURL; ?>order.php?tood_id=<?php echo $id; ?>" class="btn btn-primary">Захиалах</a> </br>
                      
                          </div>
                           </div>
                    <?php
                   }
                }
                else
                 {
                    echo "<div class='error'>Цэцэг олдсонгүй </div>";
                }   
            ?>
            <div class="clearfix"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

   
    <?php include('partials front/footer.php');?>