<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<input type="file" name="image ">
<input type="submit" name="submit" value="Засах" class="btn-secondary">
<?php
if (isset($_POST['submit'])){
    if (isset($_FILES['image']['name'])){
        $string = $_FILES['image']['name'];
        echo $string;

    }
}
?>
</body>

</html>