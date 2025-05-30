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

  .form-card {
    background: rgba(255, 255, 255, 0.18);
    border-radius: 24px;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18), 0 1.5px 4px rgba(0, 0, 0, 0.08);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1.5px solid rgba(255, 255, 255, 0.25);
    transition: transform 0.4s cubic-bezier(.25, .8, .25, 1), box-shadow 0.4s;
    perspective: 900px;
    animation: fadeInUp 0.7s;
    max-width: 540px;
    margin: 32px auto 0 auto;
    padding: 32px 28px 24px 28px;
  }

  .form-card:hover {
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

  .form-title {
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

  .form-group label {
    font-weight: 600;
    color: #374151;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .form-control:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 2px #6366f133;
  }

  .alert-danger {
    border-radius: 10px;
    box-shadow: 0 2px 8px #e53e3e22;
    animation: shake 0.4s;
  }

  @keyframes shake {
    0% {
      transform: translateX(0);
    }

    20% {
      transform: translateX(-8px);
    }

    40% {
      transform: translateX(8px);
    }

    60% {
      transform: translateX(-8px);
    }

    80% {
      transform: translateX(8px);
    }

    100% {
      transform: translateX(0);
    }
  }

  .preview-img {
    max-width: 120px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    margin-top: 8px;
  }
</style>
<div class="form-card">
  <div class="form-title">
    <i class="fas fa-plus-circle"></i> Thêm sản phẩm mới
  </div>
  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
  <form method="POST" action="/ProjectBanHangCuaTu2/Product/save" enctype="multipart/form-data"
    onsubmit="return validateForm();">
    <div class="form-group mb-3">
      <label for="name"><i class="fas fa-cube"></i> Tên sản phẩm:</label>
      <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group mb-3">
      <label for="description"><i class="fas fa-align-left"></i> Mô tả:</label>
      <textarea id="description" name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group mb-3">
      <label for="price"><i class="fas fa-money-bill-wave"></i> Giá:</label>
      <input type="number" id="price" name="price" class="form-control" step="0.01" required>
    </div>
    <div class="form-group mb-3">
      <label for="category_id"><i class="fas fa-tags"></i> Danh mục:</label>
      <select id="category_id" name="category_id" class="form-control" required>
        <?php foreach ($categories as $category): ?>
          <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group mb-3">
      <label for="stock"><i class="fas fa-box"></i> Số lượng tồn:</label>
      <input type="number" id="stock" name="stock" class="form-control" min="0" required>
    </div>
    <div class="form-group mb-4">
      <label for="image"><i class="fas fa-image"></i> Hình ảnh:</label>
      <input type="file" id="image" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary btn-3d w-100">
      <i class="fas fa-plus"></i> Thêm sản phẩm
    </button>
  </form>
  <a href="/ProjectBanHangCuaTu2/Product/" class="btn btn-secondary btn-3d mt-3 w-100">
    <i class="fas fa-arrow-left"></i> Quay lại danh sách sản phẩm
  </a>
</div>
<?php include 'app/views/shares/footer.php'; ?>