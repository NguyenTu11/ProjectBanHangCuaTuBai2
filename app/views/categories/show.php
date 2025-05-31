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

  .category-detail-card {
    background: linear-gradient(135deg, #f8fafc 60%, #e0e7ff 100%);
    border-radius: 20px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.12), 0 1.5px 4px rgba(0, 0, 0, 0.08);
    padding: 32px 28px 24px 28px;
    max-width: 600px;
    margin: 32px auto 0 auto;
    transition: transform 0.3s cubic-bezier(.25, .8, .25, 1), box-shadow 0.3s;
    perspective: 800px;
    animation: fadeInUp 0.7s;
  }

  .category-detail-card:hover {
    transform: scale(1.02) rotateY(2deg);
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

  .category-detail-title {
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

  .category-detail-desc {
    color: #374151;
    font-size: 1.1rem;
    margin-bottom: 24px;
    text-align: center;
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
<div class="category-detail-card">
  <div class="category-detail-title">
    <i class="fas fa-tag"></i> <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
  </div>
  <div class="category-detail-desc">
    <i class="fas fa-align-left"></i>
    <?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?>
  </div>
  <div class="d-flex gap-2 justify-content-center">
    <?php if (SessionHelper::isLoggedIn() && SessionHelper::getRole() === 'admin'): ?>
      <a href="/ProjectBanHangCuaTu2/Category/edit/<?php echo $category->id; ?>" class="btn btn-warning btn-3d mr-2">
        <i class="fas fa-edit"></i> Sửa
      </a>
      <a href="/ProjectBanHangCuaTu2/Category/delete/<?php echo $category->id; ?>" class="btn btn-danger btn-3d"
        onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
        <i class="fas fa-trash-alt"></i> Xóa
      </a>
    <?php endif; ?>
    <a href="/ProjectBanHangCuaTu2/Category/list" class="btn btn-secondary btn-3d ml-2">
      <i class="fas fa-arrow-left"></i> Quay lại danh sách
    </a>
  </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>