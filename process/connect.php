<?php
abstract class connection {
    protected $DB_TYPE;
    protected $DB_HOST;
    protected $DB_NAME;
    protected $USER;
    protected $PW;
    protected $connection;

    public function __construct() {
        $this->DB_TYPE = 'mysql';
        $this->DB_HOST = 'localhost';
        $this->DB_NAME = 'kltn';
        $this->USER = 'root';
        $this->PW = '';
        $this->connection = $this->conn();
    }

    public function conn() {
        try {
            $conn = new PDO("$this->DB_TYPE:host=$this->DB_HOST;dbname=$this->DB_NAME", $this->USER, $this->PW);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        } catch (Exception $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public function prepareSQL($sql) {
        return $this->connection->prepare($sql);
}
}
class Query extends connection {

    // select table information
    public function project() {
        $sql = "SELECT * FROM project
        INNER JOIN customer ON project.Customer_ID = customer.Customer_ID
        INNER JOIN projecttype ON project.PT_ID = projecttype.PT_ID
        ORDER BY Project_ID DESC";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function staff() {
        $sql = "SELECT * FROM user 
        INNER JOIN position ON user.Position_ID = position.Position_ID
        INNER JOIN department ON user.Department_ID = department.Department_ID
        ORDER BY User_ID DESC";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function customer() {
        $sql = "SELECT * FROM customer ORDER BY Customer_ID DESC";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function type() {
        $sql = "SELECT * FROM projecttype ORDER BY PT_ID DESC";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function infProject($data) {
        $sql = "SELECT * FROM task
        INNER JOIN user ON user.User_ID = task.User_ID
        INNER JOIN project ON project.Project_ID = task.Project_ID
        WHERE task.Project_ID = '$data'
        ORDER BY Project_time_start DESC";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function selectProject($data) {
        $sql = "SELECT * FROM project 
        INNER JOIN customer ON project.Customer_ID = customer.Customer_ID
        INNER JOIN projecttype ON project.PT_ID = projecttype.PT_ID
        WHERE Project_ID = '$data'";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function allEntry($data) {
        $sql = "SELECT * 
        FROM import 
        INNER JOIN user ON import.user_ID = user.user_ID
        INNER JOIN product ON import.product_ID = product.product_ID
        INNER JOIN supplier ON import.supplier_ID = supplier.supplier_ID 
        WHERE import.import_ID = '$data'
        GROUP BY import.import_ID ";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function allOutput($data) {
        $sql = "SELECT * 
        FROM export 
        INNER JOIN user ON export.user_ID = user.user_ID
        INNER JOIN product ON export.product_ID = product.product_ID
        INNER JOIN customer ON export.customer_ID = customer.customer_ID 
        WHERE export.export_ID = '$data'
        GROUP BY export.export_ID ";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // insert data
    public function createEntry($data) {
        $sql = "INSERT INTO import (import_ID, import_date, import_price, import_quantity, supplier_ID, product_ID, user_ID) 
        VALUES (:import_ID, :date, :price, :number, :brand, :product, :user)";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }
    
    public function createOutput($data) {
        $sql = "INSERT INTO export (export_ID, export_date, export_price, export_quantity, product_ID, user_ID, customer_ID) 
        VALUES (:outputID, :date, :price, :number, :productID, :employeeID, :customer)";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    public function createProject($data) {
        $sql = "INSERT INTO project (PT_ID, Project_name, Project_status, Customer_ID, Project_time_start, Project_manager, Project_gudget) 
        VALUES (:type, :Project_name, :status, :customer, :date, :manager, :budget)";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    // delete data
    public function deleteProject($data) {
        $sql = "DELETE FROM project 
         WHERE Project_ID = :id";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    public function deleteOutput($data) {
        $sql = "DELETE FROM export 
         WHERE export_ID = :id";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    

    // update data
    public function updateProject($id, $name, $date, $status, $budget, $manager, $customer, $type) {
        $sql = "UPDATE project SET Project_name = '$name', Project_time_start = '$date', Project_status = '$status',
        Project_gudget = '$budget', Project_manager = '$manager', PT_ID = '$type' 
        WHERE project.Project_ID = '$id'";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
    }

    // public function minusProduct($data) {
    //     $sql = "UPDATE product SET product_quantity = (product_quantity - :number) WHERE product_ID = :productID";
    //     $stmt = $this->prepareSQL($sql);
    //     $stmt->execute($data);
    // }

    public function updateOutput($id, $export_ID, $date, $price, $number, $customer, $productID, $employeeID) {
        $sql = "UPDATE export SET export_ID = '$export_ID', export_date = '$date', export_price = '$price',
        export_quantity = '$number', product_ID = '$productID', user_ID = '$employeeID' , customer_ID = '$customer' 
        WHERE export.export_ID = '$id'";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
    }

// useless
    public function all_ad() {
        $sql = "SELECT * 
        FROM product_order 
        INNER JOIN orders ON product_order.orderId = orders.orderId
        INNER JOIN customer ON orders.cusId = customer.cusId
        GROUP BY orders.orderId";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function search() {
        $sql = "SELECT * 
        FROM product_order 
        INNER JOIN orders ON product_order.orderId = orders.orderId
        INNER JOIN customer ON orders.cusId = customer.cusId WHERE orderStatus LIKE '%$search%'";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    

    

    public function updateStatus($data) {
        $sql = "UPDATE orders SET orderStatus = 5 WHERE orderId = :id";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    public function updateConfirmStatus($data) {
        $sql = "UPDATE orders SET orderStatus = 2 WHERE orderId = :id";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    // public function select($data) {
    //     $sql = "SELECT * FROM product INNER JOIN product_order ON product.SKU = product_order.SKU 
    //     INNER JOIN orders ON product_order.orderId = orders.orderId 
    //     INNER JOIN customer ON orders.cusId = customer.cusId
    //     INNER JOIN product_img ON product_img.SKU = product.SKU
    //     INNER JOIN brand ON brand.brandId = product.brandId WHERE orders.orderId  = '$data'";
    //     $stmt = $this->prepareSQL($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }

    public function select_brand($data) {
    $sql = "SELECT * FROM product INNER JOIN product_order ON product.SKU = product_order.SKU 
    INNER JOIN orders ON product_order.orderId = orders.orderId 
    INNER JOIN customer ON orders.cusId = customer.cusId
    -- INNER JOIN product_img ON product_img.SKU = product.SKU
    INNER JOIN brand ON brand.brandId = product.brandId WHERE orders.orderId  = '$data' GROUP BY product.brandId";
    $stmt = $this->prepareSQL($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
}
