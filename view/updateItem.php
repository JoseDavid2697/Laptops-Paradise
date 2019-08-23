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
        <div class="container">
            <h6 class="card-subtitle mb-2 text-muted">Update Product</h6>
            <div class="table-responsive">
                <table id="myTable" class="table table-hover">
                    <caption>Item List</caption>
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
                            <td><a class="btn btn-primary" href="">Delete</a></td>
                            <td><a class="btn btn-primary" href="">Update</a></td>
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