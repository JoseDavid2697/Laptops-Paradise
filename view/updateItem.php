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
    <br><br><br>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
            <!-- Sidebar -->
            <div class="list-group" style="margin-bottom: 20px;">
                <a href="?controlador=Items&accion=insertItemView" class="list-group-item list-group-item-action">Insert Product</a>
                <a href="?controlador=Items&accion=updateItemView" class="list-group-item list-group-item-action">Update Product</a>
                <a href="?controlador=Items&accion=" class="list-group-item list-group-item-action">Request Access Code</a>
            </div>
        </div>
        <div class="col-lg-8 col-md-4 col-sm-4">
            <h6 class="card-subtitle mb-2 text-muted">Update Product</h6>
            <div class="table-responsive">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price($)</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($_SESSION['items_list'] as $row) { ?>
                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["item_name"] ?></td>
                            <td><?php echo $row["price"] ?></td>
                            <td><?php echo $row["description"] ?></td>
                            <td> <img src="public/img/<?php echo $row["image"] ?>" alt="" style="width: 100px;height: 100px;"></td>
                            <td><?php echo $row["categorie"] ?></td>
                            <td><a class="btn btn-danger" href="">Delete</a></td>
                            <td><a class="btn btn-success" href="">Update</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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