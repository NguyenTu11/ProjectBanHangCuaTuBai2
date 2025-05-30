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

  .delete-card {
    background: rgba(255, 255, 255, 0.18);
    border-radius: 24px;
    box-shadow: 0 8px 32px 0 rgba(99, 102, 241, 0.18), 0 1.5px 4px rgba(0, 0, 0, 0.08), 0 0 32px 8px #38bdf855;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1.5px solid rgba(255, 255, 255, 0.22);
    position: relative;
    overflow: hidden;
    animation: homeGlow 2.5s infinite alternate;
    max-width: 440px;
  }

  @keyframes homeGlow {
    0% {
      box-shadow: 0 4px 32px 0 #38bdf855, 0 1.5px 4px #0002;
    }

    100% {
      box-shadow: 0 8px 48px 0 #6366f188, 0 3px 12px #0003;
    }
  }

  .delete-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #e53e3e;
    text-align: center;
    margin-bottom: 18px;
    letter-spacing: 1px;
  }

  .delete-info {
    text-align: center;
    margin-bottom: 18px;
  }

  .delete-img {
    width: 110px;
    height: 110px;
    object-fit: cover;
    border-radius: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.09);
    margin-bottom: 12px;
    background: #fff;
  }

  .delete-label {
    font-weight: 500;
    color: #6366f1;
    margin-right: 6px;
  }

  .delete-value {
    font-weight: bold;
    color: #2d3748;
  }

  .delete-actions {
    display: flex;
    gap: 16px;
    justify-content: center;
    margin-top: 18px;
  }
</style>
<div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height:70vh;">
  <div class="delete-card p-4 mx-auto animate__animated animate__fadeInDown">
    <div class="delete-title">
      <i class="fas fa-trash-alt"></i> Xác nhận xóa sản phẩm
    </div>
    <div class="delete-info">
      <?php if ($product->image): ?>
        <img src="/ProjectBanHangCuaTu2/<?php echo $product->image; ?>" alt="Product Image" class="delete-img">
      <?php else: ?>
        <img src="/ProjectBanHangCuaTu2/images/no-image.png" alt="No Image" class="delete-img">
      <?php endif; ?>
      <div class="mb-2">
        <span class="delete-label"><i class="fas fa-cube"></i> Tên:</span>
        <span class="delete-value"><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></span>
      </div>
      <div class="mb-2">
        <span class="delete-label"><i class="fas fa-tags"></i> Danh mục:</span>
        <span class="delete-value"><?php echo htmlspecialchars($product->category_name ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
      </div>
      <div class="mb-2">
        <span class="delete-label"><i class="fas fa-coins"></i> Giá:</span>
        <span class="delete-value"><?php echo number_format($product->price, 0, ',', '.'); ?> VND</span>
      </div>
      <div class="mb-2">
        <span class="delete-label"><i class="fas fa-box"></i> Tồn kho:</span>
        <span class="delete-value"><?php echo (int)$product->stock; ?></span>
      </div>
      <div class="mb-2">
        <span class="delete-label"><i class="fas fa-info-circle"></i> Mô tả:</span>
        <span class="delete-value"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></span>
      </div>
      <div class="alert alert-danger mt-3" style="font-size:1.07rem;">
        <i class="fas fa-exclamation-triangle"></i>
        Hành động này không thể hoàn tác! Bạn chắc chắn muốn xóa sản phẩm này?
      </div>
    </div>
    <form method="POST" action="/ProjectBanHangCuaTu2/Product/delete/<?php echo $product->id; ?>">
      <div class="delete-actions">
        <button type="submit" class="btn btn-danger btn-3d px-4">
          <i class="fas fa-trash"></i> Xóa
        </button>
        <a href="/ProjectBanHangCuaTu2/Product/" class="btn btn-secondary btn-3d px-4">
          <i class="fas fa-arrow-left"></i> Hủy
        </a>
      </div>
    </form>
  </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>