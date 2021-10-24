<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
        
            <li>
                <a href="?action=brand"><i class="fa fa-tags" aria-hidden="true"></i> Brand</a>

                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="?action=category"> <i class="fa fa-list" aria-hidden="true"></i> category </a>
            </li>
            <li>
                <a href="?action=product"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Product</a>
            </li>
    
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <?php
                        if(isset($_SESSION['login'])){
                    ?>
                    <li>
                        <a href="?action=logout">LogOut</a>
                    </li>
                    <?php
                        }else{
                    ?>

                    <li>
                        <a href="login.php">Login Page</a>
                    </li>
                    <li>
                        <a href="registed.php">Registed Page</a>
                    </li>
                    <?php }?>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
</div>