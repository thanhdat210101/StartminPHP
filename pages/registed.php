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
    require('../model/config.php');
    require('../function/message.php');
        $email='';
        $password ='';
        $photo = '';
        $registed_date='';
        $name ='';
        if(isset($_POST['registed'])){
        if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password'])
        && isset($_FILES['photo']['name']) ){
             
            $email = $_POST['email'];
            $password = $_POST['password'];
            $photo = $_FILES['photo']['name'];
            $name = $_POST['name'];
            $check = false;
            $RegEx = "/^[A-Za-z0-9_.]{6,}@([a-zA-Z0-9]{2,})(.[a-zA-Z]{2,})+$/";
            if(preg_match($RegEx,$email) && strlen($password)>=6 && !empty($name)){
                $checkAccount = $db->table('accounts')->get();
                foreach($checkAccount as $item){
                 if($item->email == $email){
                     $check =true;
                 }
                }
                if(!$check){
                 $db->table('accounts')->insert([
                     'email'=>$email,
                     'name'=>$name,
                     'password'=>$password,
                     'photo'=>$photo,
                     'register_date'=>date('Y-m-d')
                 ]);
                 move_uploaded_file($_FILES['photo']['tmp_name'],'../imageInfo/'.$_FILES['photo']['name']);
                 SuccessMessage("Đăng Kí Thành Công");
                }  
                else{
                    ErrorMessage("Tài khoản này đã tồn tại");
                }
            }
            elseif(!preg_match($RegEx,$email)){
                ErrorMessage("Hãy điền đúng email của bạn");
            }
            elseif(strlen($password)<6){
                ErrorMessage("Hãy nhập Password tối thiểu 6 kí tự");
            }
            elseif(empty($name)){
                ErrorMessage("Không để trống name");
            }
            else{
                ErrorMessage("Lỗi");
            }
          
      
        }
        else{
            ErrorMessage("Lỗi");
        }
    }
    
?>
    <script>
    function chooseFile(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imageInfo').attr('src', e.target.result);
            }

            reader.readAsDataURL(fileInput.files[0]);
        }
    }
    </script>
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
                                <img src="../upload/noimage.png"
                                style=" display: block; max-width: 330px; max-height: 385px; width: 330px;  border: 1px;"
                                alt="" id="imageInfo">
                            <br>
                                <div class="form-group">
                                <input type="file" class="" onchange="chooseFile(this)" id="photo"
                                    name="photo">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Name" name="name" type="text" value="">
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
