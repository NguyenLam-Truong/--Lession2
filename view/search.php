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
                <?php require_once ('../public/sidebar.php'); ?>
            </aside>
            <main class="col-9 bg-white mx-n2">
                <h1 class="h5 py-2 border-bottom text-danger">
                    <?php if (isset($path_title)) {
                        echo $path_title;
                    } ?>
                     <form method="POST" action="action_product.php?act=search">
                        <div class="mb-2">
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" name="search" class="btn btn-primary">TÌM SẢN PHẨM</button>
                    </form>
                </h1>
                    <div class="row">
                        <?php if(isset($data_search)==true) {// kiểm tra biến data tồn tại hay không {
                            foreach ($data_search as $row) { ?> 
                            <!-- lập qua từng phnaaf tử  -->
                                <div class="col-3" >
                                    <img src="../public/img/<?=$row['hinhanh']?>" alt="" width="100%" height="250px">
                                    <div class="title p-2">
                                        <span><?=$row['tensanpham']?></span> <br>
                                        <span>Giá : <?=$row['gia']?> vnđ</span>
                                    </div>
                                </div>
                        <?php }} ?>
                    </div>
            </main>
        </div>
        <footer class="bg-dark mt-1 mb-2 text-warning text-center">NGUYỄN LAM TRƯỜNG</footer>
    </div>
</body>

</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> </script>