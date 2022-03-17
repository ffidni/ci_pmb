
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/auth/')?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/auth/')?>css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/auth/')?>css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('assets/auth/')?>css/style.css">

    <title>Daftar Akun</title>
  </head>
  <body>
  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?= base_url('assets/auth/')?>images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Daftar Akun</h3>
              <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
            </div>
            <form action="<?= base_url("auth/registerProcess")?>" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username">
              </div>
              <br>
              <div class="form-group second">
                <label for="Email">Email</label>
                <input type="text" class="form-control" name="email">
              </div>
              <br>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
              </div>
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" value="Buat Akun" class="btn btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted">&mdash; Sudah punya akun? <a href="<?= base_url('auth/login')?>">Login</a> &mdash;</span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

    <script src="<?= base_url('assets/auth/')?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets/auth/')?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/auth/')?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/auth/')?>js/main.js"></script>
  </body>
</html>