<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url("/Asset/") ?>img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url("/Asset/") ?>css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/vendor/modernizr-2.8.3.min.js"></script>
</head>


<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

  <div class="color-line"></div>
  <div class="container-fluid">
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
      <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
        <div class="text-center custom-login">
          <hr>
          <h3>DAFTAR SEMBAKOKU</h3>
          <p>Daftar Sekarang Untuk Menjual Produkmu</p>
        </div>
        <div class="hpanel">
          <div class="panel-body">
            <form action="<?= base_url("Home/register_pros")?>" id="loginForm" method="POST" id="regist">
              <div class="row">
                <div class="form-group col-lg-12">
                  <label>Username / Nama Toko</label>
                  <input required class="form-control" name="username">
                </div>
                <div class="form-group col-lg-6">
                  <label>Email Address</label>
                  <input required class="form-control" name="email" type="email">
                </div>
                <div class="form-group col-lg-6">
                  <label>No Telp</label>
                  <input required class="form-control" name="no_telp" type="number" minlength="6">
                </div>
                <div class="form-group col-lg-6">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat"></textarea>
                </div>
                <div class="form-group col-lg-6">
                  <label>Password</label>
                  <input required type="password" class="form-control" name="password" id="password" minlength="8">
                </div>
                <div class="form-group col-lg-6">
                  <label>Reapet Password</label>
                  <input required type="password" class="form-control" name="password2" id="password2" minlength="8">
                  <em class="text text-danger" id="warning">Password Harus sama</em>
                </div>
              </div>
              <div class="text-center">
                <button id="submit" class="btn btn-success loginbtn">Daftar</button>
                <button class="btn btn-default">Cancel</button>
                <hr>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
    </div>
  </div>

    <!-- jquery
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= base_url("/Asset/") ?>js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/metisMenu/metisMenu.min.js"></script>
    <script src="<?= base_url("/Asset/") ?>js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/icheck/icheck.min.js"></script>
    <script src="<?= base_url("/Asset/") ?>js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?= base_url("/Asset/") ?>js/main.js"></script>


  <script>
  $("#password, #password2").keyup(
    function(){
      if($("#password").val() == $("#password2").val()){
        $("#warning").hide()
        $("#submit").prop("disabled", false)
      }else{
        $("#warning").show()
        $("#submit").prop("disabled", true)
      }
    }
  )
  </script>

</body>

</html>