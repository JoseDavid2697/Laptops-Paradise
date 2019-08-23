<?php
require_once 'public/headeradmin.php';
?>
<br>
<br>
<br>

<div class="container-fluid">
    <h1 style="font-size:30px;color:royalblue">Administrative Module</h1>
    <p>Here you can see the options to handle the products</p>
    <hr />
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="list-group list-group-horizontal">
                <a href="?controlador=Items&accion=insertItemView" class="list-group-item list-group-item-primary">Insert Product</a>
            </div>
        </div>
        <div class="col-6">
            <div class="list-group list-group-horizontal">
                <a href="?controlador=Items&accion=updateItemView" class="list-group-item list-group-item-primary">Update Product</a>
            </div>
        </div>
    </div>
    <br><br><br>
    <div class="row">
        <div class="col-lg-8 col-md-4 col-sm-4">
            <h5 class="card-title">Laptop's Paradise</h5>
            <hr id="hr" />
            <h6 class="card-subtitle mb-2 text-muted">Insert Product</h6>
            <form action="?controlador=Items&accion=insertItem" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <select class="form-control" id="category" name="category">
                        <option value="" disabled selected>Category</option>
                        <option value="laptop">Laptop</option>
                    </select>
                </div>
                <div class="error_message" name="error_message" id="error_message">
                        <span id="insert_result"></span>
                </div>
                <button type="submit" class="btn btn-primary">Insert</button>
            </form>
            <br />
            <br />
        </div>

    </div>

</div>
<br>
<br>
<br>
<hr />
<style>
    h5 {
        text-decoration: underline !important;
        color: royalblue !important;
    }
</style>

<?php
require_once 'public/footer.php';
?>