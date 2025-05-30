<?php include 'app/views/shares/header.php'; ?>
<style>
  body {
    min-height: 100vh;
    margin: 0;
    background: linear-gradient(-45deg, #facc15, #f472b6, #f8fafc, #38bdf8);
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

  .confirm-card {
    background: rgba(255, 255, 255, 0.22);
    border-radius: 24px;
    box-shadow: 0 8px 32px 0 rgba(250, 204, 21, 0.18), 0 1.5px 4px rgba(0, 0, 0, 0.08);
    border: 2px solid #facc15;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    padding: 36px 32px 28px 32px;
    max-width: 520px;
    margin: 48px auto 0 auto;
    animation: fadeInUp 0.7s;
    transition: transform 0.3s cubic-bezier(.25, .8, .25, 1), box-shadow 0.3s;
    perspective: 800px;
    text-align: center;
  }

  .confirm-card:hover {
    transform: scale(1.02) rotateY(3deg);
    box-shadow: 0 12px 36px rgba(250, 204, 21, 0.22), 0 3px 12px rgba(0, 0, 0, 0.13);
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

  .confirm-title {
    font-size: 2rem;
    font-weight: bold;
    color: #22c55e;
    margin-bottom: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    letter-spacing: 1px;
  }

  .confirm-msg {
    color: #374151;
    font-size: 1.15rem;
    margin-bottom: 32px;
    animation: fadeInUp 1s;
  }

  .btn-3d {
    box-shadow: 0 4px 0 #bdbdbd;
    transition: transform 0.1s, box-shadow 0.1s;
    border-radius: 8px;
    min-width: 180px;
    font-weight: 600;
  }

  .btn-3d:active {
    transform: translateY(2px);
    box-shadow: 0 2px 0 #bdbdbd;
  }
</style>
<div class="confirm-card">
  <div class="confirm-title">
    <i class="fas fa-check-circle text-success"></i> Xác nhận đơn hàng
  </div>
  <div class="confirm-msg">
    <i class="fas fa-smile-beam fa-lg text-warning"></i>
    <br>
    Cảm ơn bạn đã đặt hàng.<br>Đơn hàng của bạn đã được xử lý thành công!
  </div>
  <a href="/ProjectBanHangCuaTu2/Product/" class="btn btn-primary btn-3d mt-2">
    <i class="fas fa-shopping-bag"></i> Tiếp tục mua sắm
  </a>
</div>
<?php include 'app/views/shares/footer.php'; ?>