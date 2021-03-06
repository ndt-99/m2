<?php
include '../db.php';
$id=$_REQUEST['id'];
$sql = "SELECT * FROM products WHERE id='$id'";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
//fetch se tra ve du lieu 1 ket qua
$rows = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    $color = $_REQUEST['color'];
    $breed = $_REQUEST['breed'];
    $gender = $_REQUEST['gender'];
    $price = $_REQUEST['price'];
    $img = $_REQUEST['img'];
    $errors = [];
    if ($name==''){
        $errors['name']="You need to enter your name";
    }if ($age==''){
        $errors['age']="You need to enter your age";
    }if ($color==''){
        $errors['color']="You need to enter your color";
    }if ($breed==''){
        $errors['breed']="You need to enter your breed";
    }if ($gender==''){
        $errors['gender']="You need to enter your gender";
    }if ($price==''){
        $errors['price']="You need to enter your lại price";
    }if ($img==''){
        $errors['img']="You need to enter your lại img";
    }
    if (empty($errors)) {
        $sql = "UPDATE products SET name = '$name', age = '$age', color = '$color', breed = '$breed',gender = '$gender', price = '$price', image = '$img' WHERE id = '$id'";
        $conn->query($sql);
        header('location:index.php');
        // $_SESSION['flash_message'] = "Chỉnh sửa  thành công";
    }

  

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span {
            color: red;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="post" action="">
            <legend>Add Product</legend>
          
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" value="<?=$rows->name; ?>">
                <span><?php if (isset($errors['name'])) {
                            echo $errors['name'];
                        }
                          ?></span>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Age</label>
                <input type="text" name="age" id="" class="form-control" placeholder="" value="<?=$rows->age; ?>">
                <span><?php if (isset($errors['age'])) {
                            echo $errors['age'];
                        }
                          ?></span>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Color</label>
                <input type="text" name="color" id="" class="form-control" placeholder="" value="<?=$rows->color; ?>">
                <span><?php if (isset($errors['color'])) {
                            echo $errors['color'];
                        }
                          ?></span>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Breed</label>
                <input type="text" name="breed" id="" class="form-control" placeholder="" value="<?=$rows->breed; ?>">
                <span><?php if (isset($errors['breed'])) {
                            echo $errors['breed'];
                        }
                          ?></span>
            </div>
            <label for="disabledTextInput" class="form-label">Gender</label><br>
            <div class="form-check form-check-inline">
            <?php $signi= $rows->gender; ?> 
                <input class="form-check-input" type="radio" name="gender" id="" value="Male_Dog"  <?php if($signi=='Male_Dog'){ echo "checked=checked";}; ?>/>Male Dog
                <label class="form-check-label" for="inlineRadio1"></label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="" value="Bitch" <?php if($signi=='Bitch'){ echo "checked=checked";};  ?> />Bitch
                <label class="form-check-label" for="inlineRadio2"></label>
            </div><br>
            <span><?php if (isset($errors['gender'])) {
                            echo $errors['gender'];
                        }
                          ?></span>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Price($)</label>
                <input type="text" name="price" id="" class="form-control" placeholder="" value="<?=$rows->price; ?>">
                <span><?php if (isset($errors['price'])) {
                            echo $errors['price'];
                        }
                          ?></span>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Images</label>
                <input type="file" name="img" id="" class="form-control" placeholder="" value="<?=$rows->image; ?>">
                <span><?php if (isset($errors['img'])) {
                            echo $errors['img'];
                        }
                          ?></span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-danger">cancel</a>
        </form>
    </div>
</body>

</html>