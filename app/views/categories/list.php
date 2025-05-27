<?php include 'app/views/shares/header.php'; ?>
<style>
  .category-card {
    background: linear-gradient(135deg, #f8fafc 60%, #e0e7ff 100%);
    border-radius: 20px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.12), 0 1.5px 4px rgba(0, 0, 0, 0.08);
    margin-bottom: 24px;
    padding: 28px 24px 20px 24px;
    transition: transform 0.3s cubic-bezier(.25, .8, .25, 1), box-shadow 0.3s;
    perspective: 800px;
  }

  .category-card:hover {
    transform: scale(1.03) rotateY(4deg);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18), 0 3px 8px rgba(0, 0, 0, 0.12);
  }

  .category-title {
    font-size: 1.4rem;
    font-weight: bold;
    color: #2d3748;
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 8px;
  }

  .category-desc {
    color: #374151;
    margin-bottom: 16px;
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
<h1 class="mb-4 text-center"><i class="fas fa-layer-group"></i> Danh sách danh mục</h1>
<div class="text-right mb-3">
  <a href="/ProjectBanHangCuaTuBai2/Category/add" class="btn btn-success btn-3d">
    <i class="fas fa-plus-circle"></i> Thêm danh mục mới
  </a>
</div>
<div class="row">
  <?php foreach ($categories as $category): ?>
    <div class="col-md-6 col-lg-4">
      <div class="category-card">
        <div class="category-title">
          <i class="fas fa-tag"></i>
          <a href="/ProjectBanHangCuaTuBai2/Category/show/<?php echo $category->id; ?>" class="text-decoration-none text-dark">
            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
          </a>
        </div>
        <div class="category-desc">
          <?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?>
        </div>
        <div class="d-flex gap-2">
          <a href="/ProjectBanHangCuaTuBai2/Category/edit/<?php echo $category->id; ?>" class="btn btn-warning btn-3d mr-2">
            <i class="fas fa-edit"></i> Sửa
          </a>
          <a href="/ProjectBanHangCuaTuBai2/Category/delete/<?php echo $category->id; ?>" class="btn btn-danger btn-3d"
            onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
            <i class="fas fa-trash-alt"></i> Xóa
          </a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php include 'app/views/shares/footer.php'; ?>