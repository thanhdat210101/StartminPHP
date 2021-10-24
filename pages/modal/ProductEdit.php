<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
           
        <a class="btn btn-outline btn-primary" href="?action=product">Back</a>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php
        $id =  $_GET['id'];
        $product = $db->table('products')->getOne($id);
        foreach($product as $item){
            $name = $item->name;
            $image = $item->image;
            $quantity= $item->quantity;
            $price = $item->unit_price;
            $discount= $item->discount;
            $description=$item->description;
            $enteredDate = $item->entered_date;
            $categoryId = $item->categoryid;
            $brandId = $item->brandid;
        }
    if(isset($_POST['update']) && isset($_POST['updateNameProduct']) && isset($_POST['updateEntered_date']) 
    &&isset($_POST['updateQuantity'])&&isset($_POST['updateUnitPrice'])
    &&isset($_POST['updateDescription'])&& isset($_POST['updateDiscount'])){
          
            if(strlen($_POST['updateNameProduct']) >= 3 && strtotime($_POST['updateEntered_date']) != null){
                
                if($_FILES['imageFile']['name'] != null){
                    $image =$_FILES['imageFile']['name'];
                }
            $db->table('products')->updates($id,[
                'name'=> $_POST['updateNameProduct'],
                'image'=>$image,
                'categoryid'=> $_POST['categoryItem'],
                'brandid'=>$_POST['brandItem'],
                'discount'=>$_POST['updateDiscount'],
                'description'=>$_POST['updateDescription'],
                'entered_date'=>$_POST['updateEntered_date'],
                'unit_price'=>$_POST['updateUnitPrice'],
                'quantity'=>$_POST['updateQuantity']
            ]);
            SuccessMessage("Cập Nhật Thành Công");
            move_uploaded_file($_FILES['imageFile']['tmp_name'],'../upload/'.$_FILES['imageFile']['name']);
            Redirects("../pages/?action=product");

            }elseif(strtotime($_POST['updateEntered_date']) == null){
                ErrorMessage("Ngày Nhập kho không tồn tại");
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
                        <div class="col-sm-4">
                            <img src="../upload/<?=(empty($image))?"noimage.png":$image; ?>"
                                style="display: block; max-width: 350px; max-height: 385px; width: 350px;  border: 1px;"
                                alt="" id="imageProduct">
                            <br>
                            <div class="form-group col-sm-9">
                                <input type="file" class="hidden" onchange="chooseFile(this)" id="photo"
                                    name="imageFile">
                                <input class="form-control hidden" type="text" name="noImageFile" value="<?=$image?>">
                                <label for="photo" class="btn btn-outline btn-danger">Select file</label>
                            </div>
                            <!-- upload view image  -->
                            <script>
                            function chooseFile(fileInput) {
                                if (fileInput.files && fileInput.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        $('#imageProduct').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(fileInput.files[0]);
                                }
                            }
                            </script>

                        </div>
                        <div class="col-sm-8">
                            <div class="row">

                                <div class="form-group col-sm-6">
                                    <label for="">Name</label>
                                    <input type="text" name="updateNameProduct" minlength="4" value="<?=$name?>"
                                        class="form-control" placeholder="Name" aria-describedby="helpId">

                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="">EnteredDate</label>
                                    <input type="date" name="updateEntered_date" value="<?=$enteredDate?>"
                                        class="form-control" placeholder="" aria-describedby="helpId">

                                </div>

                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="">Quantity</label>
                                    <input type="number" name="updateQuantity" value="<?=$quantity?>" min="1"
                                        class="form-control" placeholder="Quantity" aria-describedby="helpId">

                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="">UnitPrice</label>
                                    <input type="text" name="updateUnitPrice" value="<?=$price?>"
                                        minlength="4" class="form-control" aria-current="step" placeholder="UnitPrice"
                                        aria-describedby="helpId">

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="">Description</label>
                                    <input type="text" name="updateDescription" value="<?=$description?>"
                                        class="form-control" placeholder="Description" aria-describedby="helpId">

                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="">Discount</label>
                                    <input type="number" name="updateDiscount" value="<?=$discount?>" min="0" max="100"
                                        class="form-control" placeholder="Discount" aria-describedby="helpId">

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="">Category</label>
                                    <select id="my-select" name="categoryItem" class="form-control">
                                        <option value="<?=$categoryId?>" selected class="text-center">
                                            <?php 
                                            $catename =$db->table('categories')->getOne($categoryId);
                                            foreach($catename as $nameCate){
                                                echo $nameCate->name;
                                            } 
                                            ?></option>
                                        <?php
                                            $categorySelect =  $db->table('categories')->get();
                                            foreach($categorySelect as $item){
                                                 if($categoryId == $item->id){
                                                    continue;
                                                }
                                                 echo '<option value="'.$item->id.'" class="text-center">'.$item->name.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="">Brand</label>
                                    <select id="my-select" name="brandItem" class="form-control">
                                        <option value="<?=$brandId?>" selected class="text-center"><?php $brandName =$db->table('brand')->getOne($brandId);
                                    foreach($brandName as $itemBrand){
                                        echo $itemBrand->name;
                                    } ?></option>
                                        <?php
                           $brandSelect =  $db->table('brand')->get();
                        
                           foreach($brandSelect as $item){
                            if($brandId == $item->id){
                                continue;
                            }
                               echo '<option value="'.$item->id.'" class="text-center">'.$item->name.'</option>';
                           }
                           ?>
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning" name="update">Update</button>
            </div>
    </form>

</div>