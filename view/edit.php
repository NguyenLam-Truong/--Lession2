<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../public/style.css">

<body>
    <div class="container-fluid">
        <header class="bg-info text-center">
            <p>CÔNG TY LAMPART</p>
        </header>
        <div class="row noidung">
            <aside class="col-3 bg-light">
                <?php require_once('../public/sidebar.php'); ?>
            </aside>
            <main class="col-9 bg-white mx-n2">
                <h1 class="h5 py-2 border-bottom text-danger">
                    <?php if (isset($path_title)) {
                        echo $path_title;
                    } ?>
                </h1>
                <div class="col-6">
                    <form method="POST" action="action_product.php?act=update" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">TÊN SẢN PHẨM</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp2" class="form-text text-title-name">
                                <span class="text-title-name">TÊN SẢN PHẨM : <?php if(isset($_SESSION['name'])==true){echo $_SESSION['name'];} ?></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">HÌNH ẢNH</label>
                            <input type="file" name="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp3" class="form-text text-title-name">
                                <span class="text-title-name">HÌNH ẢNH CŨ : <?php if(isset($_SESSION['img'])==true){echo $_SESSION['img'];} ?></span>
                            </div>
                        </div>
                        <select class="form-select" name="id" aria-label="Default select example">
                            <option selected><?php if(isset($_SESSION['idmaloai'])==true){echo $_SESSION['idmaloai'];} ?></option>
                            <?php foreach ($data_maloai as $row) { ?>
                               <option value="<?=$row['id_maloai']?>"><?=$row['id_maloai']?> - <?=$row['tenLoai']?></option>
                            <?php }?>
                        </select>

                        <button type="submit" name="submit" class="btn btn-primary mt-3">CẬP NHẬT</button>
                    </form>
                </div>

            </main>
        </div>
        <footer class="bg-dark mt-1 mb-2 text-warning text-center">NGUYỄN LAM TRƯỜNG</footer>
    </div>
</body>

</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> </script>