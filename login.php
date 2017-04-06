<?php
  error_reporting(0);
  ob_start();
  session_start();
  if (!$_SESSION['dota_teams']['id']) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>DOTA 2 Competition - Masuk Area Peserta</title>
  <meta name="description" content="DOTA 2 Competition">
  <meta name="author" content="Panitia IFEST #5 UAJY">
  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="vertical-timeline/css/style.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/mobile.css">
  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="scrollreveal-master/dist/scrollreveal.js"></script>
  <script src="scrollreveal-master/dist/scrollreveal.min.js"></script>
  <link rel="icon" type="image/png" href="images/favicon.png">
  <script>
    window.sr = ScrollReveal();
  </script>

 </head>
<body >

<!-- Primary Page Layout
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<section id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="twelve columns">
                <center>
                <a href="http://ifest-uajy.com" class="site-title">
                    <img src=logo-ifest.png><h1>Informatics Festival #5</h1>
                </a>
            </center>
            </div>
        </div>
    </div>
</section>
<section id="site-menu" class="site-menu">
    <div class="container">
        <div class="row">
            <div class="twelve columns">
                <a href="index.html"><img class="logo" src="Logo-Dota.png"></a>
                <div class="hamburger"><span><span class="openbtn" onclick="openNav()">&#9776;</span><span class="closebtn" onclick="closeNav()" >&#735;</span></span> <a href="#"><img class="logo2" src="Logo-Dota.png"></a></div>
                <nav class="menu" id="menu">
                    <ul>
                        <li><a class="menu-link" onclick="closeNav()" href="index.html#opening">Home</a></li>
                        <li><a class="menu-link" onclick="closeNav()" href="index.html#bab1" >Tentang</a></li>
                        <li><a class="menu-link" onclick="closeNav()" href="index.html#bab2" >Hadiah</a></li>
                        <li><a class="menu-link" onclick="closeNav()" href="index.html#bab3" >Registrasi</a></li>
                        <li><a class="menu-link" onclick="closeNav()" href="area-peserta.php" >Area Peserta</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<section id="isi">
    <section id="opening3">
        <div class="container">
            <div class="row">
                <section id="pendaftaran" class="pendaftaran_berhasil">
                            <div class="twelve columns kanan" >
                                
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html">
                                        Home
                                        </a>
                                    </li>
                                    <li class="active">
                                        Login
                                    </li>
                                </ol>
                            </div>

                </section>

                <div ng-app="loginApp" ng-controller="loginCtrl" class="twelve columns">
                <form ng-submit="loginSubmit()">

                    <center class="teks warna">
                    <div class="lebarB2">
                        <h1 style="color: #D51D14;">Masuk Area Peserta</h1>
                    <div class="pemberitahuan"><label><b>Email</b></label>
                    <input ng-model="formData.email" type="email" placeholder="Enter Email" name="email" required>

                    <label><b>Password</b></label>
                    <input ng-model="formData.password" type="password" placeholder="Enter Password" name="password" required>
                    <br/>

                    <div class="btn4-change">
                      <!--<button type="button" class="cancelbtn btn4">Cancel</button>-->
                      <button ng-disabled="button == 'MASUK...'" type="submit" class="btn">{{ button }}</button>
                    </div>

                    <span ng-show="errors">{{ errors }}</span>

                    </center>

                </form>
</div>
        </div>
    </section>
    <section id="penutup">
        <div class="container">
            <div class="row">
                <div class="six columns">
                    <center><h3 >CONTACT PERSON</h3></center><br/><ul class="bullet"><li>Frentzen (08156593279 / id line:frentz)</li><li>Dio (0878-3992-2155)</li></ul>
                </div>
                <div class="six columns">
                    <center><h3>Follow Us</h3></center><br/>
                    <center class="gambar"><a href="http://line.me/ti/p/~@ykb1847q"><img src="./images/ln.png" ></a><a href="https://www.instagram.com/ifest_uajy/"><img src="./images/ins.png" ></a></center>
                </div>
            </div>
        </div>
    </section>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
   <script>
     //- hljs.initHighlightingOnLoad();


     sr.reveal( "#penutup .columns", { reset: true, viewOffset: { top: 64 } } );
         sr.reveal( "#opening2 ", { reset: true, viewOffset: { top: 64 } } );
     function addCommasToNum( num ){
       return num.toString().replace( /\B(?=(\d{3})+(?!\d))/g, "," );
     }

   </script>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="js/style.js"></script>
<script src="js/menu.js"> </script>
<script src="vertical-timeline/js/main.js"></script>
<script src="vertical-timeline/js/modernizr.js"></script>

<script type="text/javascript" src="bower_components/angular/angular.min.js"></script>
<script>

function httpInterceptor() {
  return {
    request: function(config) {
      return config;
    },

    requestError: function(config) {
      return config;
    },

    response: function(res) {
      return res;
    },

    responseError: function(res) {
      return res;
    }
  }
}

var loginApp = angular.module("loginApp", [])
  .factory('httpInterceptor', httpInterceptor)
  .config(function($httpProvider) {
    $httpProvider.interceptors.push('httpInterceptor');
  });

loginApp.controller("loginCtrl", function($scope, $http, $window) {

  $scope.formData = {};
  $scope.errors = "";

  $scope.button = "MASUK";

  $scope.loginSubmit = function () {

    $scope.errors = "";

    $scope.button = "MASUK...";

    $http({
      method  : 'POST',
      url     : 'http://127.0.0.1:8000/v1/dota/login',
      data    : $.param($scope.formData),
      headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
     })
    .then(function(response) {
      switch (response.status) {
        case 404:
          $scope.errors = response.data.errors;
          $scope.button = "MASUK";
        break;
        case 500:
          $scope.errors.ise = "Mohon maaf terdapat kesalahan di bagian server.";
          $scope.button = "MASUK";
          break;
        default:
          $scope.button = "MASUK...";

          $http({
            method  : 'POST',
            url     : 'proses-login.php',
            data    : $.param({ id: response.data.data.id }),
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
          }).then(function(data) {
            $window.location.href = 'area-peserta.php';
          });
      }
    });
  }
});

</script>

</body>
</html>

<?php
  }else{
    header("location: area-peserta.php");
  }
?>
