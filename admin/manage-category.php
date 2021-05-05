<?php include('partials/menu.php'); ?>

            <!--Main Content Setion Starts-->
            <div class="main-content">
                 <div class="wrapper">
                       <h1>Бэлгийн багц</h1>
                       <br/> <br/>

            <?php
            if(isset($_SESSION['add'])) 
            {
              echo $_SESSION['add'];  
              unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove'])) 
            {
              echo $_SESSION['remove'];  
              unset($_SESSION['remove']);
            }
            if(isset($_SESSION['delete'])) 
            {
              echo $_SESSION['delete'];  
              unset($_SESSION['delete']);
            }

            if(isset($_SESSION['no-category-found'])) 
            {
              echo $_SESSION['no-category-found'];  
              unset($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update'])) 
            {
              echo $_SESSION['update'];  
              unset($_SESSION['update']);
            }
            
            
            if(isset($_SESSION['upload'])) 
            {
              echo $_SESSION['upload'];  
              unset($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove'])) 
            {
              echo $_SESSION['failed-remove'];  
              unset($_SESSION['failed-remove']);
            }
            ?>
            <br><br>

                       <!--Button  to Category -->
                       <a href="<?php echo SITEURL ?>admin /add-category.php" class="btn-primary">Нэмэх</a>

                      <br />  <br />  <br />
                    <table class="tbl-Name">
                    <tr>
                         <th>№</th>
                         <th>Гарчиг </th>
                         <th>Зураг </th>
                         <th>Онцлох </th>
                         <th>Идэвхтэй </th>
                         <th> Үйлдэл </th>
                    </tr>
                     <?php             
                     $sql = "SELECT * FROM `t_gift-package`";
                     $res = mysqli_query($conn, $sql);
                     $count = mysqli_num_rows($res);
                     $sn=1;
                     
                     if($count>0)
                     {
                        
                          while($row=mysqli_fetch_assoc($res))
                          {
                               $id  = $row['id'];
                               $title = $row['title'];
                               $image_name = $row['image_name'];
                               $featured = $row['featured'];
                               $active = $row['active'];
                               ?>
                     <tr>
                                  <td><?php echo $sn++; ?>.</td>
                                  <td><?php echo $title ;?></td> 


                                  <td>
                                       <?php 
                                         if($image_name!="")
                                         {
                                              ?>  

                                              <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>"width="100px">
                                              <?php
                                         }
                                         else 
                                         {
                                              echo "<div class ='error'>Зураг нэмэгдээгүй .</div>";
                                         }
                                        ?>

                                        
                                  </td>

                                  <td><?php echo $featured; ?></td>
                                  <td><?php echo $active; ?></td>
                                  <td>
                                     <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Нэмэх</a>
                                     <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Устгах</a>
                                  </td>
                              </tr>

                               <?php
                          }
                     }
                     else 
                     {
                         
                          ?>
                 
                          <tr>
                            <td clospan="7"><div class = "error"> Нэмэгдээгүй .</td>
                          </tr>

                          <?php
                     }
                     ?>
              
   
         </table>
     

                </div>
            </div>
            <!--Main Content Setion Ends-->

<?php include('partials/flower.php'); ?>
