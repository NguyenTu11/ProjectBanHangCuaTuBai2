<?php include 'app/views/shares/header.php'; ?>
<style>
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
    box-shadow: 0 4px 0 #bdbdbd;
    transition: transform 0.1s, box-shadow 0.1s;
    border-radius: 8px;
  }

  .btn-3d:active {
    transform: translateY(2px);
    box-shadow: 0 2px 0 #bdbdbd;
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
    <a href="/ProjectBanHangCuaTu2/Category/edit/<?php echo $category->id; ?>" class="btn btn-warning btn-3d mr-2">
      <i class="fas fa-edit"></i> Sửa
    </a>
    <a href="/ProjectBanHangCuaTu2/Category/delete/<?php echo $category->id; ?>" class="btn btn-danger btn-3d"
      onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
      <i class="fas fa-trash-alt"></i> Xóa
    </a>
    <a href="/ProjectBanHangCuaTu2/Category/list" class="btn btn-secondary btn-3d ml-2">
      <i class="fas fa-arrow-left"></i> Quay lại danh sách
    </a>
  </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>