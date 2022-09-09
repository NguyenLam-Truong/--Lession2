<?php
// tạo class cho ctrl 
require_once ('../model/product_model.php');
class home {
    protected $db_admin; // biến nhận giá trị của database admin
    public function  __construct() 
    {
       // tạo đối tượng 
       $this->db_admin = new product();
       $act = "product";
       if(isset($_GET['act'])==true){
         $act = $_GET['act'];
       }
       switch($act) {
         case "product":
            $this->product_list();
            break;
       }
    }
    public function product_list() {
          
          $path_title = "DANH SÁCH SẢN PHẨM";
          $pageSize = 10; // số record trên 1 trang 
          $pageNum = 1; // vị trí của trang đầu tiên
          $startRow = 0; // vị trí bắt đầu lấy
          if(isset($_GET['pageNum'])==true) {
            $pageNum = $_GET['pageNum'];
          }
          // limit pagi
          $count_data = $this->db_admin->count_record(); // đếm số record trong loại
          $totalRecord = $count_data[0];// lấy phần tử đầu tiên
          $totalSize = ceil($totalRecord/$pageSize); // đưa về số trên
          $from = $pageNum-2; // quy định số link là 2
          if($from < 1) {
            $from = 1; // nếu như link phân trang nhỏ hơn 1 tức là bằng ko thì cho nó quay về trang đầu tiên
          }
          $to = $pageNum+2; // quy định 2 trang kế tiếp
          if($to > $totalSize) {
            $to = $totalSize;
          }
          $startRow = ($pageNum - 1) * $pageSize; // thuật toán phân trang
          // -------------------- //
          $nextPage = $pageNum + 1; // tiến tới 1 trang
          $backPage = $pageNum - 1; // lùi 1 trang
          
          // sét dữ liệu 
          $data_list = $this->db_admin->pagi_product($startRow,$pageSize); // hàm lấy dữ liệu
          require_once ('../view/product.php');
    }
}
$controller = new home();
?>