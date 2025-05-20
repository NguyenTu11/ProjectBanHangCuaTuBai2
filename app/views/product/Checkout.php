<?php include 'app/views/shares/header.php'; ?>
<style>
  .checkout-card {
    background: linear-gradient(135deg, #f8fafc 60%, #e0e7ff 100%);
    border-radius: 22px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.13), 0 1.5px 4px rgba(0, 0, 0, 0.09);
    padding: 36px 32px 28px 32px;
    max-width: 520px;
    margin: 48px auto 0 auto;
    animation: fadeInUp 0.7s;
    transition: transform 0.3s cubic-bezier(.25, .8, .25, 1), box-shadow 0.3s;
    perspective: 800px;
  }

  .checkout-card:hover {
    transform: scale(1.02) rotateY(3deg);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18), 0 3px 8px rgba(0, 0, 0, 0.13);
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

  .checkout-title {
    font-size: 2rem;
    font-weight: bold;
    color: #4f46e5;
    text-align: center;
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    letter-spacing: 1px;
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

  .btn-3d {
    box-shadow: 0 4px 0 #bdbdbd;
    transition: transform 0.1s, box-shadow 0.1s;
    border-radius: 8px;
    min-width: 160px;
    font-weight: 600;
  }

  .btn-3d:active {
    transform: translateY(2px);
    box-shadow: 0 2px 0 #bdbdbd;
  }

  .checkout-actions {
    display: flex;
    gap: 12px;
    margin-top: 28px;
    justify-content: center;
  }
</style>
<div class="checkout-card">
  <div class="checkout-title">
    <i class="fas fa-credit-card"></i> Thanh toán
  </div>
  <form method="POST" action="/ProjectBanHangCuaTu2/Product/processCheckout">
    <div class="form-group mb-3">
      <label for="name"><i class="fas fa-user"></i> Họ tên:</label>
      <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group mb-3">
      <label for="phone"><i class="fas fa-phone"></i> Số điện thoại:</label>
      <input type="text" id="phone" name="phone" class="form-control" required>
    </div>
    <div class="form-group mb-4">
      <label for="address"><i class="fas fa-map-marker-alt"></i> Địa chỉ:</label>
      <textarea id="address" name="address" class="form-control" required></textarea>
    </div>
    <div class="checkout-actions">
      <button type="submit" class="btn btn-primary btn-3d">
        <i class="fas fa-credit-card"></i> Thanh toán
      </button>
      <a href="/ProjectBanHangCuaTu2/Product/cart" class="btn btn-secondary btn-3d">
        <i class="fas fa-arrow-left"></i> Quay lại giỏ hàng
      </a>
    </div>
  </form>
</div>
<?php include 'app/views/shares/footer.php'; ?>