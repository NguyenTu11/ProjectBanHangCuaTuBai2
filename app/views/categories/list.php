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

  .category-card {
    background: rgba(255, 255, 255, 0.18);
    border-radius: 24px;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18), 0 1.5px 4px rgba(0, 0, 0, 0.08);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1.5px solid rgba(255, 255, 255, 0.25);
    transition: transform 0.4s cubic-bezier(.25, .8, .25, 1), box-shadow 0.4s;
    perspective: 900px;
    animation: fadeInUp 0.7s;
    min-height: 220px;
    margin-bottom: 24px;
    padding: 28px 24px 20px 24px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .category-card:hover {
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

  .category-title {
    font-size: 1.4rem;
    font-weight: bold;
    color: #2d3748;
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 8px;
    justify-content: center;
    text-align: center;
  }

  .category-desc {
    color: #374151;
    margin-bottom: 16px;
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

  .btn-3d.btn-warning {
    background: linear-gradient(90deg, #fbbf24 60%, #f59e42 100%);
  }

  .btn-3d.btn-danger {
    background: linear-gradient(90deg, #ef4444 60%, #f87171 100%);
  }

  .btn-3d.btn-primary {
    background: linear-gradient(90deg, #6366f1 60%, #38bdf8 100%);
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

  .d-flex.gap-2 {
    display: flex;
    gap: 12px;
    justify-content: center;
    margin-top: 12px;
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
</style>
<h1 class="mb-4 text-center"><i class="fas fa-layer-group"></i> Danh sách danh mục</h1>
<div class="text-right mb-3">
  <a href="/ProjectBanHangCuaTu2/Category/add" class="btn btn-success btn-3d">
    <i class="fas fa-plus-circle"></i> Thêm danh mục mới
  </a>
</div>
<div class="row">
  <?php foreach ($categories as $category): ?>
    <div class="col-md-6 col-lg-4">
      <div class="category-card">
        <div class="category-title">
          <i class="fas fa-tag"></i>
          <a href="/ProjectBanHangCuaTu2/Category/show/<?php echo $category->id; ?>" class="text-decoration-none text-dark">
            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
          </a>
        </div>
        <div class="category-desc">
          <?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?>
        </div>
        <div class="d-flex gap-2">
          <a href="/ProjectBanHangCuaTu2/Category/edit/<?php echo $category->id; ?>" class="btn btn-warning btn-3d mr-2">
            <i class="fas fa-edit"></i> Sửa
          </a>
          <a href="/ProjectBanHangCuaTu2/Category/delete/<?php echo $category->id; ?>" class="btn btn-danger btn-3d">
            <i class="fas fa-trash-alt"></i> Xóa
          </a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php include 'app/views/shares/footer.php'; ?>