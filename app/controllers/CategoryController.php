<?php
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');
require_once 'app/models/ProductModel.php';

class CategoryController
{
  private $categoryModel;
  private $db;

  public function __construct()
  {
    $this->db = (new Database())->getConnection();
    $this->categoryModel = new CategoryModel($this->db);
  }

  // Hiển thị danh sách danh mục
  public function list()
  {
    $categories = $this->categoryModel->getCategories();
    include 'app/views/categories/list.php';
  }

  // Hiển thị chi tiết danh mục
  public function show($id)
  {
    $category = $this->categoryModel->getCategoryById($id);
    if ($category) {
      include 'app/views/categories/show.php';
    } else {
      echo "Không tìm thấy danh mục.";
    }
  }

  // Hiển thị form thêm danh mục
  public function add()
  {
    include 'app/views/categories/add.php';
  }

  // Lưu danh mục mới
  public function save()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = $_POST['name'] ?? '';
      $description = $_POST['description'] ?? '';

      $errors = [];
      if (empty($name)) {
        $errors['name'] = 'Tên danh mục không được để trống.';
      }
      if (empty($description)) {
        $errors['description'] = 'Mô tả không được để trống.';
      }

      if (!empty($errors)) {
        include 'app/views/categories/add.php';
      } else {
        $result = $this->categoryModel->addCategory($name, $description);
        if ($result) {
          header('Location: /ProjectBanHangCuaTu2/Category/list');
        } else {
          echo "Đã xảy ra lỗi khi thêm danh mục.";
        }
      }
    }
  }

  // Hiển thị form chỉnh sửa danh mục
  public function edit($id)
  {
    $category = $this->categoryModel->getCategoryById($id);
    if ($category) {
      include 'app/views/categories/edit.php';
    } else {
      echo "Không tìm thấy danh mục.";
    }
  }

  // Cập nhật danh mục
  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $description = $_POST['description'];

      $errors = [];
      if (empty($name)) {
        $errors['name'] = 'Tên danh mục không được để trống.';
      }
      if (empty($description)) {
        $errors['description'] = 'Mô tả không được để trống.';
      }

      if (!empty($errors)) {
        $category = (object) ['id' => $id, 'name' => $name, 'description' => $description];
        include 'app/views/categories/edit.php';
      } else {
        $result = $this->categoryModel->updateCategory($id, $name, $description);
        if ($result) {
          header('Location: /ProjectBanHangCuaTu2/Category/list');
        } else {
          echo "Đã xảy ra lỗi khi cập nhật danh mục.";
        }
      }
    }
  }

  // Xóa danh mục
  public function delete($id)
  {
    $category = $this->categoryModel->getCategoryById($id);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($this->categoryModel->deleteCategory($id)) {
            header('Location: /ProjectBanHangCuaTu2/Category/list');
            exit;
        } else {
            echo "Đã xảy ra lỗi khi xóa danh mục.";
        }
    } else {
        if ($category) {
            include 'app/views/categories/delete.php';
        } else {
            echo "Không tìm thấy danh mục.";
        }
    }
  }
}
