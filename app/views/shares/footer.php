<footer class="footer-glass text-center text-lg-start mt-4 shadow" style="border-radius: 18px 18px 0 0; box-shadow: 0 -4px 24px rgba(0,0,0,0.10);">
  <div class="container p-4">
    <div class="row">
      <!-- Cột thông tin liên hệ -->
      <div class="col-lg-4 col-md-12 mb-4 text-left d-flex flex-column justify-content-center align-items-start">
        <h5 class="text-uppercase d-flex align-items-center">
          <i class="fas fa-store fa-lg mr-2 text-primary"></i> Quản lý sản phẩm
        </h5>
        <p>
          Hệ thống quản lý sản phẩm giúp bạn theo dõi và cập nhật thông tin sản phẩm, danh mục dễ dàng và hiện đại.
        </p>
      </div>
      <!-- Cột liên kết nhanh -->
      <div class="col-lg-4 col-md-6 mb-4 mx-auto d-flex flex-column justify-content-center align-items-center">
        <h5 class="text-uppercase"><i class="fas fa-link mr-2"></i>Liên kết nhanh</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a href="/ProjectBanHangCuaTu2/Product/" class="text-dark d-flex align-items-center footer-link">
              <i class="fas fa-boxes mr-2 text-info"></i> Danh sách sản phẩm
            </a>
          </li>
          <li>
            <a href="/ProjectBanHangCuaTu2/Product/add" class="text-dark d-flex align-items-center footer-link">
              <i class="fas fa-plus-circle mr-2 text-success"></i> Thêm sản phẩm
            </a>
          </li>
          <li>
            <a href="/ProjectBanHangCuaTu2/Category/list" class="text-dark d-flex align-items-center footer-link">
              <i class="fas fa-layer-group mr-2 text-info"></i> Danh sách danh mục
            </a>
          </li>
          <li>
            <a href="/ProjectBanHangCuaTu2/Category/add" class="text-dark d-flex align-items-center footer-link">
              <i class="fas fa-plus-circle mr-2 text-success"></i> Thêm danh mục
            </a>
          </li>
        </ul>
      </div>
      <!-- Cột mạng xã hội -->
      <div class="col-lg-4 col-md-6 mb-4 d-flex flex-column justify-content-center align-items-end">
        <h5 class="text-uppercase text-center w-100"><i class="fas fa-share-alt mr-2"></i>Kết nối với chúng tôi</h5>
        <div class="w-100 d-flex justify-content-center">
          <a href="https://www.facebook.com" class="text-dark mr-3 footer-social" title="Facebook" target="_blank">
            <i class="fab fa-facebook-f fa-lg"></i>
          </a>
          <a href="https://twitter.com" class="text-dark mr-3 footer-social" title="Twitter" target="_blank">
            <i class="fab fa-twitter fa-lg"></i>
          </a>
          <a href="https://www.instagram.com" class="text-dark mr-3 footer-social" title="Instagram" target="_blank">
            <i class="fab fa-instagram fa-lg"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Dòng bản quyền -->
  <div class="text-center p-3 copyright-glass">
    <span class="copyright-text">
      © 2025 Quản lý sản phẩm. All rights reserved.
    </span>
  </div>
</footer>
<style>
  .footer-glass {
    background: rgba(255, 255, 255, 0.18) !important;
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1.5px solid rgba(255, 255, 255, 0.18);
    transition: box-shadow 0.3s cubic-bezier(.25, .8, .25, 1), transform 0.3s;
  }

  .footer-glass:hover {
    box-shadow: 0 -8px 32px rgba(0, 0, 0, 0.18), 0 -3px 8px rgba(0, 0, 0, 0.12);
    transform: scale(1.01) perspective(800px) rotateY(-2deg);
  }

  .footer-link {
    transition: background 0.2s, color 0.2s, transform 0.2s;
    border-radius: 8px;
    padding: 4px 8px;
  }

  .footer-link:hover {
    background: linear-gradient(90deg, #e0e7ff 60%, #f8fafc 100%);
    color: #4f46e5 !important;
    transform: translateX(4px) scale(1.04);
    text-decoration: none;
  }

  .footer-social {
    transition: color 0.2s, transform 0.2s;
    border-radius: 50%;
    padding: 6px;
    display: inline-block;
  }

  .footer-social:hover {
    color: #6366f1 !important;
    background: #e0e7ff;
    transform: scale(1.15) rotateY(8deg);
    text-decoration: none;
  }

  .copyright-glass {
    background: rgba(255, 255, 255, 0.18);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border-radius: 0 0 18px 18px;
    border-top: 1.5px solid rgba(255, 255, 255, 0.22);
    box-shadow: 0 -2px 16px 0 rgba(31, 38, 135, 0.10);
    color: #fff;
    font-weight: 600;
    letter-spacing: 1px;
    font-size: 1.08rem;
    margin-top: -2px;
  }

  .copyright-text {
    background: linear-gradient(90deg, #6366f1 20%, #38bdf8 40%, #f472b6 70%, #facc15 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-fill-color: transparent;
    font-weight: bold;
    text-shadow: 0 2px 8px #6366f144;
  }
</style>
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>