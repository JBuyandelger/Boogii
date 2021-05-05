<?php include('partials/menu.php'); ?>

            <!--Main Content Setion Starts-->
            <div class="main-content">
                 <div class="wrapper">
                       <h1>Админыг удирдах </h1>

                       <br/>
            
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
                       
                       if(isset($_SESSION['user-not-found']))
                       {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                       }
                       if(isset($_SESSION['pwd-not-match']))
                       {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);   
                       }
                       if(isset($_SESSION['change-pwd']))
                       {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                       }

                   ?>
                       <br><br>

                       <!--Button  to Admin -->
                       <a href="add-admin.php" class="btn-primary">Нэмэх</a>

                      <br />  <br /> 
                    <table class="tbl-Name">
                    <tr>
                         <th>№</th>
                         <th>Нэр</th>
                         <th>Хэрэглэгчийн нэр </th>
                         <th>Үйлдэл </th>
                         
                    </tr>

                    
                    <?php
                      $conn = mysqli_connect("localhost","root","");
                      mysqli_query($conn,"SET NAMES utf10");
                      mysqli_select_db($conn,"flower--order");

                     

$sql=mysqli_query($conn,"select * from t_admin");
    while($row=mysqli_fetch_array($sql))
    {
      echo "<tr><td>".$row[0]."</td><td> ".$row[1]."</td><td> ".$row[2]."</td><td>
      <a href='update-password.php?id=$row[0]'onclick='checkdelete()' class='btn-primary'> Нууц үг</a>
      <a href='update-admin.php?id=$row[0]' onclick=' checkdelete()' class='btn-secondary'>Нэмэх</a>
       <a href='delete-admin.php?id=$row[0]' onclick=' checkdelete()' class='btn-danger'>Устгах</a></td>

</tr>";

    }
    
                        ?>
                        
                
                    </table>
   
                </div>
            </div>
            <!--Main Content Setion Ends-->

<?php include('partials/flower.php'); ?>
