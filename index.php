<?php
    if(isset($_GET['err'])) {
        echo '<script type="text/javascript">';
        echo 'alert("Out of stock");';
        echo '</script>';
    }

    include "db.php";
    $food  ="";
    $res2="";
    if(isset($_GET['food'])){
        $food = $_GET['food'];
        if($food == 'veg' || $food == 'nveg') {
            $query = "SELECT * from tbsiz WHERE cakvegsts='$food'";
            $result = mysqli_query($con, $query);
            $res="";
            while($row = mysqli_fetch_array($result)) {
                if($row['sizqty']>0) {
                    $cat=$row['sizcat'];
                    if($cat=="Half KG")
                        $i=5;
                    else if($cat=="1 KG")
                        $i=1;
                    else if($cat=="2 KG")
                        $i=2;
                    
                    $res.="<option value='index.php?food=".$food."&size=".$i."'>".$cat."</option>\n";
                }
            }
            
            if(isset($_GET['size'])) {
                $size=$_GET['size'];
                $caketype = $food == 'veg'?0:1;
                $cakesize = $size == 5 ? "Half Kg": $size == 1? "1 KG": $size==2?"2 KG":"";
                $query2 = "SELECT * from tbcak WHERE cakvegsts=$caketype AND sizcat";
                $result2 = mysqli_query($con, $query2);
                $res2 = "";
                $i=0;
                while($row = mysqli_fetch_array($result2)) {
                    $cakpic=$row['cakpic'];
                    $caknam=$row['caknam'];
                    $caking=$row['caking'];
                    $sizcat=$row['sizcat'];
                    
                    $query = "SELECT * from tbsiz WHERE cakvegsts='$food' and sizcat='$sizcat'";
                    $result = mysqli_query($con, $query);
                    $row2 = mysqli_fetch_array($result);
                    $sizprc = $row2['sizprc'];
                    $sizqty = $row2['sizqty'];
                    $sizcod = $row2['sizcod'];
                    $res2.="<div class='item-show'>\n<img class='img' src='".$cakpic."'>\n<div class='cake-detail'>\nName: ".$caknam."<br>\nIngredient: ".$caking."<br>\nPrice: Rs.".$sizprc."<br>\nQuantity: ".$sizqty."<br>\n</div>\n<form method='post' action='cart.php'><input type='hidden' value='".$cakpic."' name='cakpic'>\n<input type='hidden' value='".$caknam."' name='name'>\n<input type='hidden' value='".$caking."' name='ing'>\n<input type='hidden' value='".$sizprc."' name='price'>\n<input type='hidden' value='".$sizcod."' name='sizcod'>\n<input type='hidden' value='".$sizqty."' name='qty'>\n<button type='submit' value='Add to cart'>Add to cart</button>\n</form>\n</div>";
                }
            }
            
        }
    }
?>
<html>
    <head>
        <title>Cake Order</title>
        <script type="text/javascript" src="lib/jquery.min.js"></script>
        <link rel="stylesheet" href="lib/bootstrap.min.css">
        <style>
            body {
                font-family: sans-serif;
                font-size: 62.5%;
                background-color:#1BCA9B;
                color: white;
            }
            .heading-primary {
                font-size: 5rem;
                font-weight: 200;
            }
            .util-center {
                text-align:center;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .form {
                font-size: 1.2rem;
                display: list-item;
                list-style: none;
                
            }
            .form input {
                margin-bottom: 2rem;
            }
            .form select {
                margin-bottom: 2rem;
            }
            #headi{
                color: white;
                padding-bottom:2rem; 
            }
            
            .cake-size {
                display: <?php echo ($food=='veg'||$food=='nveg')?"visible":"none" ?>;
                font-size: 1.4rem;
            }
            
            .veg-choice {
                display: inline-block;
                margin: 1rem;
                font-size: 1.6rem;
            }
            
            .item-show {
                display: block;
                margin: 5px;
                width: 100%;
                padding: 5px;
                border: 1px solid black;
            }
            
            .img {
                height: 25%;
                width: 25%;
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
            <h1 class="heading-primary" id="head">Cake Order</h1>
            <div class="veg-choice">
                <input type='radio' name='cake_type' value='veg' <?php echo $food=='veg'?"checked":"" ?> />&nbsp;Veg
                <input type='radio' name='cake_type' value='nveg' <?php echo $food=='nveg'?"checked":"" ?>/>&nbsp;Non Veg
            </div>
            <div id='show' class="cake-size">Select Cake Size :
                <select id="sel" class="div-toggle"  onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <option value="none" name="cake-size" value="none">--Select Cake Size--</option>
                    <?php echo $res; ?>
                </select>
                <div class="cake-option">
                    <div id='sh' class="">
                        <?php echo $res2;?>
                    </div>
                </div>
            </div>
        </div>
        
        
        <script type="text/javascript">
            $(document).ready(function(){
                $('input[name=cake_type]').on('change', function(){
                    var n = $(this).val();
                    switch(n) {
                        case 'veg':
                            location.href = 'index.php?food=veg';
                            break;
                        case 'nveg':
                            location.href = 'index.php?food=nveg';
                            break;
                    }
                });
            });
            
        </script>
    </body>
</html>