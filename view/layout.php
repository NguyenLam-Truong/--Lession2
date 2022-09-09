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
                <h1 class="h5 py-2 border-bottom text-danger"><?php if (isset($path_title)) {
                                                                    echo $path_title;
                                                                } ?></h1>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">TÊN LOẠI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($data_list)==true) {
                                foreach ($data_list as $row) {     
                        ?>
                            <tr>
                                <th scope="row"><?=$row['idmaloai']?></th>
                                <td><?=$row['tenLoai']?></td>
                            </tr>
                        <?php 
                             }
                          }                        
                        ?>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php if($backPage >=1) { ?>
                            <li class="page-item">
                                <a  href="?act=maloai&pageNum=<?php echo $backPage ?>" class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php }?>

                        <?php for($i= $from ; $i <= $to ; $i++) { ?>
                            <li class="page-item"><a href="?act=maloai&pageNum=<?php echo $i?>" class="page-link"><?php echo $i?></a></li>
                        <?php }?>

                        <!-- nếu như tổng số trang lớn hơn -->
                        <?php if($nextPage < $totalSize) {?>
                        <li class="page-item">
                            <a href="?act=maloai&pageNum=<?php echo $nextPage ?>" aria-label="Next" class="page-link">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </nav>
            </main>
        </div>
        <footer class="bg-dark mt-1 mb-2 text-warning text-center">NGUYỄN LAM TRƯỜNG</footer>
    </div>
</body>

</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> </script>