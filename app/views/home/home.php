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

  .stats-row {
    display: flex;
    justify-content: center;
    gap: 32px;
    margin: 40px 0 32px 0;
    flex-wrap: wrap;
  }

  .stat-card {
    min-width: 220px;
    background: rgba(255, 255, 255, 0.18);
    border-radius: 22px;
    box-shadow: 0 8px 32px 0 rgba(56, 189, 248, 0.18), 0 1.5px 4px rgba(0, 0, 0, 0.08);
    padding: 28px 24px 20px 24px;
    display: flex;
    flex-direction: column;
    align-items: center;
    animation: fadeInUp 0.7s;
    transition: transform 0.3s cubic-bezier(.25, .8, .25, 1), box-shadow 0.3s;
    perspective: 800px;
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1.5px solid rgba(255, 255, 255, 0.22);
    color: #2d3748;
  }

  .stat-card:nth-child(2) {
    background: linear-gradient(135deg, #f472b6 40%, #facc15 100%);
    color: #fff;
  }

  .stat-card:nth-child(3) {
    background: linear-gradient(135deg, #38bdf8 40%, #facc15 100%);
    color: #fff;
  }

  .stat-card:hover {
    transform: scale(1.06) rotateY(6deg);
    box-shadow: 0 16px 48px 0 rgba(56, 189, 248, 0.22), 0 3px 12px rgba(0, 0, 0, 0.13);
  }

  .stat-icon {
    font-size: 2.2rem;
    margin-bottom: 10px;
    filter: drop-shadow(0 2px 8px #fff5);
    color: #6366f1;
  }

  .stat-card:nth-child(2) .stat-icon {
    color: #f472b6;
  }

  .stat-card:nth-child(3) .stat-icon {
    color: #facc15;
  }

  .stat-label {
    font-size: 1.1rem;
    font-weight: 500;
    letter-spacing: 0.5px;
    margin-bottom: 6px;
    text-shadow: 0 2px 8px #0002;
  }

  .stat-value {
    font-size: 2.1rem;
    font-weight: bold;
    letter-spacing: 1px;
    animation: statPulse 1.2s infinite alternate;
    text-shadow: 0 2px 12px #fff8, 0 1px 8px #6366f188;
    color: #4f46e5;
  }

  @keyframes statPulse {
    0% {
      text-shadow: 0 0 0 #fff8, 0 1px 8px #6366f188;
    }

    100% {
      text-shadow: 0 0 18px #fff, 0 2px 16px #6366f1aa;
    }
  }

  .home-card {
    background: rgba(255, 255, 255, 0.18);
    /* Nền trong suốt */
    border-radius: 24px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.12), 0 1.5px 4px rgba(0, 0, 0, 0.08);
    padding: 48px 32px 40px 32px;
    max-width: 700px;
    margin: 48px auto 0 auto;
    text-align: center;
    animation: fadeInUp 0.7s;
    transition: transform 0.3s cubic-bezier(.25, .8, .25, 1), box-shadow 0.3s;
    perspective: 800px;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1.5px solid rgba(255, 255, 255, 0.22);
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

  /* Pastel button colors */
  .pastel-blue {
    background: #a5d8ff !important;
    color: #22577a !important;
    border: none;
  }

  .pastel-green {
    background: #b9fbc0 !important;
    color: #22577a !important;
    border: none;
  }

  .pastel-purple {
    background: #d0bfff !important;
    color: #4b3869 !important;
    border: none;
  }

  .pastel-yellow {
    background: #fff3bf !important;
    color: #a17a0a !important;
    border: none;
  }

  .pastel-blue:hover,
  .pastel-green:hover,
  .pastel-purple:hover,
  .pastel-yellow:hover {
    filter: brightness(0.97) saturate(1.2);
    box-shadow: 0 6px 24px #6366f122;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<!-- Card chào mừng giữ nguyên -->
<div class="home-card">
  <div class="home-title">
    <i class="fas fa-home"></i> Chào mừng đến với hệ thống quản lý sản phẩm
  </div>
  <div class="home-desc">
    Quản lý sản phẩm và danh mục dễ dàng, hiện đại, trực quan.<br>
    Sử dụng menu trên để truy cập các chức năng hoặc chọn nhanh bên dưới.
  </div>
  <div class="home-actions d-flex flex-wrap justify-content-center">
    <a href="/ProjectBanHangCuaTu2/Product/" class="btn btn-3d pastel-blue mb-2">
      <i class="fas fa-boxes"></i> Danh sách sản phẩm
    </a>
    <a href="/ProjectBanHangCuaTu2/Product/add" class="btn btn-3d pastel-green mb-2">
      <i class="fas fa-plus-circle"></i> Thêm sản phẩm
    </a>
    <a href="/ProjectBanHangCuaTu2/Category/list" class="btn btn-3d pastel-purple mb-2">
      <i class="fas fa-layer-group"></i> Danh sách danh mục
    </a>
    <a href="/ProjectBanHangCuaTu2/Category/add" class="btn btn-3d pastel-yellow mb-2">
      <i class="fas fa-plus-circle"></i> Thêm danh mục
    </a>
  </div>
</div>

<!-- Thẻ thống kê -->
<div class="stats-row">
  <div class="stat-card">
    <div class="stat-icon"><i class="fas fa-boxes"></i></div>
    <div class="stat-label">Tổng sản phẩm</div>
    <div class="stat-value"><?php echo $totalProducts ?? 0; ?></div>
  </div>
  <div class="stat-card">
    <div class="stat-icon"><i class="fas fa-layer-group"></i></div>
    <div class="stat-label">Tổng danh mục</div>
    <div class="stat-value"><?php echo $totalCategories ?? 0; ?></div>
  </div>
  <div class="stat-card">
    <div class="stat-icon"><i class="fas fa-coins"></i></div>
    <div class="stat-label">Tổng tiền sản phẩm</div>
    <div class="stat-value"><?php echo isset($totalAmount) ? number_format($totalAmount, 0, ',', '.') . ' VND' : '0 VND'; ?></div>
  </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>