<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');

class ProductController
{
  private $productModel;
  private $db;

  // Khởi tạo controller, kết nối DB và model
  public function __construct()
  {
    $this->db = (new Database())->getConnection();
    $this->productModel = new ProductModel($this->db);
  }

  // Hiển thị danh sách sản phẩm
  public function index()
  {
    $products = $this->productModel->getProducts();
    include 'app/views/product/list.php';
  }

  // Hiển thị chi tiết một sản phẩm
  public function show($id)
  {
    $product = $this->productModel->getProductById($id);
    if ($product) {
      include 'app/views/product/show.php';
    } else {
      echo "Không thấy sản phẩm.";
    }
  }

  // Hiển thị form thêm sản phẩm mới
  public function add()
  {
    $categories = (new CategoryModel($this->db))->getCategories();
    include_once 'app/views/product/add.php';
  }

  // Xử lý lưu sản phẩm mới
  public function save()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'] ?? '';
      $description = $_POST['description'] ?? '';
      $price = $_POST['price'] ?? '';
      $category_id = $_POST['category_id'] ?? null;
      if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $this->uploadImage($_FILES['image']);
      } else {
        $image = "";
      }
      $result = $this->productModel->addProduct(
        $name,
        $description,
        $price,
        $category_id,
        $image
      );
      if (is_array($result)) {
        // Nếu có lỗi, hiển thị lại form với thông báo lỗi
        $errors = $result;
        $categories = (new CategoryModel($this->db))->getCategories();
        include 'app/views/product/add.php';
      } else {
        header('Location: /ProjectBanHangCuaTu2/Product');
      }
    }
  }

  // Hiển thị form sửa sản phẩm
  public function edit($id)
  {
    $product = $this->productModel->getProductById($id);
    $categories = (new CategoryModel($this->db))->getCategories();
    if ($product) {
      include 'app/views/product/edit.php';
    } else {
      echo "Không thấy sản phẩm.";
    }
  }

  // Xử lý cập nhật sản phẩm
  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $category_id = $_POST['category_id'];
      if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $this->uploadImage($_FILES['image']);
      } else {
        $image = $_POST['existing_image'];
      }
      $edit = $this->productModel->updateProduct(
        $id,
        $name,
        $description,
        $price,
        $category_id,
        $image
      );
      if ($edit) {
        header('Location: /ProjectBanHangCuaTu2/Product');
      } else {
        echo "Đã xảy ra lỗi khi lưu sản phẩm.";
      }
    }
  }

  // Xử lý xóa sản phẩm
  public function delete($id)
  {
    if ($this->productModel->deleteProduct($id)) {
      header('Location: /ProjectBanHangCuaTu2/Product');
    } else {
      echo "Đã xảy ra lỗi khi xóa sản phẩm.";
    }
  }

  // Hàm upload hình ảnh sản phẩm
  private function uploadImage($file)
  {
    $target_dir = "uploads/";
    // Kiểm tra và tạo thư mục nếu chưa tồn tại
    if (!is_dir($target_dir)) {
      mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($file["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Kiểm tra xem file có phải là hình ảnh không
    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
      throw new Exception("File không phải là hình ảnh.");
    }
    // Kiểm tra kích thước file (10 MB = 10 * 1024 * 1024 bytes)
    if ($file["size"] > 10 * 1024 * 1024) {
      throw new Exception("Hình ảnh có kích thước quá lớn.");
    }
    // Chỉ cho phép một số định dạng hình ảnh nhất định
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !=
      "jpeg" && $imageFileType != "gif"
    ) {
      throw new Exception("Chỉ cho phép các định dạng JPG, JPEG, PNG và GIF.");
    }
    // Lưu file
    if (!move_uploaded_file($file["tmp_name"], $target_file)) {
      throw new Exception("Có lỗi xảy ra khi tải lên hình ảnh.");
    }
    return $target_file;
  }

  // Thêm sản phẩm vào giỏ hàng
  public function addToCart($id)
  {
    $product = $this->productModel->getProductById($id);
    if (!$product) {
      echo "Không tìm thấy sản phẩm.";
      return;
    }
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
    }
    if (isset($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id]['quantity']++;
    } else {
      $_SESSION['cart'][$id] = [
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 1,
        'image' => $product->image
      ];
    }
    // Đếm tổng số lượng sản phẩm trong giỏ
    $cart_qty = 0;
    if (!empty($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $item) {
        $cart_qty += $item['quantity'];
      }
    }
    // Nếu là AJAX thì trả về JSON
    if (
      isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
    ) {
      header('Content-Type: application/json');
      echo json_encode(['cart_qty' => $cart_qty]);
      exit;
    }
    // Nếu không phải AJAX thì chuyển hướng như cũ
    header('Location: /ProjectBanHangCuaTu2/Product/');
    exit;
  }

  // Hiển thị giỏ hàng, loại bỏ sản phẩm không còn trong DB
  public function cart()
  {
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    // Kiểm tra và loại bỏ sản phẩm không còn trong bảng product
    if (!empty($cart)) {
      $cart_ids = array_keys($cart);
      $pdo = $this->db;
      $placeholders = implode(',', array_fill(0, count($cart_ids), '?'));
      $stmt = $pdo->prepare("SELECT id FROM product WHERE id IN ($placeholders)");
      $stmt->execute($cart_ids);
      $exist_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
      foreach ($cart_ids as $id) {
        if (!in_array($id, $exist_ids)) {
          unset($_SESSION['cart'][$id]);
          unset($cart[$id]);
        }
      }
    }

    include 'app/views/product/Cart.php';
  }

  // Xử lý cập nhật số lượng/xóa sản phẩm trong giỏ hàng (submit form)
  public function updateCart()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      if (isset($_POST['remove'])) {
        unset($_SESSION['cart'][$id]);
      } else {
        $qty = max(1, intval($_POST['quantity']));
        if (isset($_SESSION['cart'][$id])) {
          $_SESSION['cart'][$id]['quantity'] = $qty;
        }
      }
    }
    header('Location: /ProjectBanHangCuaTu2/Product/cart');
    exit;
  }

  // Xử lý cập nhật số lượng/xóa sản phẩm trong giỏ hàng (AJAX)
  public function updateCartAjax()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      if (isset($_POST['remove'])) {
        unset($_SESSION['cart'][$id]);
      } else {
        $qty = max(1, intval($_POST['quantity']));
        if (isset($_SESSION['cart'][$id])) {
          $_SESSION['cart'][$id]['quantity'] = $qty;
        }
      }
      // Tính lại tổng tiền và thành tiền từng sản phẩm
      $item_total = isset($_SESSION['cart'][$id]) ? number_format($_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['quantity'], 0, ',', '.') : '0';
      $cart_total = 0;
      $cart_qty = 0;
      if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
          $cart_total += $item['price'] * $item['quantity'];
          $cart_qty += $item['quantity'];
        }
      }
      header('Content-Type: application/json');
      echo json_encode([
        'item_total' => $item_total,
        'cart_total' => number_format($cart_total, 0, ',', '.'),
        'cart_qty' => $cart_qty
      ]);
      exit;
    }
  }

  // Hiển thị trang thanh toán
  public function checkout()
  {
    include 'app/views/product/checkout.php';
  }

  // Xử lý đặt hàng
  public function processCheckout()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      // Kiểm tra giỏ hàng
      if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "Giỏ hàng trống.";
        return;
      }
      // Bắt đầu giao dịch
      $this->db->beginTransaction();
      try {
        // Lưu thông tin đơn hàng vào bảng orders
        $query = "INSERT INTO orders (name, phone, address) VALUES (:name, :phone, :address)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->execute();
        $order_id = $this->db->lastInsertId();
        // Lưu chi tiết đơn hàng vào bảng order_details
        $cart = $_SESSION['cart'];
        foreach ($cart as $product_id => $item) {
          $query = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':order_id', $order_id);
          $stmt->bindParam(':product_id', $product_id);
          $stmt->bindParam(':quantity', $item['quantity']);
          $stmt->bindParam(':price', $item['price']);
          $stmt->execute();
        }
        // Xóa giỏ hàng sau khi đặt hàng thành công
        unset($_SESSION['cart']);
        // Commit giao dịch
        $this->db->commit();
        // Chuyển hướng đến trang xác nhận đơn hàng
        header('Location: /ProjectBanHangCuaTu2/Product/orderConfirmation');
      } catch (Exception $e) {
        // Rollback giao dịch nếu có lỗi
        $this->db->rollBack();
        echo "Đã xảy ra lỗi khi xử lý đơn hàng: " . $e->getMessage();
      }
    }
  }

  // Hiển thị trang xác nhận đơn hàng
  public function orderConfirmation()
  {
    include 'app/views/product/orderConfirmation.php';
  }
}
