<?php include('partials/menu.php'); ?>

<!--Main Content Setion Starts-->
<div class="main-content">
     <div class="wrapper">
           <h1>Онцлох зурагууд</h1>
           <br/> <br/>

           
          <?php
          
          if(isset($_SESSION['add'])) 
          {
            echo $_SESSION['add'];  
            unset($_SESSION['add']);
          }
          
          
          if(isset($_SESSION['delete'])) 
          {
            echo $_SESSION['delete'];  
            unset($_SESSION['delete']);
          }

          if(isset($_SESSION['update'])) 
          {
            echo $_SESSION['update'];  
            unset($_SESSION['update']);
          }

          if(isset($_SESSION['unauthorize'])) 
          {
            echo $_SESSION['unauthorize'];  
            unset($_SESSION['unauthorize']);
          }

          if(isset($_SESSION['update'])) 
          {
            echo $_SESSION['update'];  
            unset($_SESSION['update']);
          }
  

          ?>
          </br></br>
             <!--Button  to Flower -->
             <a href="<?php echo SITEURL; ?>admin/add-featured models.php" class="btn-primary"> Нэмэх </a>
             </br></br></br>
        <table class="tbl-Name">
        <tr>
             <th>№</th>
             <th>Гарчиг </th>
             <th>Үнэ </th>
             <th>Зураг </th>
             <th>Онцлох </th>
             <th>Идэвхтэй </th>
             <th> Үйлдэл </th>
        </tr>
         <?php
         
         $sql = "SELECT * FROM `t_featured-models`";
         $res = mysqli_query($conn, $sql);
         $count = mysqli_num_rows($res);
         $sn=1;

         if($count>0)
         {
            
             while($row=mysqli_fetch_assoc($res))
             {
                  
                  $id  = $row['id'];
                  $title = $row['title'];
                  $price= $row['price'];
                  $image_name = $row['image_name'];
                  $featured = $row['featured'];
                  $active = $row['active'];
                  
                ?>
                   
              <tr>
                    <td><?php echo $sn++; ?>.</td>
                   <td><?php echo $title; ?></td> 
                   <td>₮<?php echo $price; ?></td> 
                   
                   <td>
                       <?php 
                          if($image_name!="")
                          {
                              ?>
                    
                              <img src="<?php echo SITEURL;  ?>images/flowers/<?php echo $image_name; ?>  " height="100px">
                                
                              <?php
                          }
                          else 
                          {
                               
                             echo "<div class='error'> Image not Added .</div>";
                          }
                   
                        ?>
                   </td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                 <td>
                        <a href="<?php echo SITEURL; ?>admin/update-featured models.php?id=<?php echo $id; ?>" class="btn-secondary">Засах</a>
                        <a href="<?php echo SITEURL; ?>admin/delete-featured models.php?id=<?php echo $id;?>&image_name<?php echo $image_name; ?>" class="btn-danger">Устгах</a>
                 </td>
            </tr>

                <?php
             }
             
         } 
        else 
        {
          ?>
                 
          <tr>
            <td clospan="7"><div class = "error">Цэцэг нэмээгүй. </td>
          </tr>

          <?php
        }        
         ?>

</table>


    </div>
</div>
<!--Main Content Setion Ends-->

<?php include('partials/flower.php'); ?>

              