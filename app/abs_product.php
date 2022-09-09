<?php
// lớp trừu tưởng quản lí thêm xóa sửa của sản phẩm
abstract class acproduct {
    public $db_admin; // thuộc tính khởi tạo đối tượng
    abstract public function add(); // lớp abstract thêm 
    abstract public function edit(); // lớp abstract sửa
    abstract public function update();// lớp abstract cập nhật
    abstract public function delete();// lớp abstract xóa
    abstract public function detail();// lớp abstract chi tiết
    abstract public function insert();// lớp abstract chèn
    abstract public function search();// lớp abstract tìm kiếm
}
?>