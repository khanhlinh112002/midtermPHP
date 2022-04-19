<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        img{
            max-width: 600px;
            height: 600px;

        }
        h1{
            color: blue;
        }
        #price{
            color: red;
            font-size: large;
        }
        input{
            outline: 0;
            border: 0;
            border-bottom: 1px solid black;
        }
    </style>
</head>
<body>

</body>
</html>
<?php
    require_once('../connect.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];

}
?>
<?php
$sql = "Select* FROM products where id = $id";
$results = $conn->query($sql);
while ($row = $results->fetch_assoc()) { ?>
    <?php $img =$row['image']; ?>
    <form method="GET" action="cart.php">
        <div class="container">
        <img src="../<?php echo $img ?>" alt="">
            <div class="detail">
                <h1><?php echo $row['name'] ?></h1>
                <p id ="price"> Giá sản phẩm <?php echo $row['price'] ?> <small>đ</small></p>
                <br>
                <br>
                <h1>Số lượng của sản phẩm</h1>
                <input type = "hidden" name ="action" value="add">
                <input type="number" min = 1 max = 10 name = "quanlity">
                <input type="hidden" name = "id" value="<?php echo $row['id']?>">
                <br>
                <br>
                <button type="submit">Mua</button>
                <p>Giao hàng thành công</p>
                <p>Thanh toán khi nhận hàng</p>
                <p>Đổi hàng trong 15 ngày</p>
             </div>
        </div>
    </form>
   <?php }

?>
