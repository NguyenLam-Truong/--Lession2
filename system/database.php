<?php
require_once ('config.php');

class database {
    protected $servername = servername;
    protected $username = username;
    protected $password = password;
    protected $dbname = dbname;

    public $conn; // biến conn kết nối database 

    public function connect_data() {
        $opt = array(
           PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $this->conn = new PDO(
          'mysql:host='.$this->servername.';dbname='.$this->dbname,
          $this->username , $this->password , $opt          
        );
    }
    public function query($sql){ 
      $result = $this->conn->query($sql);
      return $result;
    }
    public function queryOne($sql){
      $data = $this->conn->query($sql);
      $result = $data->fetch();
      return $result;
    }
    public function queryOne_assoc($sql){
        $data = $this->conn->query($sql);
        $result = $data->fetchAll();
        return $result;
    }
    // thêm , xóa , sửa dữ liệu database
    public function excute($sql){
        $result = $this->conn->exec($sql);
        return $result;
    }
}
