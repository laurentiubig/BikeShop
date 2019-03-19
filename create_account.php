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
            <form id="login-form">
                <h5>Email:</h5>
                <input type="text" name="email" class="form-control">
                <br>
                <h5>Password:</h5>
                <input type="password" name="new_pswd" class="form-control">
                <br>
                <h5>Name:</h5>
                <input type="text" name="new_usern" class="form-control">
                <br>
                <button class="btn btn-primary" type="button" id="create-btn">create</button>
            </form>
            <div id="error-create"></div>
            <a class="btn btn-secondary" href="index.php">Return to Login</a>
        </div>
    </body>
</html>

<script>
    $(document).ready(function() {
        $("#create-btn").on("click", function(){

                var postData = $('#login-form').serialize();
                $.ajax({
                    
                        type: "POST",
                        url: "create_new_account.php",
                        data:postData,
                        success: function(html){ // this happens after we get results
                            var data = JSON.parse(html);
                            console.log(data);
                            if(data.error == 0){
                                window.location.href="index.php";
                            }else{
                                $("#error-login").html('<p style="color:red">Wrong data !</p>');
                                
                            }

                        }
                });


        });



    });
</script>