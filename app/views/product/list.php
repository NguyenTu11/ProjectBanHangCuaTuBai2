<?php include 'app/views/shares/header.php'; ?>
<style>
  .product-card {
    transition: transform 0.3s cubic-bezier(.25, .8, .25, 1), box-shadow 0.3s;
    border-radius: 20px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.12), 0 1.5px 4px rgba(0, 0, 0, 0.08);
    background: linear-gradient(135deg, #f8fafc 60%, #e0e7ff 100%);
    margin-bottom: 24px;
    perspective: 800px;
  }

  .product-card:hover {
    transform: scale(1.03) rotateY(4deg);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18), 0 3px 8px rgba(0, 0, 0, 0.12);
  }

  .product-image {
    max-width: 120px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    transition: transform 0.4s cubic-bezier(.25, .8, .25, 1);
  }

  .product-card:hover .product-image {
    transform: scale(1.08) rotateZ(-2deg);
  }

  .product-title {
    font-weight: bold;
    font-size: 1.4rem;
    color: #2d3748;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .product-price {
    color: #e53e3e;
    font-size: 1.2rem;
    font-weight: 600;
    animation: pricePulse 1.5s infinite alternate;
  }

  @keyframes pricePulse {
    0% {
      text-shadow: 0 0 0 #e53e3e;
    }

    100% {
      text-shadow: 0 0 12px #e53e3e88;
    }
  }

  .btn-3d {
    box-shadow: 0 4px 0 #bdbdbd;
    transition: transform 0.1s, box-shadow 0.1s;
    border-radius: 8px;
  }

  .btn-3d:active {
    transform: translateY(2px);
    box-shadow: 0 2px 0 #bdbdbd;
  }

  .category-badge {
    background: linear-gradient(90deg, #6366f1 60%, #38bdf8 100%);
    color: #fff;
    border-radius: 8px;
    padding: 2px 12px;
    font-size: 0.95rem;
    box-shadow: 0 1px 4px #6366f133;
  }
</style>
<h1 class="mb-4 text-center"><i class="fas fa-boxes"></i> Danh sách sản phẩm</h1>
<div class="text-right mb-3">
  <a href="/ProjectBanHangCuaTu2/Product/add" class="btn btn-success btn-3d">
    <i class="fas fa-plus-circle"></i> Thêm sản phẩm mới
  </a>
</div>
<div class="row">
  <?php foreach ($products as $product): ?>
    <div class="col-md-6 col-lg-4">
      <div class="product-card p-4 mb-3">
        <div class="d-flex align-items-center mb-3">
          <?php if ($product->image): ?>
            <img src="/ProjectBanHangCuaTu2/<?php echo $product->image; ?>" alt="Product Image" class="product-image mr-3 shadow">
          <?php else: ?>
            <img src="/ProjectBanHangCuaTu2/images/no-image.png" alt="No Image" class="product-image mr-3 shadow">
          <?php endif; ?>
          <div>
            <div class="product-title">
              <i class="fas fa-cube"></i>
              <a href="/ProjectBanHangCuaTu2/Product/show/<?php echo $product->id; ?>" class="text-decoration-none text-dark">
                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
              </a>
            </div>
            <div class="category-badge mt-2">
              <i class="fas fa-tags"></i>
              <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
            </div>
          </div>
        </div>
        <p class="mb-2"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
        <div class="product-price mb-3">
          <i class="fas fa-money-bill-wave"></i>
          <?php echo number_format($product->price, 0, ',', '.'); ?> VND
        </div>
        <div class="d-flex gap-2">
          <a href="/ProjectBanHangCuaTu2/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning btn-3d mr-2">
            <i class="fas fa-edit"></i> Sửa
          </a>
          <a href="/ProjectBanHangCuaTu2/Product/delete/<?php echo $product->id; ?>"
            class="btn btn-danger btn-3d"
            onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
            <i class="fas fa-trash-alt"></i> Xóa
          </a>
          <a href="javascript:void(0);"
            class="btn btn-primary btn-3d ml-2 btn-add-to-cart"
            data-id="<?php echo $product->id; ?>">
            <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
          </a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<script>
  document.querySelectorAll('.btn-add-to-cart').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var productId = this.getAttribute('data-id');
      fetch('/ProjectBanHangCuaTu2/Product/addToCart/' + productId, {
          method: 'GET',
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          },
          credentials: 'same-origin'
        })
        .then(response => response.json())
        .then(data => {
          alert('Đã thêm vào giỏ hàng!');
          // Cập nhật số lượng trên icon giỏ hàng ở header
          if (data.cart_qty !== undefined && document.getElementById('cart-badge')) {
            document.getElementById('cart-badge').textContent = data.cart_qty;
          }
        });
    });
  });
</script>
<?php include 'app/views/shares/footer.php'; ?>