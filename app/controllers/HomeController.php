<?php
class HomeController
{
  public function index()
  {
    // Controller ví dụ
    $totalProducts = ProductModel::countAll();
    $totalCategories = CategoryModel::countAll();
    $totalAmount = ProductModel::sumAllPrice(); // hoặc tổng giá trị tồn kho

    require 'app/views/home/home.php';
  }
}
