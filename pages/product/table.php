<div class="row">

    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php
  $dbProduct = new productDatabase($config);
$getData = $dbProduct->getProduct();

$name='';
$price=0.0;
$date = date('Y-m-d');
$discount = 0.0;
$quantity = 0;
$image='';
$description='';

if(isset($_POST['createProduct'])){

  if(isset($_POST['nameProduct']) && isset($_POST['quantity']) && isset($_POST['entered_date']) && isset($_POST['discount'])
     && isset($_POST['unitPrice']) && isset($_FILES['imageFile']['name'])&& isset($_POST['description']) ){

    $name=$_POST['nameProduct'];
    $price=$_POST['unitPrice'];
    $date = $_POST['entered_date'];
    $discount = $_POST['discount'];
    $quantity = $_POST['quantity'];
    $image = $_FILES['imageFile']['name'];
    $description =$_POST['description'];
    $category = $_POST['categoryItem'];
    $brand = $_POST['brandItem'];
    if(!empty($category)&&!empty($brand)&&strtotime($_POST['entered_date']) != null){
        $db->table('products')->insert([
            'id'=>0,
            'name'=>$name,
            'unit_price'=>$price,
            'quantity'=>$quantity,
            'discount'=>$discount,
            'entered_date'=>$date,
            'description'=>$description,
            'image'=>$image,
            'categoryid'=>$category,
            'brandid'=> $brand
          ]);
          move_uploaded_file($_FILES['imageFile']['tmp_name'],'../upload/'.$_FILES['imageFile']['name']);
          SuccessMessage("Thêm Thành Công Product: ".$name);
          $getData = $dbProduct->getProduct();
    }
    elseif(empty($category )){
        ErrorMessage("Hãy chọn thể loại cho sản phẩm của bạn");
    }
    elseif(empty($brand)){
        ErrorMessage("Hãy chọn hãng cho sản phẩm của bạn");
    }
    elseif(strtotime($_POST['entered_date']) == null){
        ErrorMessage("Ngày nhập kho không tồn tại");
    }
  
  }
  else{
    ErrorMessage("thất bại");
    
  }

}

?>
<div class="panel panel-default">
    <button class="btn btn-primary" style="margin: 20px; float: right;" data-toggle="modal" data-target="#createModal">
        Thêm Sản Phẩm</button>
    <table class="table table-striped table-inverse">

        <thead class="thead-inverse">
            <tr
                style="background-color: rgb(104, 104, 104);height: 40px; color: white;font-weight: bolder; text-align: center;">

                <td>Image</td>
                <td>Name</td>
                <td>Quantity</td>
                <td>Unit Price</td>

                <td>Discount</td>
                <td>EnteredDate</td>
                <td>Category</td>
                <td>Brand</td>
                <td></td>
            </tr>
        </thead>
        <tbody> 
            <?php
            
        foreach($getData as $item){
          echo '  <tr  class="text-center">
          <td><img src="../upload/'.((empty($item->image))?"noimage.png" : $item->image).'" alt="" width="50px"></td>
          <td>'.$item->nameProduct.'</td>
          <td>'.$item->quantity.'</td>
          <td>'.number_format($item->unit_price).' VND</td>
          <td>'.$item->discount.'</td>
          <td>'.date("d-m-Y",strtotime($item->entered_date)).'</td>
            <td>'.$item->nameCategory.'</td>
          <td>'.$item->nameBrand.'</td>
        
        <td> 
          <button class="btn btn-info"  ><i class="fa fa-eye"></i></button>
          <button class="btn btn-warning" onclick=\'window.open("?action=editProduct&&id='.$item->productid.'","_self")\' data-toggle="modal" data-target="#updateProduct"><i class="fa fa-edit" aria-hidden="true"></i></button>
          <button class="btn btn-danger" onclick="deleteProduct('.$item->productid.')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </td>
              </td> 
        </tr>';
        }
        ?>

        </tbody>
        <!-- modal create -->
        <script>
        function deleteProduct(id) {
            Swal.fire({
                title: 'Thông Báo Xóa',
                text: "Bạn có muốn xóa Category: " + id + " không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Bạn đã xóa',
                        showConfirmButton: false,
                        timer: 700
                    })
                    $.post('../dao/delete.product.php', {
                        'id': id
                    }, function(data) {
                        setInterval(function() {
                            console.log(data);
                            window.location.replace('?action=product');
                        }, 700);
                    });
                }
            });
        }
        </script>
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="  width: 1200px;
          margin-top: 60px;">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="page-header">Add New Product <button class="btn btn-outline" data-dismiss="modal"
                                aria-label="Close" aria-hidden="true" style="float: right;"><i
                                    class="fa fa-window-close-o"></i></button> </h1>
                    </div>
                    <div class="modal-body">
                        <?php include_once('../pages/product/form.php'); ?>
                    </div>

                </div>
            </div>
        </div>
   
    </table>
</div>
<div class="panel panel-footer text-center">
    <nav aria-label="Page navigation example ">
        <ul class="pagination ">
            <li class="page-item">
                <a class="page-link" href=""><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
            </li>
            <li class="page-item">
                <a class="page-link" href=""><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            </li>
            <li class="page-item"><a class="page-link"></a></li>
            <li class="page-item">
                <a class="page-link" href=""><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </li>
            <li class="page-item">
                <a class="page-link" href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </li>
        </ul>
    </nav>
</div>