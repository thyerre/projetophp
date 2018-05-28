<!DOCTYPE html>
<html lang="pt-br">
<?php require_once('import/css/css.php'); ?>
<body >
    <?php require_once('layout/menuLeft.php'); ?>
    <?php require_once('layout/menuTop.php'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php require_once('controlador.php'); ?>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('layout/footer.php'); ?>

</body>
<?php require_once('import/js/js.php'); ?>
</html>