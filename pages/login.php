<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
<?php
    require('../model/config.php');
    require('../function/message.php');
    require('../function/redirect.php');

    session_start();
    if(isset($_POST['submitLogin'])){
        if(isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])){
            $email = $_POST['emailLogin'];
            $pass = $_POST['passwordLogin'];
            $login = $db->table('accounts')->get();

            foreach ($login as $item) {
                if($item->email ==$email && $item->password == $pass){
                    $_SESSION['login'] = $item;
                }
            }
        
            if(isset($_SESSION['login'])){
                Redirects("../pages/?action=");
            }
            else{
                ErrorMessage("Đăng Nhập Thất Bại");
            }
        }
       
    }
   
?>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="emailLogin" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="passwordLogin" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <a href="forgot.php">Forgot Password</a>
                                        </label>
                                        <label style="float: right;">
                                            <a href="registed.php">Sign Up</a>
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button name="submitLogin" class="btn btn-lg btn-success btn-block">Login</butt>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
