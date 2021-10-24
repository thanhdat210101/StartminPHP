<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Category</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php
    $id =  $_GET['id'];
    $cate = $db->table('categories')->getOne($id);
    foreach($cate as $item){
        $name = $item->name;
    }

    if(isset($_POST['updateCategory']) && isset($_POST['nameEdit'])){
        if(strlen($_POST['nameEdit']) >= 3){
        $db->table('categories')->updates($id,[
            'name'=> $_POST['nameEdit']
        ]);
        
        SuccessMessage("Cập Nhật Thành Công");
    
        Redirects("../pages/?action=category");
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
                            <label for="">CategoryID</label>
                            <input type="text" class="form-control" name="idEdit" id="" aria-describedby="helpId"
                                value="<?=$id ?>" readonly placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="nameEdit" id="" value="<?=$name ?>"
                                aria-describedby="helpId" placeholder="">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-warning" name="updateCategory">Update</button>
                    <a class="btn btn-success" href="?action=category">Add Category</a>

                </div>

            </div>
        </div>
    </form>


</div>