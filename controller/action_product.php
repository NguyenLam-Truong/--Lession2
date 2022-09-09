<?php
session_start();
?>
<?php 
require_once ('../model/product_model.php');
require_once ('../app/abs_product.php');
// kế thừa lớp trừu tượng
class action_product extends acproduct {
     public $db_admin;
     
     public function __construct()
     {
        $this->db_admin = new product;
        $act = "add";
        if(isset($_GET['act'])==true){
          $act = $_GET['act'];
        }
        switch($act) {
          case "add":
             $this->add();
             break;
         case "detail":
            $this->detail();
            break;
         case "insert":
            $this->insert();
            break;
         case 'delete':
            $this->delete();
            break;
         case 'search':
            $this->search();
            break;
         case 'edit':
            $this->edit();
            break;
         case 'update':
            $this->update();
            break;
        }
     }


     public function add(){ // thêm sản phẩm
        $path_title = "THÊM SẢN PHẨM";
        $data = $this->db_admin->get_product();
        require_once ('../view/add_product.php');
     }
     public function edit(){
      $path_title = "EDIT SẢN PHẨM";
      if(isset($_GET['id'])==true) {
         $id = $_GET['id']; // lấy id 
         $data = $this->db_admin->getDataById($id); // gọi hàm lấy sản phẩm theo id
         $data_maloai = $this->db_admin->getDataMaLoai();
         /// lập lấy session của sản phẩm
         if(!empty($data)) {
            foreach ($data as $row ){
               $_SESSION['id'] = $row['idsanpham'];
               $_SESSION['name'] = $row['tensanpham'];
               $_SESSION['img'] = $row['hinhanh'];
               $_SESSION['idmaloai'] = $row['id_maloai'];
            }
         }
      }
      require_once ('../view/edit.php');
     } // edit sản phẩm 

     public function update(){
        if(isset($_POST['submit'])==true) {
          $masanpham = $_SESSION['id'];
          $tensanpham = $_POST['name'];
          $file = $_FILES['file']['name'];
          $idmaloai = $_POST['id'];
          // dường dẫn upload ảnh
          $target_dir = '../public/img/'; // dường dẫn upload file
          $target_file = $target_dir.basename($file);
          if(empty($maloaisp) && empty($tensanpham) && empty($file) && empty($idmaloai)) {
            // nếu người dùng không nhập gì cả thì sẽ thấy lại các giá trị cũ bằng session 
            $tensanpham = $_SESSION['name'];
            $file = $_SESSION['img'];
            $idmaloai = $_SESSION['idmaloai'];
            // update sản phẩm 
            $this->db_admin->update_product($masanpham,$tensanpham,$file,$idmaloai);
          }
          else {
             $this->db_admin->update_product($masanpham,$tensanpham,$file,$idmaloai);
             move_uploaded_file($_FILES["file"]["tmp_name"],$target_file);
             header('Location: product_admin.php');
          }
        }
     } // cập nhật

     public function delete(){ // delete sản phẩm
         if(isset($_GET['id'])==true) {
            $id = $_GET['id'];
            $this->db_admin->delele_product($id);
            header('Location: product_admin.php');
         }
     }
     public function detail(){ // chi tiết sản phẩm
         if(isset($_GET['id'])==true) {
            $idsanpham = $_GET['id']; // tiếp nhận biến id truyền vào 
            $data = $this->db_admin->getDataById($idsanpham);
            $path_title = "CHI TIẾT SẢN PHẨM";
            require_once ('../view/product_detail.php');
         }
     }

     public function insert(){ // hàm nhận chèn dữ liệu 
       if(isset($_POST['submit'])==true) { // nếu nút submit dc ấn
         // nhận dữ liệu
         $masp = $_POST['masp']; // mã sản phẩm
         $namesp = $_POST['namsp']; // tên sản phẩm 
         $maloaisp =$_POST['maloai']; // mã loại
         $target_dir = '../public/img/'; // dường dẫn upload file
         $file = $_FILES['filesp']['name']; // lấy tên file
         $target_file = $target_dir.basename($file); // nối file
         if(!empty($masp)=="" && !empty($namesp)=="") {
            die('chương trình bị dừng ở đây do không nhập tên sản phẩm và mã sản phẩm !');
         }
         else {
            $this->db_admin->insert_product($masp,$namesp,$maloaisp,$file);
            move_uploaded_file($_FILES["filesp"]["tmp_name"],$target_file);
            echo "<script>alert('Thêm thành công !')</script>";
         }
         header('Location: product_admin.php');
       }
     
     }
     public function search(){
        $path_title = "TÌM KIẾM SẢN PHẨM!";
        if(isset($_POST['search'])==true) {
          $name = $_POST['name'];
          $data_search = $this->db_admin->search_data($name);
          require_once ('../view/search.php');
        }
     }
}
$controller = new action_product;
?>