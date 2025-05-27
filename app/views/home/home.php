<?php include 'app/views/shares/header.php'; ?>
<style>
  .home-card {
    background: linear-gradient(135deg, #f8fafc 60%, #e0e7ff 100%);
    border-radius: 24px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.12), 0 1.5px 4px rgba(0, 0, 0, 0.08);
    padding: 48px 32px 40px 32px;
    max-width: 700px;
    margin: 48px auto 0 auto;
    text-align: center;
    animation: fadeInUp 0.7s;
    transition: transform 0.3s cubic-bezier(.25, .8, .25, 1), box-shadow 0.3s;
    perspective: 800px;
  }

  .home-card:hover {
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

  .home-title {
    font-size: 2.4rem;
    font-weight: bold;
    color: #4f46e5;
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    letter-spacing: 1px;
  }

  .home-desc {
    color: #374151;
    font-size: 1.2rem;
    margin-bottom: 32px;
  }

  .home-actions .btn {
    min-width: 180px;
    margin: 8px 12px;
  }
</style>
<div class="home-card">
  <div class="home-title">
    <i class="fas fa-home"></i> Chào mừng đến với hệ thống quản lý sản phẩm
  </div>
  <div class="home-desc">
    Quản lý sản phẩm và danh mục dễ dàng, hiện đại, trực quan.<br>
    Sử dụng menu trên để truy cập các chức năng hoặc chọn nhanh bên dưới.
  </div>
  <div class="home-actions d-flex flex-wrap justify-content-center">
    <a href="/ProjectBanHangCuaTuBai2/Product/" class="btn btn-info btn-3d mb-2">
      <i class="fas fa-boxes"></i> Danh sách sản phẩm
    </a>
    <a href="/ProjectBanHangCuaTuBai2/Product/add" class="btn btn-success btn-3d mb-2">
      <i class="fas fa-plus-circle"></i> Thêm sản phẩm
    </a>
    <a href="/ProjectBanHangCuaTuBai2/Category/list" class="btn btn-primary btn-3d mb-2">
      <i class="fas fa-layer-group"></i> Danh sách danh mục
    </a>
    <a href="/ProjectBanHangCuaTuBai2/Category/add" class="btn btn-warning btn-3d mb-2">
      <i class="fas fa-plus-circle"></i> Thêm danh mục
    </a>
  </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>