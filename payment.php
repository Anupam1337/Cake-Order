<?php
if(isset($_POST['cakpic'])) {
    $cakpic=$_POST['cakpic'];
}
if(isset($_POST['name'])) {
    $name=$_POST['name'];
}
if(isset($_POST['ing'])) {
    $ing=$_POST['ing'];
}
if(isset($_POST['sizcod'])) {
    $sizcod=$_POST['sizcod'];
}
if(isset($_POST['price'])) {
    $price=$_POST['price'];
}
if(isset($_POST['qty'])) {
    $qty=$_POST['qty'];
}
$quantity=1;
$contact="";

if(!empty($_GET)) {
    if(isset($_GET['cakpic'])) {
        $cakpic=$_GET['cakpic'];
    }
    if(isset($_GET['name'])) {
        $name=$_GET['name'];
    }
    if(isset($_GET['ing'])) {
        $ing=$_GET['ing'];
    }
    if(isset($_GET['sizcod'])) {
        $sizcod=$_GET['sizcod'];
    }
    if(isset($_GET['price'])) {
        $price=$_GET['price'];
    }
    if(isset($_GET['qty'])) {
        $qty=$_GET['qty'];
    }
    if(isset($_GET['quantity'])) {
        $quantity=$_GET['quantity'];
    }
    if(isset($_GET['contact'])) {
        $contact=$_GET['contact'];
    }
    
}
?>

<html>
    <head>
        <title></title>
        <style>
            .heading-primary {
                font-size: 5rem;
                font-weight: 200;
            }
            .util-center {
                text-align:center;
            }

            .item-show {
                text-align:center;
                margin: 5px;
                margin: 5px auto;
                height: 12rem;
                width: 65vh;
                padding: 5px;
                border: 1px solid black;
            }
            
            .img {
                height: 11rem;
                width: 11rem;
                float: left;
                margin-right: 5rem;
            }
            
            .cake-detail {
                text-align: left;
                align-content: flex-start;
            }
        </style>
    </head>
    <body>
        <div class="util-center">
            <h1 class="heading-primary" id="head">Payment Details</h1>
            <img src="img/done.png">
        </div>
        <div class='item-show util-center'>
                <img class='img' src='<?php echo $cakpic; ?>'>
                <div class='cake-detail'>
                    Name: <?php echo $name; ?><br>
                    Ingredient: <?php echo $ing ?><br>
                    Price: Rs.<?php echo $price ?><br>
                    Quantity: <?php echo ($quantity); ?><br>
                    Amount: Rs.<?php echo ($price*$quantity); ?><br>
                    Contact: <?php echo $contact; ?> <br>
                </div>
            
        </div>
        <center>
        <a style="margin: 3px auto;" href="index.php"><button>Home</button></a></center>

    </body>
</html>