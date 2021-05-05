<?php include('partials/menu.php');  ?>

            <!--Main Content Setion Starts-->
            <div class="main-content">
                 <div class="wrapper">
                       <h1></h1>

               
            </div>
            <!--Main Content Setion Starts-->
            <div class="main-content">
                 <div class="wrapper">
                       <h1>Хяналтын самбар </h1>
                       <br><br>
                       <?php 
                         if(isset($_SESSION['login']))
                        {
                         echo $_SESSION['login'];
                         unset($_SESSION['login']);
                        }
                       ?>
                       <br><br>
                       
                       <div class= "col-4 text-center" >
                       <?php 
                            $sql = "SELECT * FROM `t_gift-package`";
                            $res1 = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res1);

                       ?>
                       </di>
                       <h1><?php echo $count ; ?><h1>
                       <br />
                        Бэлгийн багц
                       </div>

                       <div class= "col-4 text-center" >
                       <?php 
                            $sql = "SELECT * FROM `t_new-model`";
                            $res5 = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res5);

                       ?>
                       </di>
                       <h1><?php echo $count ; ?><h1>
                       <br />
                        Шинэ загварууд 
                       </div>
                      
                       <div class= "col-4 text-center" >
                       <?php 
                            $sql = "SELECT * FROM `t_featured-models`";
                            $res1 = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res1);

                       ?>
                       </di>
                       <h1><?php echo $count ; ?><h1>
                       <br />
                        Онцлох загварууд
                       </div>
                       
                 
                 
                       <div class= "col-4 text-center" ></di>
                       <?php 
                            $sql2 = "SELECT * FROM t_flowers";
                            $res2 = mysqli_query($conn, $sql2);
                            $count2 = mysqli_num_rows($res2);

                       ?>
                       <h1><?php echo $count2; ?><h1>
                       <br />
                       Бүх цэцэгс
                       </div>

                    
                       <div class= "col-4 text-center" >
                       <?php 
                            $sql3 = "SELECT * FROM t_order";
                            $res3 = mysqli_query($conn, $sql3);
                            $count3 = mysqli_num_rows($res3);

                       ?>
                       </di>
                       <h1><?php echo $count3; ?><h1>
                       <br />
                       Нийт захиалга 
                       </div>

                
                       <div class= "col-4 text-center" >
                       <?php 
                            $sql4 = "SELECT SUM(total) AS Total FROM t_order ";
                            $res4 = mysqli_query($conn, $sql4);
                            $row4 =  mysqli_fetch_assoc($res4);
                            $total_revenue = $row4['Total'] ;

                       ?>

                       </di>
                       <h1><?php echo $total_revenue; ?>₮<h1>
                       <br />
                       Нийт орлого
                       </div>

                       <div class="clearfix"></div>
                        </div>
                </div>
            </div>
            <!--Main Content Setion Ends-->

            <?php include('partials/flower.php'); ?>