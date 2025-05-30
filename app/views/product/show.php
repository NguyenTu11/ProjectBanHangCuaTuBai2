<?php include 'app/views/shares/header.php'; ?>
<style>
  body {
    min-height: 100vh;
    margin: 0;
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

  .product-detail-card {
    background: rgba(255, 255, 255, 0.18);
    border-radius: 24px;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18), 0 1.5px 4px rgba(0, 0, 0, 0.08);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1.5px solid rgba(255, 255, 255, 0.25);
    transition: transform 0.4s cubic-bezier(.25, .8, .25, 1), box-shadow 0.4s;
    perspective: 900px;
    animation: fadeInUp 0.7s;
    max-width: 800px;
    margin: 32px auto 0 auto;
    padding: 32px 28px 24px 28px;
  }

  .product-detail-card:hover {
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

  .product-detail-title {
    font-size: 2rem;
    font-weight: bold;
    color: #4f46e5;
    text-align: center;
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    letter-spacing: 1px;
  }

  .product-detail-img {
    max-width: 220px;
    border-radius: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    margin-bottom: 16px;
    transition: transform 0.4s cubic-bezier(.25, .8, .25, 1);
  }

  .product-detail-card:hover .product-detail-img {
    transform: scale(1.08) rotateZ(-2deg);
  }

  .product-detail-price {
    color: #e53e3e;
    font-size: 1.4rem;
    font-weight: 700;
    animation: pricePulse 1.5s infinite alternate;
    margin-bottom: 12px;
  }

  @keyframes pricePulse {
    0% {
      text-shadow: 0 0 0 #e53e3e;
    }

    100% {
      text-shadow: 0 0 12px #e53e3e88;
    }
  }

  .category-badge {
    background: linear-gradient(90deg, #6366f1 60%, #38bdf8 100%);
    color: #fff;
    border-radius: 8px;
    padding: 2px 12px;
    font-size: 1rem;
    box-shadow: 0 1px 4px #6366f133;
    margin-left: 8px;
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

  .btn-3d:active {
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
</style>
<div class="product-detail-card">
  <?php if ($product): ?>
    <div class="product-detail-title">
      <i class="fas fa-cube"></i> <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
    </div>
    <div class="row">
      <div class="col-md-5 text-center">
        <?php if ($product->image): ?>
          <img src="/ProjectBanHangCuaTu2/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
            class="product-detail-img" alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>">
        <?php else: ?>
          <img src="/ProjectBanHangCuaTu2/images/no-image.png"
            class="product-detail-img" alt="Không có ảnh">
        <?php endif; ?>
      </div>
      <div class="col-md-7">
        <div class="mb-3">
          <span class="category-badge">
            <i class="fas fa-tags"></i>
            <?php echo !empty($product->category_name) ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Chưa có danh mục'; ?>
          </span>
        </div>
        <div class="mb-3">
          <span class="product-detail-price">
            <i class="fas fa-money-bill-wave"></i>
            <?php echo number_format($product->price, 0, ',', '.'); ?> VND
          </span>
        </div>
        <div class="mb-3">
          <i class="fas fa-align-left"></i>
          <?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?>
        </div>
        <div class="mt-4 d-flex gap-2">
          <a href="/ProjectBanHangCuaTu2/Product/addToCart/<?php echo $product->id; ?>"
            class="btn btn-success btn-3d px-4">
            <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
          </a>
          <a href="/ProjectBanHangCuaTu2/Product/" class="btn btn-secondary btn-3d px-4 ml-2">
            <i class="fas fa-arrow-left"></i> Quay lại danh sách
          </a>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="alert alert-danger text-center">
      <h4>Không tìm thấy sản phẩm!</h4>
    </div>
  <?php endif; ?>
</div>
<?php include 'app/views/shares/footer.php'; ?>