<style>
.check {
    color: red;
}
</style>

<form method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="panel panel-collapse">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="../upload/noimage.png"
                            style="display: block; max-width: 350px; max-height: 285px; width: 350px; height: 285px; border: 1px;"
                            alt="" id="imageProduct">
                        <br>
                        <div class="form-group col-sm-9">
                            <input type="file" class="hidden" onchange="chooseFile(this)" id="photo" name="imageFile">
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
                                <input type="text" name="nameProduct" minlength="4" class="form-control"
                                    placeholder="Name" aria-describedby="helpId">
                                
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="">EnteredDate</label>
                                <input type="date" name="entered_date" class="form-control" placeholder=""
                                    aria-describedby="helpId">

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="">Quantity</label>
                                <input type="number" name="quantity" min="1" class="form-control" placeholder="Quantity"
                                    aria-describedby="helpId">
                                
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="">UnitPrice</label>
                                <input type="text" name="unitPrice" minlength="4" class="form-control"
                                    aria-current="step" placeholder="UnitPrice" aria-describedby="helpId">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="">Description</label>
                                <input type="text" name="description" class="form-control" placeholder="Description"
                                    aria-describedby="helpId">

                            </div>

                            <div class="form-group col-sm-6">
                                <label for="">Discount</label>
                                <input type="number" name="discount" min="0" max="100" class="form-control"
                                    placeholder="Discount" aria-describedby="helpId">

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="form-group col-sm-6">
                     
                                <label for="">Category</label>
                                <select id="my-select" name="categoryItem" class="form-control">
                                    <option value="" class="text-center">Select Categoty</option>
                                    <?php
                           $categorySelect =  $db->table('categories')->get();
                           foreach($categorySelect as $item){
                               echo '<option value="'.$item->id.'" class="text-center">'.$item->name.'</option>';
                           }
                        ?>
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="">Brand</label>
                                <select id="my-select" name="brandItem" class="form-control">
                                    <option value=""  class="text-center">Select Brands</option>
                                    <?php
                           $brandSelect =  $db->table('brand')->get();
                           foreach($brandSelect as $item){
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
                <button class="btn btn-primary" name="createProduct">Save</button>
                <button class="btn btn-info ">Reset</button>
                <a class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</a></span>
              </div>
</form>