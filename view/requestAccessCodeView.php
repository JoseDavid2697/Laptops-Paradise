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
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
            <!-- Sidebar -->
            <div class="list-group" style="margin-bottom: 20px;">
                <a href="?controlador=Items&accion=insertItemView" class="list-group-item list-group-item-success">Insert Product</a>
                <a href="?controlador=Items&accion=updateItemView" class="list-group-item list-group-item-success">Update Product</a>
                <a href="?controlador=Items&accion=requestAccessCodeView" class="list-group-item list-group-item-success">Request Access Code</a>
            </div>
        </div>
        <div class="col-lg-8 col-md-4 col-sm-4">
            <h5 class="card-title">Laptop's Paradise</h5>
            <hr id="hr" />
            <h6 class="card-subtitle mb-2 text-muted">Request your suscription code for ShoppingFast.com</h6>
            <form action="?controlador=Items&accion=insertItem" method="post" enctype="multipart/form-data">
                <div class="error_message" name="error_message" id="error_message">
                    <div class="alert alert-success" role="alert" id="code">
                        Your access code here!
                    </div>
                </div>
                <button type="button" class="btn btn-primary" href="javascript:;" onclick="requestAccessCode();return false;">Request code</button>
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
        color: royalblue !important;
        font-size: 26px !important;
    }

    .list-group a:hover {
        text-decoration: none !important;
        font-size: 20px !important;
        color: darkgreen !important;
    }
</style>

<?php
require_once 'public/footer.php';
?>