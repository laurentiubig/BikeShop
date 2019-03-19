<?
session_start();

$c = mysqli_connect("localhost", "root", "root", "bigusshop",3306);

$rez = mysqli_fetch_array(mysqli_query($c,"SELECT id FROM purchases WHERE user_id = ".$_SESSION['logged-user']));
$b = mysqli_query($c, "SELECT * FROM purchase_items WHERE id = ".$rez['id']);
?>

<style>
       @keyframes createBox {
        from {
            transform: scale(0);
        }
        to {
            transform: scale(1);
        }
        }

body{
        background:url("img/back.jpg") no-repeat !important;
        background-size:cover !important;
    }

.shop{
    margin:100px 40px 0px 40px;
    padding:10px 10px 90px 10px;
    background:rgba(233, 235, 238,0.9);
    border-radius:5px;
    border:1px solid #eee;
    animation: createBox .25s;
}


.items img{
    width:140px;
    height:140px;
    border:1px solid #eee;
    border-radius:3px;
}
.items{
    display:inline-block;
    margin:30px 10px;
    background:rgb(253, 253, 253);
    border-radius:3px;
    border:1px solid rgb(253, 253, 253);
    width:200px;
    height:330px;
    text-align:center;
    padding:10px 0px;
    animation: createBox .25s;
}

#cart-cont{
    
    width:40px;
    height:40px;
    position:absolute;
    top:30px; 
    right:10%;
    animation: createBox .25s;
}
#cart-cont:hover{
    filter: invert(100%);
}
</style>



<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    
    <body>
        <div id="cart-cont">
            <a class="btn btn-secondary" href="shop.php">Return to shop</a>
        </div>
        
        <? while($row = mysqli_fetch_assoc($b)){ 
            $h = mysqli_fetch_array(mysqli_query($c, "SELECT * FROM product WHERE id =".$row['product_id']));
            ?>
            <div class="items">
                <form style="display:inline-block, background-color:grey ,width:100px,height:100px;">
                        <img src="img/<?=$row['product_id']?>.jpg">
                        <p><?=$h['product_name']?></p>
                        <p><?=$h['price']?></p>

                        <input type="hidden" value="<?=$row['id']?>" name="product_id">
                        <button class="btn btn-secondary" type="button" onclick="delFromCart(this)">Remove from cart</button>
                    
                </form>
            </div>
        <? } ?>
       

    </body>
</html>

<script>

function delFromCart(btn){
    
             var postData = $(btn).parent().serialize();
                $.ajax({
                    
                        type: "POST",
                        url: "remove_from_cart.php",
                        data:postData,
                        success: function(html){ // this happens after we get results
                            var data = JSON.parse(html);
                            console.log(data);
                            if(data.error == 0){
                                window.location.reload();
                            }else{
                                console.log("error!");
                                
                            }

                        }
                });
    
}
</script>