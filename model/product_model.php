<?php
require_once ('../system/database.php');
class product extends database {
    public function __construct()
    {
        parent::connect_data();
    }
   public function pagi_product($pageNum,$pageSize) { // truy vấn bảng sản phẩm dùng inner join bảng loai_san_pham
      $sql = "SELECT idsanpham , tensanpham , hinhanh , id_maloai , tenLoai
      FROM sanpham 
      INNER JOIN loai_san_pham ON sanpham.id_maloai = loai_san_pham.idmaloai LIMIT $pageNum,$pageSize";
      $result = $this->query($sql)->fetchALl();
      return $result;
   }
   public function getDataMaLoai(){
      $sql = "SELECT idsanpham , tensanpham , hinhanh , id_maloai , tenLoai
      FROM sanpham 
      INNER JOIN loai_san_pham ON sanpham.id_maloai = loai_san_pham.idmaloai";
      $result = $this->query($sql)->fetchALl();
      return $result;
   }
   public function update_product($masanpham,$tensanpham,$file,$idmaloai){ // hàm cập nhật lại sản phẩm
      $sql = "UPDATE `sanpham` SET tensanpham= '$tensanpham' , hinhanh = '$file',id_maloai='$idmaloai' WHERE idsanpham = '$masanpham'";
      $result = $this->excute($sql);
      return $result;
   }
   public function count_record() { // đếm số sản phẩm để phân trang
      $sql = "SELECT COUNT(*) FROM sanpham";
      $result= $this->queryOne($sql);
      return $result;
   }
   public function getDataById($idsanpham) { // lấy sản phẩm theo id làm product detail
      $sql = "SELECT * FROM sanpham WHERE idsanpham = $idsanpham";
      $result = $this->query($sql);
      return $result;
   }
   public function get_product() { // hàm lấy mã loại sản phẩm
      $sql = "SELECT * FROM loai_san_pham";
      $result = $this->query($sql);
      return $result;
   }
   public function insert_product($masp,$namesp,$maloaisp,$file) { // hàm chèn dữ liệu
      var_dump($maloaisp);
     $sql = "INSERT INTO `sanpham` (`idsanpham`, `tensanpham`, `hinhanh`,`id_maloai`) VALUES ('$masp','$namesp','$file','$maloaisp');";
     $result = $this->excute($sql);
     return $result;
   }
   public function delele_product($id) { // xóa 1 record trong bảng
      $sql = "DELETE FROM sanpham WHERE idsanpham = $id";
      $result = $this->excute($sql);
      return $result;
   }
   public function search_data($name) { // tìm sản phẩm
      $sql = "SELECT * FROM `sanpham` WHERE `tensanpham` LIKE '%$name%'";
      $result = $this->query($sql);
      return $result;
   }
}
?>