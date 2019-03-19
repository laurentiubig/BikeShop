
<? session_start();
    $c = mysqli_connect("localhost", "root", "root", "bigusshop",3306);

    $b = mysqli_query($c, "SELECT * FROM product");
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
    transition:height 0.5s;
}

#cart-cont{
    
    width:40px;
    height:40px;
    position:absolute;
    top:30px; 
    right:3%;
    animation: createBox .25s;
}
#cart-cont:hover{
    filter: invert(100%);
}
#logout{
    width:40px;
    height:40px;
    position:absolute;
    top:30px; 
    left:3%;
    animation: createBox .25s;
}
#logout:hover{
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
            <img id="cart" src="img/cart.png" style="width:40px;height:40px" > 
        </div>
        <div id="logout">
            <a class="btn btn-secondary" href="index.php">Logout</a>
        </div>
        <div class="shop">



            <? while($row = mysqli_fetch_assoc($b)){ ?>
            <div class="items">
                <form id="<?=$row['id']?>">
                    <img src="img/<?=$row['id']?>.jpg">
                    <p style="font-weight:bold;"><?=$row['product_name']?></p>
                    <p style="font-size:13px;height:20px;overflow:hidden;transition:height 0.5s" onmouseout="mouseout(this)" onmouseover="mouseon(this)"><?=$row['description']?></p>
                    <p><?=$row['price']?></p>

                    <input type="hidden" value="<?=$row['id']?>" name="product_id">
                    <input type="hidden" value="<?=$_SESSION['logged-user']?>" name="logged_usr">
                    <button type="button" class="btn btn-secondary addCart-btn" onclick="addItems(this)" >Add to cart</button>
                </form>
            </div>
            <? } ?>

        </div>
    </body>
</html>

<script>
$(document).ready(function() {
    $("#cart").on("click", function(){
        window.location.href="cart.php";

    });
});



    function addItems(btn){
        var postData = $(btn).parent().serialize();
        console.log(postData);
                $.ajax({
                    
                        type: "POST",
                        url: "add_to_cart.php",
                        data:postData,
                        success: function(html){ // this happens after we get results
                            var data = JSON.parse(html);
                            console.log(data);
                            if(data.error == 0){
                                window.location.href="cart.php";
                            }else{
                                console.log("error!");
                                
                            }

                        }
                });

    }

    function mouseon(par){
        $(par).css({"overflow":"scroll","height":"100px"});
        $(par).parent().parent().css({"height":"400px"});
    }
    function mouseout(par){
        $(par).css({"overflow":"hidden","height":"20px"});
        $(par).parent().parent().css({"height":"330px"});
    }

</script>