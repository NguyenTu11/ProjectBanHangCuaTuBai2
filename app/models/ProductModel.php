<?php
require_once 'app/models/ProductModel.php';
require_once 'app/models/CategoryModel.php';

class ProductModel
{
  private $conn;
  private $table_name = "product";
  public function __construct($db)
  {
    $this->conn = $db;
  }
  public function getProducts()
  {
    $query = "SELECT p.*, c.name as category_name FROM product p
              LEFT JOIN category c ON p.category_id = c.id";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
  public function getProductById($id)
  {
    $query = "SELECT p.*, c.name as category_name
FROM " . $this->table_name . " p
LEFT JOIN category c ON p.category_id = c.id
WHERE p.id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
  }
  public function addProduct($name, $description, $price, $category_id, $image, $stock)
  {
    $errors = [];
    if (empty($name)) {
      $errors['name'] = 'Tên sản phẩm không được để trống';
    }
    if (empty($description)) {
      $errors['description'] = 'Mô tả không được để trống';
    }
    if (!is_numeric($price) || $price < 0) {
      $errors['price'] = 'Giá sản phẩm không hợp lệ';
    }
    if (count($errors) > 0) {
      return $errors;
    }
    $query = "INSERT INTO " . $this->table_name . " (name, description, price, category_id, image, stock) VALUES (:name, :description, :price, :category_id, :image, :stock)";
    $stmt = $this->conn->prepare($query);
    $name = htmlspecialchars(strip_tags($name));
    $description = htmlspecialchars(strip_tags($description));
    $price = htmlspecialchars(strip_tags($price));
    $category_id = htmlspecialchars(strip_tags($category_id));
    $image = htmlspecialchars(strip_tags($image));
    $stock = htmlspecialchars(strip_tags($stock));
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
    if ($stmt->execute()) {
      return true;
    }
    return false;
  }
  public function updateProduct(
    $id,
    $name,
    $description,
    $price,
    $category_id,
    $image,
    $stock
  ) {
    $query = "UPDATE " . $this->table_name . " 
              SET name = :name, description = :description, price = :price, category_id = :category_id, image = :image, stock = :stock
              WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }
  public function deleteProduct($id)
  {
    $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
      return true;
    }
    return false;
  }
  public static function countAll()
  {
    // Ví dụ với PDO
    $db = static::getDB();
    $stmt = $db->query("SELECT COUNT(*) FROM product");
    return $stmt->fetchColumn();
  }
  public static function sumAllPrice()
  {
    $db = static::getDB();
    $stmt = $db->query("SELECT SUM(price * stock) FROM product");
    return $stmt->fetchColumn();
  }
  public static function getDB()
  {
    require_once __DIR__ . '/../config/database.php';
    $database = new Database();
    return $database->getConnection();
  }
}
