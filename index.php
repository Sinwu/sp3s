
<!DOCTYPE html>
<html >
  <head>
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
    <meta charset="UTF-8">
    <!-- Define Favicon -->
    <title>SP3S Depok</title>
    <link rel="shortcut icon" href="dist/img/logo.png" type="image/png"/>
    <link rel="stylesheet" href="loginMaterial/css/reset.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="loginMaterial/css/style.css">
  </head>

  <body>
<div class="bg" id="superwrapper">
  <img src="loginMaterial/City.jpg" alt="">
  <div class="container">
    <div class="card"></div>
    <div class="card">
      <h1 id="titlelogin" class="title"><!--div id="logo"><img src="dist/img/title-logo.png" style="width:20px;height:100px;"></div-->LOGIN</h1>
      <form method="POST" action="login.php">
        <div class="input-container" id="login">
          <input name="email" type="text" id="Username" required />
          <label for="Username">Email</label>
          <div class="bar"></div>
        </div>
        <div class="input-container" id="login">
          <input name="pass" type="password" id="Password" required />
          <label for="Password">Kata Sandi</label>
          <div class="bar"></div>
        </div>
        <div class="button-container">
          <button><span>Masuk !</span></button>
        </div>
        <!--div class="footer"><a href="#">Forgot your password?</a></div-->
      </form>
    </div>
    <div class="card alt">
      <!-- Regis Here Note -->
      <div class="regishere"><table style="width:100%">
        <table>
          <tr>
            <th>Registrasi</th>
            <th style="vertical-align: bottom;" rowspan="2"><i class="fa fa-hand-o-down fa-2x" aria-hidden="true"></i></th>
          </tr>
          <tr>
            <td>Baru</td>
          </tr>
        </table>
      </div>
      <!-- /Regis Here Note -->
      <div class="toggle"></div>
      <h1 id="titleregis" class="title">Registrasi
        <div class="close"></div>
      </h1>
      <form method="POST" action="regis.php">
        <div class="input-container" id="regis">
          <input name="email" type="text" id="Email" required="required"/>
          <label for="Email">Email</label>
          <div class="bar"></div>
        </div>
        <div class="input-container" id="regis">
          <input name="nama" type="text" id="Username" required="required"/>
          <label for="Username">Nama</label>
          <div class="bar"></div>
        </div>
        <div class="input-container" id="regis">
          <input name="pass" type="password" id="Password" required="required"/>
          <label for="Password">Kata Sandi</label>
          <div class="bar"></div>
        </div>
        <div class="input-container" id="regis">
          <input name="pass2" type="password" id="Repeat Password" required="required"/>
          <label for="Repeat Password">Ulangi Kata Sandi</label>
          <div class="bar"></div>
        </div>
        <div class="input-container" id="regis">
          <input name="kode_unik" type="text" id="Unique Key" required="required"/>
          <label for="Unique Key">Kode Unik</label>
          <div class="bar"></div>
        </div>
        <div class="button-container">
          <button><span>Daftar</span></button>
        </div>
      </form>
    </div>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="loginMaterial/js/index.js"></script>
  </body>
</html>
