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
    
    if($quantity > $qty) {
        echo '<script type="text/javascript">';
        echo 'alert("Enter correct quantity");';
        echo '</script>';
    }
    
    if($contact == "") {
        echo '<script type="text/javascript">';
        echo 'alert("Enter contact number");';
        echo '</script>';
    }   
    
    else if(!preg_match("/^[0-9]{10}+$/", $contact)) {
        echo '<script type="text/javascript">';
        echo 'alert("Enter correct contact number");';
        echo '</script>';
    }
    
    else {
        include "db.php";
        $query = "SELECT MAX(ordcak) as max FROM tbord";
        $result = mysqli_query($con, $query);
        if($row = mysqli_fetch_array($result)) {
            $ordcak = $row['max']+1;
        }
        else {
            $ordcak = 1;
        }
        $query = "INSERT INTO tbord(ordcak, ordsizcod, ordphnno, ordqty) VALUES($ordcak, $sizcod, '$contact', $quantity)";
        $query2 = "UPDATE tbsiz SET sizqty=".($qty-$quantity)." WHERE sizcod=$sizcod";
        if(mysqli_query($con, $query)) {
            mysqli_query($con, $query2);
            header("location:payment.php?cakpic=$cakpic&name=$name&ing=$ing&price=$price&quantity=$quantity&contact=$contact");
        }
        else {
            header("location:err.php");
        }
    }

}

if($qty <=0) {
    header("location:index.php?err=lowQuant");
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
                position: absolute;
                top: 25%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .item-show {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                display: block;
                margin: 5px;
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
            <h1 class="heading-primary" id="head">Cart</h1>
        </div>
        <div class='item-show'>
            
            <form method='get'>
                <img class='img' src='<?php echo $cakpic; ?>'>
                <div class='cake-detail'>
                    Name: <?php echo $name; ?><br>
                    Ingredient: <?php echo $ing ?><br>
                    Price: Rs.<?php echo $price ?><br>
                </div>
                <input type='hidden' value='<?php echo $cakpic; ?>' name='cakpic'>
                <input type='hidden' value='<?php echo $name; ?>' name='name'>
                <input type='hidden' value='<?php echo $ing; ?>' name='ing'>
                <input type='hidden' value='<?php echo $sizcod; ?>' name='sizcod'>
                <input type='hidden' value='<?php echo $price; ?>' name='price'>
                <input type='hidden' value='<?php echo $qty; ?>' name='qty'>
                <label for="quantity">Quantity : </label><input type="number" id="quantity" name="quantity" class="quantity" min="1" max="<?php echo $qty; ?>" value="<?php echo $quantity; ?>"><br>
                <label for="contact">Contact : </label><input type="" id="contact" name="contact" class="contact" value="<?php echo $contact; ?>" maxlength="10"><br>
                <button type="submit" value="Add to cart">Confirm Order</button>
            </form>
        </div>
    </body>
</html>