<?php include 'app/views/shares/header.php'; ?>
<style>
  .cart-card {
    background: linear-gradient(135deg, #f8fafc 60%, #e0e7ff 100%);
    border-radius: 22px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.13), 0 1.5px 4px rgba(0, 0, 0, 0.09);
    padding: 36px 32px 28px 32px;
    max-width: 700px;
    margin: 48px auto 0 auto;
    animation: fadeInUp 0.7s;
    transition: transform 0.3s cubic-bezier(.25, .8, .25, 1), box-shadow 0.3s;
    perspective: 800px;
  }

  .cart-card:hover {
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

  .cart-title {
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

  .cart-list {
    padding: 0;
    margin: 0;
    list-style: none;
  }

  .cart-item {
    display: flex;
    align-items: center;
    background: linear-gradient(90deg, #e0e7ff 60%, #f8fafc 100%);
    border-radius: 16px;
    box-shadow: 0 2px 8px rgba(99, 102, 241, 0.07);
    margin-bottom: 18px;
    padding: 18px 20px;
    transition: transform 0.2s, box-shadow 0.2s;
    animation: fadeInCart 0.5s;
  }

  .cart-item:hover {
    transform: scale(1.03) rotateY(2deg);
    box-shadow: 0 6px 18px rgba(99, 102, 241, 0.13);
  }

  @keyframes fadeInCart {
    0% {
      opacity: 0;
      transform: translateY(20px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .cart-img {
    width: 90px;
    height: 90px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.09);
    margin-right: 22px;
    background: #fff;
  }

  .cart-info {
    flex: 1;
  }

  .cart-name {
    font-size: 1.2rem;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 6px;
    display: flex;
    align-items: center;
    gap: 7px;
  }

  .cart-price {
    color: #e53e3e;
    font-weight: 600;
    font-size: 1.1rem;
    margin-bottom: 4px;
    animation: pricePulse 1.5s infinite alternate;
  }

  @keyframes pricePulse {
    0% {
      text-shadow: 0 0 0 #e53e3e;
    }

    100% {
      text-shadow: 0 0 12px #e53e3e88;
    }
  }

  .cart-qty {
    color: #4f46e5;
    font-weight: 500;
    font-size: 1rem;
    margin-bottom: 0;
  }

  .cart-actions {
    display: flex;
    gap: 12px;
    margin-top: 32px;
    justify-content: center;
  }

  .btn-3d {
    box-shadow: 0 4px 0 #bdbdbd, 0 2px 12px #6366f133;
    transition:
      transform 0.18s cubic-bezier(.25, .8, .25, 1),
      box-shadow 0.18s,
      background 0.18s,
      color 0.18s;
    border-radius: 10px;
    font-weight: 600;
    border: none;
    outline: none;
    position: relative;
    overflow: hidden;
    background: linear-gradient(90deg, #6366f1 60%, #38bdf8 100%);
    color: #fff;
  }

  .btn-3d.btn-secondary {
    background: linear-gradient(90deg, #a1a1aa 60%, #f3f4f6 100%);
    color: #222;
  }

  .btn-3d.btn-info {
    background: linear-gradient(90deg, #38bdf8 60%, #6366f1 100%);
    color: #fff;
  }

  .btn-3d.btn-primary {
    background: linear-gradient(90deg, #6366f1 60%, #38bdf8 100%);
    color: #fff;
  }

  .btn-3d.btn-danger {
    background: linear-gradient(90deg, #ef4444 60%, #f87171 100%);
    color: #fff;
  }

  .btn-3d:hover,
  .btn-3d:focus {
    transform: translateY(-2px) scale(1.04) rotateY(-2deg);
    box-shadow: 0 8px 24px #6366f155, 0 2px 12px #6366f133;
    filter: brightness(1.08);
    color: #fff !important;
    text-decoration: none;
  }

  .btn-3d:active {
    transform: translateY(2px) scale(0.98);
    box-shadow: 0 2px 0 #bdbdbd;
  }

  .btn-remove {
    color: #ef4444;
    background: none;
    border: none;
    font-size: 1.2rem;
    margin-left: 12px;
    transition: color 0.2s, transform 0.18s;
    border-radius: 50%;
    padding: 6px 10px;
    outline: none;
  }

  .btn-remove:hover,
  .btn-remove:focus {
    color: #fff;
    background: linear-gradient(90deg, #ef4444 60%, #f87171 100%);
    transform: scale(1.15) rotate(-8deg);
    box-shadow: 0 4px 16px #ef444455;
  }

  .cart-empty {
    text-align: center;
    color: #6b7280;
    font-size: 1.2rem;
    margin: 32px 0;
    animation: fadeInUp 0.7s;
  }

  .cart-total {
    text-align: right;
    font-size: 1.25rem;
    font-weight: bold;
    color: #4f46e5;
    margin-top: 18px;
    margin-bottom: 0;
    animation: pricePulse 1.5s infinite alternate;
  }
</style>
<div class="cart-card">
  <div class="cart-title">
    <i class="fas fa-shopping-cart"></i> Giỏ hàng của bạn
  </div>
  <?php
  $tong_tien = 0;
  ?>
  <?php if (!empty($cart)): ?>
    <ul class="cart-list">
      <?php foreach ($cart as $id => $item):
        $item_total = $item['price'] * $item['quantity'];
        $tong_tien += $item_total;
      ?>
        <li class="cart-item">
          <?php if ($item['image']): ?>
            <img src="/ProjectBanHangCuaTu2/<?php echo $item['image']; ?>" alt="Product Image" class="cart-img">
          <?php else: ?>
            <img src="/ProjectBanHangCuaTu2/images/no-image.png" alt="No Image" class="cart-img">
          <?php endif; ?>
          <div class="cart-info">
            <div class="cart-name">
              <i class="fas fa-cube"></i>
              <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
            </div>
            <div class="cart-price">
              <i class="fas fa-money-bill-wave"></i>
              <?php echo number_format($item['price'], 0, ',', '.'); ?> VND
            </div>
            <form class="cart-qty-form" data-id="<?php echo $id; ?>">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <label for="qty_<?php echo $id; ?>" class="mb-0">
                <i class="fas fa-sort-numeric-up"></i> Số lượng:
              </label>
              <input type="number" min="1" name="quantity" id="qty_<?php echo $id; ?>" class="cart-qty-input" value="<?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?>">
              <button type="button" class="btn-remove" title="Xoá sản phẩm" onclick="removeCartItem('<?php echo $id; ?>')">
                <i class="fas fa-trash-alt"></i>
              </button>
            </form>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
    <div class="cart-total" id="cart-total">
      Tổng tiền: <?php echo number_format($tong_tien, 0, ',', '.'); ?> VND
    </div>
    <div class="cart-actions">
      <a href="/ProjectBanHangCuaTu2/Product" class="btn btn-secondary btn-3d">
        <i class="fas fa-arrow-left"></i> Tiếp tục mua sắm
      </a>
      <a href="/ProjectBanHangCuaTu2/Product/checkout" class="btn btn-primary btn-3d">
        <i class="fas fa-credit-card"></i> Thanh Toán
      </a>
    </div>
  <?php else: ?>
    <div class="cart-empty">
      <i class="fas fa-shopping-basket fa-2x mb-2"></i><br>
      Giỏ hàng của bạn đang trống.
    </div>
    <div class="cart-actions">
      <a href="/ProjectBanHangCuaTu2/Product" class="btn btn-secondary btn-3d">
        <i class="fas fa-arrow-left"></i> Tiếp tục mua sắm
      </a>
    </div>
  <?php endif; ?>
</div>
<script>
  document.querySelectorAll('.cart-qty-form').forEach(function(form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      var id = form.getAttribute('data-id');
      var qty = form.querySelector('input[name="quantity"]').value;
      fetch('/ProjectBanHangCuaTu2/Product/updateCartAjax', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: 'id=' + encodeURIComponent(id) + '&quantity=' + encodeURIComponent(qty)
        })
        .then(res => res.json())
        .then(data => {
          document.getElementById('cart-total').innerHTML = 'Tổng tiền: ' + data.cart_total + ' VND';
          if (data.cart_qty !== undefined && document.getElementById('cart-badge')) {
            document.getElementById('cart-badge').textContent = data.cart_qty;
          }
        });
    });
  });

  document.querySelectorAll('.cart-qty-input').forEach(function(input) {
    input.addEventListener('change', function() {
      var form = input.closest('.cart-qty-form');
      var id = form.getAttribute('data-id');
      var qty = input.value;
      fetch('/ProjectBanHangCuaTu2/Product/updateCartAjax', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: 'id=' + encodeURIComponent(id) + '&quantity=' + encodeURIComponent(qty)
        })
        .then(res => res.json())
        .then(data => {
          document.getElementById('cart-total').innerHTML = 'Tổng tiền: ' + data.cart_total + ' VND';
          if (data.cart_qty !== undefined && document.getElementById('cart-badge')) {
            document.getElementById('cart-badge').textContent = data.cart_qty;
          }
        });
    });
  });

  // Xoá sản phẩm bằng AJAX
  function removeCartItem(id) {
    if (!confirm('Xoá sản phẩm này khỏi giỏ hàng?')) return;
    fetch('/ProjectBanHangCuaTu2/Product/updateCartAjax', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'id=' + encodeURIComponent(id) + '&remove=1'
      })
      .then(res => res.json())
      .then(data => {
        var li = document.querySelector('.cart-qty-form[data-id="' + id + '"]').closest('.cart-item');
        if (li) li.remove();
        document.getElementById('cart-total').innerHTML = 'Tổng tiền: ' + data.cart_total + ' VND';
        if (data.cart_qty !== undefined && document.getElementById('cart-badge')) {
          document.getElementById('cart-badge').textContent = data.cart_qty;
        }
        if (data.cart_qty == 0) location.reload();
      });
  }
</script>
<?php include 'app/views/shares/footer.php'; ?>