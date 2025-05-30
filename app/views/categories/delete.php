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
      <i class="fas fa-trash-alt"></i> Xác nhận xóa danh mục
    </div>
    <div class="delete-info">
      <div class="mb-2">
        <span class="delete-label"><i class="fas fa-tag"></i> Tên danh mục:</span>
        <span class="delete-value"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></span>
      </div>
      <div class="mb-2">
        <span class="delete-label"><i class="fas fa-align-left"></i> Mô tả:</span>
        <span class="delete-value"><?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></span>
      </div>
      <div class="alert alert-danger mt-3" style="font-size:1.07rem;">
        <i class="fas fa-exclamation-triangle"></i>
        Hành động này không thể hoàn tác! Bạn chắc chắn muốn xóa danh mục này?
      </div>
    </div>
    <form method="POST" action="/ProjectBanHangCuaTu2/Category/delete/<?php echo $category->id; ?>">
      <div class="delete-actions">
        <button type="submit" class="btn btn-danger btn-3d px-4">
          <i class="fas fa-trash"></i> Xóa
        </button>
        <a href="/ProjectBanHangCuaTu2/Category/list" class="btn btn-secondary btn-3d px-4">
          <i class="fas fa-arrow-left"></i> Hủy
        </a>
      </div>
    </form>
  </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>