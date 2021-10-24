<style>
.check {
    color: red;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">New Add Category</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div>
        <?php

    
      $name='';
      $check='';


      $getData = $db->table('categories')->get();

      if(isset($_POST['nameCategory'])){
        $name = $_POST['nameCategory'];
       
        if(strlen($_POST['nameCategory']) >=3){  
          if(isset($_POST['createCategory'])){

            $db->table('categories')
               ->insert([
                  'id'=>0,
                  'name'=>$name
               ]);
               
            SuccessMessage('Thêm Thành Công');
            $getData = $db->table('categories')->get();
            // Redirects("../pages/?action=category");

          }    
        }
        
        else{
         ErrorMessage("Vui Lòng nhập chuỗi dài hơn 3 kí tự");
        }
  
      }
      ?>


        <form method="POST" action="#" enctype="multipart/form-data">
            <div class="card " style="margin: 20px;">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col" style="margin-top: 70px;">
                            <div class="form-group">
                                <input type="text" class="form-control hidden" aria-describedby="helpId"
                                    placeholder="ID" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label> <input type="text" class="form-control" 
                                    name="nameCategory" aria-describedby="helpId" placeholder="Name">
                                <span ng-show="formcate.txtname.$invalid" id="helpId"
                                    class="check"><?php echo $check; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button class="btn btn-success" name="createCategory">Create</button>
                    <button class="btn btn-primary">Reset</button>
                </div>
            </div>
        </form>
        <table class="table table-responsive-lg ">

            <tr class="text-center"
                style="background-color: rgb(104, 104, 104);height: 40px; color: white;font-weight: bolder; text-align: center;">
                <td></td>
                <td></td>
                <td></td>
                <td>CategoryId</td>
                <td>FullName</td>
                <td></td>
            </tr>
            <?php
           
                foreach($getData as $item){
                  echo '<tr class="text-center">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>'.$item->id.'</td>
                  <td>'.$item->name.'</td>
                 
                  <td>
                
                      <button class="btn btn-info"><i class="fa fa-eye"></i></button>
                      <button class="btn btn-warning" onclick=\'window.open("?action=editcate&&id='.$item->id.'","_self")\'><i class="fa fa-edit" aria-hidden="true"></i></button>
                      <button class="btn btn-danger"   onclick="deleteCategory('.$item->id.')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  </td>
              </tr>';
                }
                ?>

        </table>
        <script type="text/javascript">
        function deleteCategory(id) {
           
            Swal.fire({
                title: 'Thông Báo Xóa',
                text: "Bạn có muốn xóa Category: "+id+" không?",
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
                  
                    $.post('../dao/delete.category.php', {
                            'id': id
                        },
                        function(data) {
                          setInterval(function(){
                            console.log(data);
                            window.location.replace('?action=category');
                          },700);
                          
                        });
                }
            });
        }
 
        </script>

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
</div>