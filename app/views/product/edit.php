<?php include 'app/views/shares/header.php'; ?>
<style>
  .form-card {
    background: linear-gradient(135deg, #f8fafc 60%, #e0e7ff 100%);
    border-radius: 20px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.12), 0 1.5px 4px rgba(0, 0, 0, 0.08);
    padding: 32px 28px 24px 28px;
    max-width: 540px;
    margin: 32px auto 0 auto;
    transition: transform 0.3s cubic-bezier(.25, .8, .25, 1), box-shadow 0.3s;
    perspective: 800px;
    animation: fadeInUp 0.7s;
  }

  .form-card:hover {
    transform: scale(1.03) rotateY(4deg);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18), 0 3px 8px rgba(0, 0, 0, 0.12);
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
    box-shadow: 0 4px 0 #bdbdbd;
    transition: transform 0.1s, box-shadow 0.1s;
    border-radius: 8px;
  }

  .btn-3d:active {
    transform: translateY(2px);
    box-shadow: 0 2px 0 #bdbdbd;
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
    <i class="fas fa-edit"></i> Sửa sản phẩm
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
  <form method="POST" action="/ProjectBanHangCuaTu2/Product/update" enctype="multipart/form-data"
    onsubmit="return validateForm();">
    <input type="hidden" name="id" value="<?php echo $product->id; ?>">
    <div class="form-group mb-3">
      <label for="name"><i class="fas fa-cube"></i> Tên sản phẩm:</label>
      <input type="text" id="name" name="name" class="form-control"
        value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>
    <div class="form-group mb-3">
      <label for="description"><i class="fas fa-align-left"></i> Mô tả:</label>
      <textarea id="description" name="description" class="form-control" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>
    <div class="form-group mb-3">
      <label for="price"><i class="fas fa-money-bill-wave"></i> Giá:</label>
      <input type="number" id="price" name="price" class="form-control" step="0.01"
        value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>
    <div class="form-group mb-3">
      <label for="category_id"><i class="fas fa-tags"></i> Danh mục:</label>
      <select id="category_id" name="category_id" class="form-control" required>
        <?php foreach ($categories as $category): ?>
          <option value="<?php echo $category->id; ?>" <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group mb-4">
      <label for="image"><i class="fas fa-image"></i> Hình ảnh:</label>
      <input type="file" id="image" name="image" class="form-control">
      <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">
      <?php if ($product->image): ?>
        <img src="/<?php echo $product->image; ?>" alt="Product Image" class="preview-img">
      <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary btn-3d w-100">
      <i class="fas fa-save"></i> Lưu thay đổi
    </button>
  </form>
  <a href="/ProjectBanHangCuaTu2/Product/" class="btn btn-secondary btn-3d mt-3 w-100">
    <i class="fas fa-arrow-left"></i> Quay lại danh sách sản phẩm
  </a>
</div>
<?php include 'app/views/shares/footer.php'; ?>