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

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            if(isset($_POST['sendmail'])){
                if(isset($_POST['email'])){
                    $to = $_POST['email'];
                    $subject = 'Hệ Thống Tmart: Đổi Mật Khẩu';
                    $mess = 'day la mess';
                    $header = 'From: nguyenthanhdat210101@gmail.com';
                    mail($to,$subject,$mess,$header);
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
                        <div class="panel-body"  style="display: block;">
                            <form method="POST"  enctype="multipart/form-data">
                                <fieldset>
                              
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                    <div class="input-group mb-3">
                                    <input class="form-control" placeholder="OTP" style="max-width:180px;" name="otp" type="text" maxlength="6">
                                    <button class="btn btn-outline btn-primary" name="sendmail" style="margin-left: 50px;">Send Mail</button>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Config Password" name="config" type="password" value="">
                                    </div>
                                
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" name="registed" class="btn btn-lg btn-success btn-block">Registerd</button>
                                    <a href="login.php" class="btn btn-lg btn-outline btn-block">Sign In</a>
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
