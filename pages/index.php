<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Demo Website bán hàng </title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">
       
        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">
        <div class="container-fluid">
            <!-- Navigation -->
         <?php
        require('../model/config.php');
        require('../function/message.php');
        require('../function/redirect.php');
        require('../db/product.class.php');
        session_start();
        include_once('../pages/Dashboard/nav.php'); 
        ?>
            <div id="page-wrapper">
                <?php
                 if(isset($_POST['action'])){
                    $action = $_POST['action'];
                }elseif(isset($_GET['action'])){
                    $action = $_GET['action'];
                }else {
                    $action = "statistical";
                }

                switch($action) {

                    case 'category':
                        if(isset($_SESSION['login'])){
                            include_once('../pages/category.php');
                        }
                        else{
                            Redirects("../pages/login.php");
                        }
                        break;

                     case 'editcate':
                        if(isset($_SESSION['login'])){
                            include_once('../pages/modal/categoryEditModal.php');
                        }
                        else{
                            Redirects("../pages/login.php");
                        }
                        break;

                    case 'editProduct':
                        if(isset($_SESSION['login'])){
                            include_once('../pages/modal/ProductEdit.php');
                        }
                        else{
                            Redirects("../pages/login.php");
                        }
                        break;

                    case 'editBrand':
                        if(isset($_SESSION['login'])){
                            include_once('../pages/modal/BrandEdit.php');
                        }
                        else{
                            Redirects("../pages/login.php");
                        }
                        break;  
                    case 'logout':
                        Redirects("../pages/login.php");
                        include_once('../pages/logout.php');

                        break;  

                    case 'product':
                        if(isset($_SESSION['login'])){
                            include_once('../pages/product.php');
                        }
                        else{
                            Redirects("../pages/login.php");
                        }
                        break;
                    
                    case 'profile':
                        if(isset($_SESSION['login'])){
                            include_once('../pages/profile.php');
                        }
                        else{
                            Redirects("../pages/login.php");
                        }
                        break;

                    case 'brand':
                        if(isset($_SESSION['login'])){
                            include_once('../pages/brand.php');
                        }
                        else{
                            Redirects("../pages/login.php");
                        }
                        break;
        

                    default:
                    if(isset($_SESSION['login'])){
                        include_once('../pages/profile.php');
                    }
                    else{
                        Redirects("../pages/login.php");
                    }
                        break;
                }
                ?>
            </div>
            <!-- /#page-wrapper -->
        </div>
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>
