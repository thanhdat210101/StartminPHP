<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Category</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php
    $id =  $_GET['id'];
    $brand = $db->table('brand')->getOne($id);
    foreach($brand as $item){
        $name = $item->name;
    }

    if(isset($_POST['updateBrand']) && isset($_POST['nameEditBrand'])){
        if(strlen($_POST['nameEditBrand']) >= 3){
        $db->table('brand')->updates($id,[
            'name'=> $_POST['nameEditBrand']
        ]);
        
        SuccessMessage("Cập Nhật Thành Công");
    
        Redirects("../pages/?action=brand");
    }
    else{
        ErrorMessage("Chuỗi quá ngắn");
    }
    }
  ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">

            </div>

            <div class="card-body">
                <div class="panel panel-collapse">
                    <div class="row">
                        <div class="form-group">
                            <label for="">BrandID</label>
                            <input type="text" class="form-control" name="idEditBrand" id="" aria-describedby="helpId"
                                value="<?=$id ?>" readonly placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="nameEditBrand" id="" value="<?=$name ?>"
                                aria-describedby="helpId" placeholder="">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-warning" name="updateBrand">Update</button>
                    <a class="btn btn-success" href="?action=brand">Add Brand</a>

                </div>

            </div>
        </div>
    </form>


</div>