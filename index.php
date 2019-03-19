<?
session_start();
//echo json_encode($_SESSION);
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
        background:url("img/backg.jpg") no-repeat !important;
        background-size:cover !important;
    }
    .login-frame{
        margin:10% auto;
        width:60%;
        background:rgba(179, 179, 179,0.6);

        border-radius:10px;
        border:1px solid #eee;
        animation: createBox .25s;
    }
    .login-frame form{
        text-align:center;
    }
    #login-form input{
        width:40%;
        margin:0px auto;
    }

    .login-frame a{
        margin:10px 10px;
    }
</style>


<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    
    <body>
    <div class="login-frame">
        <form id="login-form" class="form-group">
            <h2>Please Enter your Creditals:</h2>
            <h5>Email:</h5>
            <input class="form-control" type="text" name="email">
            <br>
            <h5>Password:</h5>
            <input class="form-control" type="password" name="pswd">
            <br><br>
            <button class="btn btn-primary" type="button" id="login-btn">Login</button>
        </form>
        <div id="error-login"></div>
        <a class="btn btn-secondary" href="create_account.php">Create Account</a>
        <a class="btn btn-secondary" href="forgott_password.php">forgot password ?</a>
    </div>
    
    </body>
</html>

<script>
    $(document).ready(function() {
        $("#login-btn").on("click", function(){

                var postData = $('#login-form').serialize();
                $.ajax({
                    
                        type: "POST",
                        url: "login.php",
                        data:postData,
                        success: function(html){ // this happens after we get results
                            var data = JSON.parse(html);
                            if(data.error == 0){
                                window.location.replace("shop.php");
                            }else{
                                $("#error-login").html('<p style="color:red">Wrong data !</p>');

                            }

                        }
                });


        });



    });
</script>