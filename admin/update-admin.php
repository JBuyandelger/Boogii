<?php include('partials/menu.php'); ?>

<div class = "main-content">
      <div class="wr">
      <h1>Админыг шинэчлэх </h1>

      <br><br>

      <?php
           $id=$_GET['id'];
          $sql="SELECT * FROM t_admin WHERE id=$id"; 
          $res=mysqli_query($conn, $sql);
          if($res==true)
            {
              $count = mysqli_num_rows($res);
              if($count==1)
              {
                  $row=mysqli_fetch_assoc($res);

                  $Name = $row['Name'];
                  $username = $row['username'];
              }
              else 
              {
                header('location:'.SITEURL.'admin/manage-admin.php');
              }
            }
      ?>


      <form action=""method="POST">
            
            <table class = "tbl-30">
            <tr>
            <td>Нэр: </td>
            <td>
              <input type="text" name="Name" value="<?php echo $Name; ?>">
            </td>
            </tr>

            <tr>
                <td>Хэрэглэгчийн нэр : </td>
                <td>
                <input type="text" name="username" value="<?php echo $username; ?>">
                </td>
            </tr>

            <tr>
            <td clospan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Нэмэх" class="btn-secondary" >
            </td>
            </tr>

            </table>

      </form>
      </div>
</div>

<?php
    if(isset($_POST['submit']))
    {
         $id = $_POST['id'];
         $Name = $_POST['Name'];
         $username = $_POST['username'];
         $sql = "UPDATE t_admin SET
         name = '$Name',
         username = '$username'
         WHERE id='$id'
         ";

         $res = mysqli_query($conn, $sql);
         if($res==true)
         {
           $_SESSION['update'] = "<div class ='success'>Админ амжилттай шинэчлэгдсэн .</div>";
           header('location:'.SITEURL.'admin/manage-admin.php');
         }
         else 
         {
           $_SESSION['update'] = "<div class ='error'>Админыг устгаж чадсангүй .</div>";
           header('location:'.SITEURL.'admin/manage-admin.php');
         }
        }
?>

<?php include('partials/flower.php'); ?>