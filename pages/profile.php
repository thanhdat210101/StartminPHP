
<div class="container-fluid" >
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profile</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
   
    <?php
    if(isset($_SESSION['login'])){
       echo $_SESSION['login']->password;
       echo $_SESSION['login']->email;
    }
?>
        
</div>