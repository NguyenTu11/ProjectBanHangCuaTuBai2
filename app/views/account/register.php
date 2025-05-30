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

  .register-card {
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

  .register-title {
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

  .register-link {
    color: #6366f1;
    font-weight: 600;
    cursor: pointer;
    text-decoration: underline;
  }

  .select-role {
    border-radius: 10px;
    padding: 0.5rem 1rem;
    /* Giảm padding trên/dưới */
    border: 1.5px solid #c7d2fe;
    background: rgba(255, 255, 255, 0.7);
    color: #2d3748;
    font-size: 1.08rem;
    font-weight: 600;
    transition: border-color 0.2s, box-shadow 0.2s;
    margin-bottom: 18px;
    outline: none;
    appearance: none;
    -webkit-appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="gray" height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M7.293 7.293a1 1 0 011.414 0L10 8.586l1.293-1.293a1 1 0 111.414 1.414l-2 2a1 1 0 01-1.414 0l-2-2a1 1 0 010-1.414z"/></svg>');
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 1.2em;
    line-height: 1.5;
    height: auto;
  }

  .select-role:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 2px #6366f155;
    background: #fff;
    color: #2d3748;
  }

  .select-role option {
    font-weight: 600;
    color: #2d3748;
    background: #f3f4f6;
    border-radius: 8px;
    padding: 8px 0;
  }
</style>
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh;">
  <div id="registerCard" class="register-card animate__animated animate__fadeInRight">
    <form action="/ProjectBanHangCuaTu2/account/save" method="post" style="width:100%;">
      <div class="register-title"><i class="fas fa-user-plus"></i> Đăng ký</div>
      <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
      <input type="text" name="fullname" class="form-control" placeholder="Họ tên" required>
      <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
      <input type="password" name="confirmpassword" class="form-control" placeholder="Nhập lại mật khẩu" required>
      <select name="role" class="form-control mb-3 select-role" required>
        <option value="" disabled selected>🔰 Chọn vai trò</option>
        <option value="user">👤 Người dùng</option>
        <option value="admin">🛡️ Quản trị viên</option>
      </select>
      <button class="btn btn-3d w-100 mb-3" type="submit">Đăng ký</button>
      <div class="text-center mt-2">
        <span>Đã có tài khoản?</span>
        <a href="#" id="gotoLogin" class="register-link ml-2">Đăng nhập</a>
      </div>
    </form>
  </div>
</div>
<script>
  document.getElementById('gotoLogin').onclick = function(e) {
    e.preventDefault();
    var card = document.getElementById('registerCard');
    card.classList.remove('animate__fadeInLeft', 'animate__fadeInRight', 'animate__fadeOutLeft', 'animate__fadeOutRight');
    card.classList.add('animate__fadeOutLeft');
    setTimeout(function() {
      window.location.href = '/ProjectBanHangCuaTu2/account/login';
    }, 600);
  };
</script>
<?php include 'app/views/shares/footer.php'; ?>