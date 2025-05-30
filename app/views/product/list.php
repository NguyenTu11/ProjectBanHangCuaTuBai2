<?php include 'app/views/shares/header.php'; ?>
<style>
  body {
    min-height: 100vh;
    margin: 0;
    /* Nền gradient động */
    background: linear-gradient(-45deg, #6366f1, #38bdf8, #f472b6, #facc15);
    background-size: 400% 400%;
    animation: gradientBG 12s ease infinite;
  }

  @keyframes gradientBG {
    0% {
      background-position: 0% 50%;
    }

    50% {
      background-position: 100% 50%;
    }

    100% {
      background-position: 0% 50%;
    }
  }

  .product-card {
    background: rgba(255, 255, 255, 0.18);
    border-radius: 24px;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18), 0 1.5px 4px rgba(0, 0, 0, 0.08);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1.5px solid rgba(255, 255, 255, 0.25);
    transition: transform 0.4s cubic-bezier(.25, .8, .25, 1), box-shadow 0.4s;
    perspective: 900px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 420px;
    animation: fadeInUp 0.7s;
  }

  .product-card:hover {
    transform: scale(1.045) rotateY(6deg);
    box-shadow: 0 16px 48px 0 rgba(31, 38, 135, 0.22), 0 3px 12px rgba(0, 0, 0, 0.13);
  }

  @keyframes fadeInUp {
    0% {
      opacity: 0;
      transform: translateY(40px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .product-image {
    max-width: 120px;
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.13);
    margin-bottom: 18px;
    background: #fff;
    transition: transform 0.5s cubic-bezier(.25, .8, .25, 1);
  }

  .product-card:hover .product-image {
    transform: scale(1.11) rotateZ(-3deg);
  }

  .product-title {
    font-weight: bold;
    font-size: 1.35rem;
    color: #2d3748;
    display: flex;
    align-items: center;
    gap: 8px;
    justify-content: center;
    margin-bottom: 6px;
    text-align: center;
  }

  .category-badge {
    background: linear-gradient(90deg, #6366f1 60%, #38bdf8 100%);
    color: #fff;
    border-radius: 8px;
    padding: 2px 12px;
    font-size: 0.95rem;
    box-shadow: 0 1px 4px #6366f133;
    margin: 0 auto 10px auto;
    display: inline-block;
  }

  .product-price {
    color: #e53e3e;
    font-size: 1.18rem;
    font-weight: 600;
    animation: pricePulse 1.5s infinite alternate;
    text-align: center;
  }

  @keyframes pricePulse {
    0% {
      text-shadow: 0 0 0 #e53e3e;
    }

    100% {
      text-shadow: 0 0 12px #e53e3e88;
    }
  }

  .product-stock {
    font-size: 1.04rem;
    font-weight: 500;
    text-align: center;
    margin-bottom: 8px;
  }

  .product-stock.text-danger {
    color: #e53e3e;
    font-weight: bold;
  }

  .d-flex.gap-2 {
    display: flex;
    gap: 12px;
    justify-content: center;
    margin-top: 12px;
  }

  .btn-3d {
    box-shadow: 0 4px 0 #bdbdbd, 0 2px 12px #6366f133;
    transition: transform 0.18s cubic-bezier(.25, .8, .25, 1), box-shadow 0.18s, background 0.18s, color 0.18s;
    border-radius: 10px;
    font-weight: 600;
    border: none;
    outline: none;
    position: relative;
    overflow: hidden;
    background: linear-gradient(90deg, #6366f1 60%, #38bdf8 100%);
    color: #fff;
    min-width: 110px;
  }

  .btn-3d.btn-warning {
    background: linear-gradient(90deg, #fbbf24 60%, #f59e42 100%);
  }

  .btn-3d.btn-danger {
    background: linear-gradient(90deg, #ef4444 60%, #f87171 100%);
  }

  .btn-3d.btn-primary {
    background: linear-gradient(90deg, #6366f1 60%, #38bdf8 100%);
  }

  .btn-3d.btn-3d:active {
    transform: translateY(2px) scale(0.98);
    box-shadow: 0 2px 0 #bdbdbd;
  }

  .btn-3d:hover,
  .btn-3d:focus {
    transform: translateY(-2px) scale(1.04) rotateY(-2deg);
    box-shadow: 0 8px 24px #6366f155, 0 2px 12px #6366f133;
    filter: brightness(1.08);
    color: #fff !important;
    text-decoration: none;
  }

  .mb-2,
  .mb-3,
  .mb-4 {
    margin-bottom: 0.75rem !important;
  }

  .mb-4 {
    margin-bottom: 1.5rem !important;
  }

  .text-center {
    text-align: center;
  }

  .text-right {
    text-align: right;
  }

  .mr-2 {
    margin-right: 0.5rem;
  }

  .ml-2 {
    margin-left: 0.5rem;
  }

  .single-product {
    display: flex !important;
    justify-content: center;
    align-items: center;
  }

  .double-product {
    display: flex !important;
    justify-content: space-between;
    align-items: center;
  }

  .row.single-product,
  .row.double-product {
    justify-content: center !important;
    align-items: center;
    display: flex !important;
  }
</style>
<h1 class="mb-4 text-center"><i class="fas fa-boxes"></i> Danh sách sản phẩm</h1>
<div class="text-right mb-3">
  <a href="/ProjectBanHangCuaTu2/Product/add" class="btn btn-success btn-3d">
    <i class="fas fa-plus-circle"></i> Thêm sản phẩm mới
  </a>
</div>
<?php
$rowClass = '';
if (count($products) === 1) $rowClass = 'single-product';
if (count($products) === 2) $rowClass = 'double-product';
?>
<div class="row <?php echo $rowClass; ?>">
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
          <i class="fas fa-coins"></i>
          <?php echo number_format($product->price, 0, ',', '.'); ?> VND
        </div>
        <?php if ((int)$product->stock > 0): ?>
          <div class="product-stock mb-2">
            <i class="fas fa-box"></i> Còn: <?php echo (int)$product->stock; ?>
          </div>
        <?php else: ?>
          <div class="product-stock mb-2 text-danger">
            <i class="fas fa-box"></i> Hết hàng
          </div>
        <?php endif; ?>
        <div class="d-flex gap-2">
          <?php if (SessionHelper::isLoggedIn() && SessionHelper::getRole() === 'admin'): ?>
            <a href="/ProjectBanHangCuaTu2/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning btn-3d mr-2">
              <i class="fas fa-edit"></i> Sửa
            </a>
            <a href="/ProjectBanHangCuaTu2/Product/delete/<?php echo $product->id; ?>"
              class="btn btn-danger btn-3d">
              <i class="fas fa-trash-alt"></i> Xóa
            </a>
          <?php endif; ?>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.querySelectorAll('.btn-add-to-cart').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
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
          if (data.error) {
            Swal.fire({
              icon: 'error',
              title: 'Có lỗi xảy ra!',
              html: `<b>${data.error}</b><br>Vui lòng thử lại hoặc liên hệ hỗ trợ.`,
              showClass: {
                popup: 'animate__animated animate__headShake'
              },
              background: 'linear-gradient(135deg, #fff6, #f472b6 30%, #facc15 100%)',
              confirmButtonColor: '#e53e3e',
              confirmButtonText: '<i class="fas fa-thumbs-up"></i> Đã hiểu'
            });
          } else {
            Swal.fire({
              icon: 'success',
              title: '🎉 Thêm vào giỏ thành công!',
              html: '<span style="color:#38bdf8;font-weight:bold;">Sản phẩm đã được thêm vào giỏ hàng.<br>Mua sắm vui vẻ nhé!</span>',
              showClass: {
                popup: 'animate__animated animate__bounceIn'
              },
              background: 'linear-gradient(135deg, #e0e7ff 60%, #f8fafc 100%)',
              timer: 1800,
              timerProgressBar: true,
              confirmButtonColor: '#38bdf8',
              confirmButtonText: '<i class="fas fa-cart-plus"></i> Đã rõ'
            });
            if (data.cart_qty !== undefined && document.getElementById('cart-badge')) {
              document.getElementById('cart-badge').textContent = data.cart_qty;
            }
          }
        });
    });
  });
</script>
<?php include 'app/views/shares/footer.php'; ?>