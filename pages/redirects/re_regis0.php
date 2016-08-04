
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../loginMaterial/css/reset.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="../../loginMaterial/css/style.css">
  </head>
  <body>
  <?php
    $msgid = $_GET['id'];
  ?>
<div class="bg" id="superwrapper">
  <img src="../../loginMaterial/City.jpg" alt="">
  <div class="container">
    <div class="card"></div>
    <div class="card">
      <h1 id="titlelogin" class="title"><i class="fa fa-exclamation" aria-hidden="true"></i> Gagal</h1>
      <form method="" action="../../index.php">
        <div class="input-container" id="login">
          <h3 style="text-align:justify;">Registrasi akun baru telah gagal.</h3>
          <br/><br/>
          <?php
            switch ($msgid) {
              case 0:
                echo '<h3 style="text-align:justify;">Email telah terdaftar</h3>';
                break;
              case 1:
                echo '<h3 style="text-align:justify;">Harap lengkapi email dengan format penulisan yang tepat.<br/><br/>
                Contoh: email.anda@sp3sdepok.com</h3>';
                break;
              case 2:
                echo '<h3 style="text-align:justify;">Harap lengkapi form registrasi sebelum menekan tombol Daftar.</h3>';
                break;
              
              default:
                echo "No such message is here.";
                break;
            }
          ?>
          <br/><br/>
          <p style="text-align:justify;">Klik tombol dibawah untuk kembali ke halaman utama.</p>
          
        </div>
        <div class="button-container">
          <button><span>Kembali</span></button>
        </div>
        <!--div class="footer"><a href="#">Forgot your password?</a></div-->
      </form>
    </div>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="../../loginMaterial/js/index.js"></script>
  </body>
</html>
