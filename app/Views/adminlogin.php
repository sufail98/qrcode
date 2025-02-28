<?php if(isset($_SERVER['HTTPS'])){
    $protocol='https://';
}
else{
    $protocol='http://';
}
$api_url=$protocol.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).''; 
?><!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1 class="text-center">Delivery Note</h1>
            <div class="row card-body">
                <div class="col-sm-6">
                    <div class="lgn-png">
                        <img src="<?php echo base_url(); ?>/assets/img/1.svg" alt="" class="img-fluid lgn-img mx-auto d-block">
                    </div>
                </div>
                <div class="lgn-lft"></div>
                <div class="col-sm-5">
                    <div class="lgn-top"></div>
                    <p class="lgn-txt"><b>Login </b></p>
                    <form method="post" action="<?php echo base_url();?>/Frontpage/AdminLogin">
                        <div class="form-group">
                            <input type="text" name="uname" id="uname" class="form-control input-bx" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control input-bx" placeholder="Password" required="">
                        </div>
                        <button type="submit" name="submit" class="btn">Login</button>

                        
                    </form>
                </div>
                <a href="<?php echo base_url(); ?>/images/QrCodeScanner.apk"  style="text-decoration: none; color: ##210524 !important; margin: 10px auto; font-weight: 500;" download>  Download APK</a>
            </div>
            <!-- <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-5">
                    <p class="lgn-ftr text-center">Copyright &copy; <script>document.write(new Date().getFullYear())</script><a href="javascript:void(0);" class="font-weight-bold" onclick="javascript:location.href='http://irsys.in/'"
                        > IRSYS Technologies</a></p>

                    </div>
                </div> -->
            </div>
        </div>
    </body>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Quicksand');
        body{
            /*background-image: url(loginback.svg);*/
            /*background-repeat: no-repeat;*/
            background-color: #00aeef;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg stroke='%2378f8ff' stroke-width='66.7' stroke-opacity='0.05' %3E%3Ccircle fill='%2300aeef' cx='0' cy='0' r='1800'/%3E%3Ccircle fill='%231ea3e4' cx='0' cy='0' r='1700'/%3E%3Ccircle fill='%232b97d9' cx='0' cy='0' r='1600'/%3E%3Ccircle fill='%23348ccd' cx='0' cy='0' r='1500'/%3E%3Ccircle fill='%233a81c1' cx='0' cy='0' r='1400'/%3E%3Ccircle fill='%233e76b5' cx='0' cy='0' r='1300'/%3E%3Ccircle fill='%23416ca8' cx='0' cy='0' r='1200'/%3E%3Ccircle fill='%2342619c' cx='0' cy='0' r='1100'/%3E%3Ccircle fill='%2343578f' cx='0' cy='0' r='1000'/%3E%3Ccircle fill='%23424d83' cx='0' cy='0' r='900'/%3E%3Ccircle fill='%23404376' cx='0' cy='0' r='800'/%3E%3Ccircle fill='%233d3a69' cx='0' cy='0' r='700'/%3E%3Ccircle fill='%233a315d' cx='0' cy='0' r='600'/%3E%3Ccircle fill='%23362851' cx='0' cy='0' r='500'/%3E%3Ccircle fill='%23311f45' cx='0' cy='0' r='400'/%3E%3Ccircle fill='%232c173a' cx='0' cy='0' r='300'/%3E%3Ccircle fill='%23260f2f' cx='0' cy='0' r='200'/%3E%3Ccircle fill='%23210524' cx='0' cy='0' r='100'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }
        h1{
            color: #fff;
            margin-top: 40px;
            text-shadow: -1px 2px 3px #000000;
        }
        .card{
            margin-top: 110px;
            margin-bottom: 70px;
            border-radius: 20px;
            border: none;
            -webkit-box-shadow: 0px 0px 14px -2px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 14px -2px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 14px -2px rgba(0,0,0,0.75);
            background-color:rgba(255, 255, 255, 0.76);
        }
        .card-body{
            padding: 30px 70px 90px 70px;
        }
        .input-bx{
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.46);
        }
        .input-bx:focus{
            border-color:#9ea2a7 !important;
            box-shadow: 0px 0px 14px -5px rgba(0,0,0,0.75);
        }
        .input-bx:hover{
            box-shadow: 0px 0px 15px -5px rgba(0,0,0,0.75);
        }
        .btn{
            width: 100%;
            border-radius: 20px;
            background-color: #00aeef !important;
            color: #fff;
        }
        .btn:hover{
            box-shadow: 0px 0px 22px -5px rgba(0,0,0,0.75);
        }
        .lgn-txt{
            font-family: 'Quicksand', sans-serif;
        }
        .lgn-top{
            position: relative;
            margin-bottom: 5px;
            width: 7%;
            height: 2px;
            background-color: #00aeef;
            /* margin: 5px auto; */
        }
        .lgn-lft{
            margin-left: 1px;
            width: .08em;
            background-color: #a99f9f;
            margin-right: 30px;
            margin-top: 20px;

        }
        .lgn-img{
            width: 232px;
            height: 206px;
        }
        .lgn-ftr a{
            text-decoration: none;
            color: #00aeef
        }
        @media only screen and (max-width: 576px) {
            .card{
                margin-top: 70px;       
            }
        }
    </style>
    </html>