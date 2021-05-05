<?php include('partials/menu.php'); ?>

            <!--Main Content Setion Starts-->
            <div class="main-content">
                 <div class="wrapper">
                       <h1>Захиалга удирдах </h1>
                
                      <br />  <br />  <br />
                      <?php 
                       if(isset($_SESSION['update']))
                       {
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                       }
                      
                      ?>
                      </br>
                    <table  class="tbl-Name" cellspacing="20" >
                    <tr>
                         <th>№ </th>
                         <th>Нэр </th>  
                         <th>Үнэ </th>
                         <th>Ширхэг </th>
                         <th>Нийт </th>
                         <th>Захиалгын огноо </th>
                         <th>Статус </th>
                         <th>Хэрэглэгчийн нэр </th>
                         <th> Холбоо барих </th>
                         <th>Хаяг </th>
                         <th>Өөрчлөх </th>
                         
                         

                    </tr>
                    <?php
                       $sql = "SELECT * FROM t_order ORDER BY  id DESC ";
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
                               $total = $row['total'];
                               $order_date = $row['order_date'];
                               $status = $row['status'];
                               $customer_name = $row['customer_name'];
                               $customer_contact = $row['customer_contact'];
                               $customer_address = $row['customer_address'];

                              ?>
                                   <tr>
                                       <td><?php echo $sn++; ?></td>
                                       <td><?php echo $food ;  ?></td> 
                                       <td><?php echo $price ;  ?></td>
                                       <td><?php echo $qty;  ?></td>
                                       <td><?php echo  $total ;  ?></td>
                                      <td><?php echo $order_date ;  ?></td>

                                       <td>
                                       <?php 
                                     
                                        if ($status=="Ordered")
                                         {
                                            echo "<label>$status</label>";
                                        }
                                        if ($status=="Delivered") 
                                        {
                                             echo "<label style='color: green;'>$status</label>";
                                        }
                                        if ($status=="Cencelied") 
                                        {
                                             echo "<label style='color: reed;'>$status</label>";
                                        }
                                      
                                       ?>
                                       </td>
                                       <td><?php echo $customer_name; ?></td>
                                      
                                       <td><?php echo $customer_contact ;  ?></td>
                                       <td><?php echo $customer_address ;  ?></td>
                      

                                           <td>
                                       <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id;?>" class="btn-secondary">Нэмэх</a>
                       
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
