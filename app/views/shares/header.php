<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý sản phẩm</title>
  <link
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <style>
    .navbar,
    .dropdown-menu {
      transition: box-shadow 0.3s cubic-bezier(.25, .8, .25, 1), transform 0.3s;
    }

    .navbar:hover,
    .dropdown-menu:hover {
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18), 0 3px 8px rgba(0, 0, 0, 0.12);
      transform: scale(1.01) perspective(800px) rotateY(2deg);
    }

    .dropdown-item:hover {
      background: linear-gradient(90deg, #e0e7ff 60%, #f8fafc 100%);
      color: #4f46e5 !important;
      transform: translateX(4px) scale(1.04);
      transition: all 0.2s;
    }

    .navbar-glass {
      background: rgba(255, 255, 255, 0.18) !important;
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      border-bottom: 1.5px solid rgba(255, 255, 255, 0.18);
      transition: box-shadow 0.3s cubic-bezier(.25, .8, .25, 1), transform 0.3s;
    }

    .navbar-glass:hover {
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18), 0 3px 8px rgba(0, 0, 0, 0.12);
      transform: scale(1.01) perspective(800px) rotateY(2deg);
    }

    .navbar .nav-link,
    .navbar .navbar-brand {
      color: #2d3748 !important;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: color 0.2s;
    }

    .navbar .nav-link:hover,
    .navbar .navbar-brand:hover {
      color: #6366f1 !important;
    }

    .badge-danger {
      background: linear-gradient(90deg, #ef4444 60%, #f87171 100%);
      color: #fff;
      font-weight: bold;
      font-size: 1rem;
      box-shadow: 0 2px 8px #ef444444;
    }

    .dropdown-menu {
      background: rgba(255, 255, 255, 0.22) !important;
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      border: 1.5px solid rgba(255, 255, 255, 0.22);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18), 0 1.5px 4px rgba(0, 0, 0, 0.08);
      color: #2d3748;
      transition: box-shadow 0.3s cubic-bezier(.25, .8, .25, 1), transform 0.3s;
    }

    .dropdown-menu .dropdown-item {
      color: #2d3748 !important;
      font-weight: 600;
      border-radius: 8px;
      margin-bottom: 2px;
      transition: background 0.2s, color 0.2s, transform 0.2s;
    }

    .dropdown-menu .dropdown-item:hover,
    .dropdown-menu .dropdown-item:focus {
      background: linear-gradient(90deg, #6366f1 20%, #38bdf8 80%);
      color: #fff !important;
      transform: translateX(4px) scale(1.04);
      text-shadow: 0 2px 8px #6366f144;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-glass shadow" style="border-radius: 0 0 18px 18px; box-shadow: 0 4px 24px rgba(0,0,0,0.10);">
    <a class="navbar-brand d-flex align-items-center" href="/ProjectBanHangCuaTu2/Home">
      <i class="fas fa-store fa-lg mr-2 text-primary"></i> <span style="font-weight:bold;">Quản lý sản phẩm</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="border-radius:8px;">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse animate__animated animate__fadeInDown" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown mx-2">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-boxes mr-1"></i> Sản phẩm
          </a>
          <div class="dropdown-menu shadow-lg animate__animated animate__fadeIn" aria-labelledby="productDropdown" style="border-radius:12px;">
            <a class="dropdown-item d-flex align-items-center" href="/ProjectBanHangCuaTu2/Product/">
              <i class="fas fa-list mr-2 text-info"></i> Danh sách sản phẩm
            </a>
            <a class="dropdown-item d-flex align-items-center" href="/ProjectBanHangCuaTu2/Product/add">
              <i class="fas fa-plus-circle mr-2 text-success"></i> Thêm sản phẩm
            </a>
          </div>
        </li>
        <li class="nav-item dropdown mx-2">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="categoryDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-layer-group mr-1"></i> Danh mục
          </a>
          <div class="dropdown-menu shadow-lg animate__animated animate__fadeIn" aria-labelledby="categoryDropdown" style="border-radius:12px;">
            <a class="dropdown-item d-flex align-items-center" href="/ProjectBanHangCuaTu2/Category/list">
              <i class="fas fa-list mr-2 text-info"></i> Danh sách danh mục
            </a>
            <a class="dropdown-item d-flex align-items-center" href="/ProjectBanHangCuaTu2/Category/add">
              <i class="fas fa-plus-circle mr-2 text-success"></i> Thêm danh mục
            </a>
          </div>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link d-flex align-items-center position-relative" href="/ProjectBanHangCuaTu2/Product/cart">
            <i class="fas fa-shopping-cart fa-lg mr-1 text-primary"></i> Giỏ hàng
            <span id="cart-badge" class="badge badge-danger position-absolute" style="top:2px;right:-18px;min-width:22px;">
              <?php echo !empty($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?>
            </span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container mt-4">
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js">
  </script>
  <script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
  </script>
</body>

</html>