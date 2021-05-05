<?php include('partials/menu.php'); ?>

            <!--Main Content Setion Starts-->
            <div class="main-content">
                 <div class="wrapper">
                       <h1>Сагс </h1>
                
                      <br />  <br />  <br />
                      <?php 
                       if(isset($_SESSION['update']))
                       {
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                       }
                      
                      ?>
                      </br>
                    <table  class="tdl-Name" cellspacing="20" >
                    <tr>
                         <th>№ </th>
                         <th>Нэр </th>  
                         <th>Үнэ </th>
                         <th>Ширхэг </th>
                         <th>Захиалгын огноо </th>
                         <th>Өөрчлөх </th>
                         
                         

                    </tr>
                    <?php
                       $sql = "SELECT * FROM tdl_baskets ORDER BY  id DESC ";
                       $res = mysqli_query($conn, $sql);
                       $count = mysqli_num_rows($res);
                       $sn = 1;
                       if($count>0)
                       {
                          while($row=mysqli_fetch_assoc($res))
                          {
                               $id = $row['id'];
                               $food = $row['food'];
                               $price = $row['price'];
                               $qty= $row['qty'];
                               $baskets_date = $row['baskets_date'];
                               $flowers = $row['flowers'];
                              ?>
                                   <tr>
                                       <td><?php echo $sn++; ?></td>
                                       <td><?php echo $food ;  ?></td> 
                                       <td><?php echo $price ;  ?></td>
                                       <td><?php echo $qty;  ?></td>
                                       <td><?php echo  $flowers ;  ?></td>
                                      <td><?php echo $baskets_date ;  ?></td>
                      

                                           <td>
                                       <a href="<?php echo SITEURL; ?>admin/update-baskets.php?id=<?php echo $id;?>" class="btn-secondary">Нэмэх</a>
                       
                                        </td>
                                   </tr>
                               <?php 

                          }
                       }
                       else 
                       {
                            echo " <tr><td colspan='12'class='error'>Захиалга авах боломжгүй .</td></tr>";
                       }
                    
                    ?>

           

          </table>  

               </div>
            </div>
            <!--Main Content Setion Ends-->

<?php include('partials/flower.php'); ?>
