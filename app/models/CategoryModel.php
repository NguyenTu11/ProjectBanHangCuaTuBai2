<?php
require_once 'app/models/ProductModel.php';
require_once 'app/models/CategoryModel.php';

class CategoryModel
{
  private $conn;
  private $table_name = "category";

  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Lấy danh sách tất cả danh mục
  public function getCategories()
  {
    $query = "SELECT id, name, description FROM " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }

  // Lấy thông tin chi tiết một danh mục theo ID
  public function getCategoryById($id)
  {
    $query = "SELECT * FROM category WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  // Thêm danh mục mới
  public function addCategory($name, $description)
  {
    $query = "INSERT INTO " . $this->table_name . " (name, description) VALUES (:name, :description)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    return $stmt->execute();
  }

  // Cập nhật danh mục
  public function updateCategory($id, $name, $description)
  {
    $query = "UPDATE " . $this->table_name . " SET name = :name, description = :description WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    return $stmt->execute();
  }

  // Xóa danh mục
  public function deleteCategory($id)
  {
    $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
  }

  public static function countAll()
  {
    $db = static::getDB();
    $stmt = $db->query("SELECT COUNT(*) FROM category");
    return $stmt->fetchColumn();
  }

  public static function getDB()
  {
    require_once __DIR__ . '/../config/database.php';
    $database = new Database();
    return $database->getConnection();
  }
}
