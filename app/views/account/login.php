<?php include 'app/views/shares/header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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

  .login-card {
    background: rgba(255, 255, 255, 0.18);
    border-radius: 24px;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18), 0 1.5px 4px rgba(0, 0, 0, 0.08);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1.5px solid rgba(255, 255, 255, 0.25);
    transition: transform 0.4s cubic-bezier(.25, .8, .25, 1), box-shadow 0.4s;
    perspective: 900px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 420px;
    max-width: 420px;
    margin: 0 auto;
    animation: fadeInUp 0.7s;
    padding: 2.5rem 2rem;
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

  .btn-3d {
    box-shadow: 0 4px 0 #bdbdbd, 0 2px 12px #6366f133;
    transition: transform 0.18s, box-shadow 0.18s, background 0.18s, color 0.18s;
    border-radius: 10px;
    font-weight: 600;
    border: none;
    outline: none;
    background: linear-gradient(90deg, #6366f1 60%, #38bdf8 100%);
    color: #fff;
    min-width: 110px;
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

  .login-title {
    font-weight: bold;
    font-size: 1.35rem;
    color: #2d3748;
    margin-bottom: 18px;
    text-align: center;
  }

  .form-control {
    border-radius: 10px;
    margin-bottom: 18px;
    padding: 0.75rem 1rem;
    border: 1.5px solid #c7d2fe;
    background: rgba(255, 255, 255, 0.7);
    color: #2d3748;
    font-size: 1.08rem;
  }

  .form-control:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 2px #6366f155;
    background: #fff;
    color: #2d3748;
  }

  .login-link {
    color: #6366f1;
    font-weight: 600;
    cursor: pointer;
    text-decoration: underline;
  }
</style>
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh;">
  <div id="loginCard" class="login-card animate__animated animate__fadeInLeft">
    <form action="/ProjectBanHangCuaTu2/account/checklogin" method="post" style="width:100%;">
      <div class="login-title"><i class="fas fa-sign-in-alt"></i> Đăng nhập</div>
      <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
      <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
      <button class="btn btn-3d w-100 mb-3" type="submit">Đăng nhập</button>
      <div class="text-center mt-2">
        <span>Bạn chưa có tài khoản?</span>
        <a href="#" id="gotoRegister" class="login-link ml-2">Đăng ký</a>
      </div>
    </form>
  </div>
</div>
<script>
  document.getElementById('gotoRegister').onclick = function(e) {
    e.preventDefault();
    var card = document.getElementById('loginCard');
    card.classList.remove('animate__fadeInLeft', 'animate__fadeInRight', 'animate__fadeOutLeft', 'animate__fadeOutRight');
    card.classList.add('animate__fadeOutRight');
    setTimeout(function() {
      window.location.href = '/ProjectBanHangCuaTu2/account/register';
    }, 600);
  };
</script>
<?php include 'app/views/shares/footer.php'; ?>