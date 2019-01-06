<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fa fa-check"></i> Alert!</h5>Logout Sukses
                </div>
                <?php 
                    session_destroy();
                    echo"<meta http-equiv='refresh' content='1;
                        url=login.php'>";
                ?>
            </div>
        </div>
    </div>
</div>