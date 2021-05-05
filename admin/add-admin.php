<?php include('partials/menu.php'); ?>

<div class="main-content">
      <div class="wrapper">
        <h1>Админ нэмэх</h1>

        <br></br>
        
        <?php
            if(isset($_SESSION['add'])) 
            {
              echo $_SESSION['add'];  
              unset($_SESSION['add']);
            }
        ?>

        <form action=""method="POST">

         <table class="tbl-30">
          <tr>
             <td>Нэр: </td>
              <td>
                  <input type="text" name="name" placeholder="Нэрээ оруулна уу ">
               </td>
         </tr>

         <tr>
          <td> Хэрэглэгчийн нэр  </td>
          <td>
              <input type="text" name="username" placeholder="Таны хэрэглэгчийн нэр ">
          </td>
        </tr>

         <tr>
             <td>Нууц үг: </td>
          <td>
               <input type="password" name="password" placeholder="Таны нууц үг ">
           </td>
        </tr>

        <tr>
            <td clospan="2">
                <input type="submit" name="submit" value="Админ нэмэх"class="btn-secondary">
            </td>
       </tr>

    </table>

       </form>    


    </div>
</div>

<?php include('partials/flower.php'); ?>


<?php 

    if(isset($_POST['submit']))
    {
       
     $name = $_POST['name'];
     $username = $_POST['username'];
     $password = $_POST['password']; 
     $sql = "INSERT INTO t_admin SET 
         name='$name',
         username='$username',
         password= '$password'
     ";
         $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

       
        if($res==true)
        {
          
          $_SESSION['add'] = "Админ амжилттай нэмлээ ";
          header("location:".SITEURL.'admin/manage-admin.php');
        }
        else 
        {
          
          $_SESSION['add'] = "Админ нэмж чадсангүй ";
          header("location:".SITEURL.'admin/add-admin.php');
        }
}

?>