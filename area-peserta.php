<?php
  ob_start();
  session_start();
  if ($_SESSION['dota_teams']['id']) {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>DOTA 2 Competition - Area Peserta</title>
    <meta name="description" content="DOTA 2 Competition">
    <meta name="author" content="Panitia IFEST #5 UAJY">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css">

    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png">
  </head>
  <body>
    <section id="site-menu" class="site-menu putih">
        <div class="container">
            <div class="row">
                <div class="twelve columns">
                  <a href="index.html">
                      <img class="logo" src="logo-Dota.png" alt="" />
                  </a>
                  <a class="logout" href="logout.php">Log Out</a>
                </div>
            </div>
        </div>
    </section>

    <section id="bglogin" ng-app="dota2App" ng-init="idTeam=<?php echo $_SESSION['dota_teams']['id']; ?>" id="main">
      <div ng-controller="dataTeamCtrl" class="container">
        <div class="row">
          <div class="eight columns">
            <div class="box">
              <div class="box-body">

              <div>
                <h5>Data Tim</h5>
                <form ng-show="dataTeamLoaded" ng-submit="updateTeam()">
                  <table>
                    <tr>
                      <th>Nama Tim</th>
                      <td><input ng-model="dataTeam.name" type="text" name="name" required /></td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td><input ng-model="dataTeam.email" type="email" name="email" required /></td>
                    </tr>
                    <tr>
                      <th>No. HP</th>
                      <td><input ng-model="dataTeam.phone" type="text" name="phone" required /></td>
                    </tr>
                  </table>
                  <button type="submit" class="btn">{{ button }}</button>
                </form>

                <p ng-hide="dataTeamLoaded">Sedang mengambil data dari server. Mohon tunggu sebentar ya...</p>
                </div>

                <br>

                <div>
                <h5>Detail</h5>
                <table ng-show="dataDetailsLoaded" class="table">
                  <thead>
                    <tr>
                      <th>
                        Bukti Pembayaran
                      </th>
                      <th>
                        Status
                      </th>
                      <th>

                      </th>
                    </tr>
                  </thead>
                  <tbody id="detail-list">

                  </tbody>
                </table>

                <p ng-hide="dataDetailsLoaded">Sedang mengambil data dari server. Mohon tunggu sebentar ya...</p>
                </div>

                <br>

                <div ng-controller="dataMembersCtrl">
                <h5>Data Anggota</h5>
                <table ng-show="dataMembersLoaded" class="table">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>ID Steam</th>
                      <th>Peran</th>
                      <th>Identitas</th>                      
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="member-list">
                    <tr ng-repeat="data in dataMembers" class="member">
                      <td>
                        <input ng-show="hideMember == data.id" ng-model="data.full_name" type="text" required style="width: 150px;" />
                        <span ng-hide="hideMember == data.id">{{ data.full_name }}</span>
                      </td>
                      <td>
                        <input ng-show="hideMember == data.id" ng-model="data.steam_id" type="text" required />
                        <span ng-hide="hideMember == data.id">{{ data.steam_id }}</span>
                      </td>
                      <td>
                        <select ng-show="hideMember == data.id && data.role != 'Captain'" ng-model="data.role" style="width: 100px;">
                          <option value="Member">Anggota</option>
                          <option value="Substitute">Cadangan</option>
                        </select>
                        <span ng-hide="hideMember == data.id && data.role != 'Captain'">{{ data.role }}</span>
                      </td>
                      <td>
                        <a ng-show="data.media_id" href="http://127.0.0.1:8000/storage/media/{{ data.media_name }}" target="_blank">Lihat</a>
                        <div ng-show="data.role == 'Captain' && !data.media_id">
                          <button type="file" ngf-select="uploadFiles($file, $invalidFiles)" accept="image/*" ngf-max-size="10MB" class="btn">Unggah</button>
                          <br>
                          <span>{{ infoMedia }}</span>
                        </div>
                      </td>
                      <td>
                        <button ng-hide="hideMember == data.id || !data.media_id" ng-click="hidingUpdateMember(data.id)" type="button" class="btn">Sunting</button>
                        <button ng-show="hideMember == data.id || (data.role == 'Captain' && !data.media_id)" ng-click="updateMember(data)" type="button" class="btn">{{ btnUpdate }}</button>
                        <button ng-hide="data.role == 'Captain'" ng-click="destroyMember(data.id)" type="button" class="btn delete-member {{ data.id }}">Hapus</button>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <p ng-hide="dataMembersLoaded">Sedang mengambil data dari server. Mohon tunggu sebentar ya...</p>
                </div>

              </div>
            </div>
          </div>
          <div class="four columns">
            <div class="box">
              <div class="box-header">
                <h5>Pengumuman</h5>
              </div>
              <div class="box-body">
                <p>Kecepatan koneksi internet mempengaruhi cepatnya data ditampilkan. Apabila data belum tertampil, silakan muat ulang halaman.</p>
                <p>Kami menyarankan menggunakan browser Mozilla Firefox</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Document
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
 </body>
</html>

<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/angular/angular.min.js"></script>
<script type="text/javascript" src="bower_components/ng-file-upload-shim/ng-file-upload-shim.min.js"></script>
<script type="text/javascript" src="bower_components/ng-file-upload/ng-file-upload.min.js"></script>

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

  var app = angular.module('dota2App', ['ngFileUpload'])
    .factory('httpInterceptor', httpInterceptor)
    .config(function($httpProvider) {
      $httpProvider.interceptors.push('httpInterceptor');
    });

  app.controller('dataTeamCtrl', function($scope, $http, $compile, $timeout, Upload) {

    $scope.dataTeam = {}; 
    $scope.errors = {};
    $scope.status = "";
    $scope.button = "Simpan";
    $scope.dataTeam = {};

    $scope.btnSave = "Simpan";
    $scope.infoMedia = "Pilih file untuk diunggah.";
    $scope.dataDetail = {};

    $scope.dataTeamLoaded = 0;
    $scope.dataMembersLoaded = 0;
    $scope.dataDetailsLoaded = 0;

    $scope.getTeam = function() {

      $http.get("http://api.ifest-uajy.com/v1/dota/"+$scope.idTeam).then(function (response) {

        $scope.dataTeamLoaded = 0;
        $scope.dataTeam = response.data.data;
        $scope.dataTeamLoaded = 1;
        if ($scope.dataTeam.status == 0) {
          $scope.status = "Tidak Aktif";
        }else{
          $scope.status = "Aktif";
        }

      });
    }

    $scope.uploadMedia = function(file, errFiles, id) {
      $scope.media = file;
      $scope.errMedia = errFiles && errFiles[0];
      $scope.infoMedia= $scope.media.name;
    }

    $scope.getDetail = function() {
      $http.get("http://api.ifest-uajy.com/v1/dota/"+$scope.idTeam).then(function (response) {

        $scope.dataDetailsLoaded = 0;
        $('.details').remove();
        $('.new-details').remove();

        $scope.dataTeam = response.data.data;

        if ($scope.dataTeam.media_id) {

            $http.get("http://api.ifest-uajy.com/v1/media/"+response.data.data.media_id).then(function (response) {
              $scope.dataTeam.media_name = response.data.data.file_name;
            });

          var row = angular.element('<tr class="details"><td><a href="http://127.0.0.1:8000/storage/media/{{ dataTeam.media_name }}" target="_blank">Lihat</a><td><span ng-show="dataTeam.status == 0">Tidak lolos</span><span ng-show="dataTeam.status == NULL">Menunggu verifikasi</span><span ng-show="dataTeam.status == 1">Lolos</span></td><td><button ng-show="dataTeam.status != 1" ng-click="destroyDetail(dataTeam.id)" type="button" class="btn delete-detail {{ dataTeam.id }}">Hapus</button></td></tr>');

          $('#detail-list').append(row);

          $compile(row)($scope);

        }else{

          var row = angular.element('<tr class="new-details"><td><button type="file" ngf-select="uploadMedia($file, $invalidFiles)" ngf-max-size="10MB" class="btn">Unggah</button> <span>{{ infoMedia }}</span></td><td></td><td><button ng-click="addDetail()" type="button" class="btn">{{ btnSave }}</button></td></tr>');

          $('#detail-list').append(row);

          $compile(row)($scope);
        }

        $scope.dataDetailsLoaded = 1;

      });
    }

    $scope.addDetail = function() {
      if ($scope.media) {

        $scope.btnSave = "Menyimpan...";

        $scope.media.upload = Upload.upload({
            url: 'http://api.ifest-uajy.com/v1/media',
            data: { media: $scope.media }
        }).then(function (response) {

          $scope.infoMedia = "Upload";
          $timeout(function() { $scope.infoMedia = "Pilih file untuk diunggah." }, 1000);
          $scope.dataDetail['media_id'] = response.data.data.id;
          $scope.addDetailProcess();
          $scope.media = "";
        });
      }else{
          $scope.infoDocument = "Unggah proposal terlebih dahulu";
          $scope.btnSave = "Simpan";
      }
    }

    $scope.addDetailProcess = function() {
      $http({
        method  : 'PATCH',
        url     : 'http://api.ifest-uajy.com/v1/dota/'+$scope.idTeam,
        data    : $.param($scope.dataDetail),
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
       })
      .then(function(data) {
        $scope.btnSave = "Simpan";
        $scope.getDetail();
      });
    }

    $scope.destroyDetail = function(id) {

      $('.btn.delete-detail.'+id).text('Menghapus...');

      $scope.dataDetail['media_id'] = 0;

      $http({
        method  : 'PATCH',
        url     : 'http://api.ifest-uajy.com/v1/dota/'+$scope.idTeam,
        data    : $.param($scope.dataDetail),
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
       })
      .then(function(data) {
        $scope.getDetail();
      });
    }

    $scope.getTeam();
    $scope.getDetail();

    $scope.updateTeam = function () {

      $scope.errors = {};
      $scope.button = "Menyimpan..."

      $http({
        method  : 'PATCH',
        url     : 'http://api.ifest-uajy.com/v1/dota/'+$scope.idTeam,
        data    : $.param($scope.dataTeam),
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
       })
      .then(function(response) {
        switch (response.status) {
          case 400:
            $scope.errors = response.data.errors;
            $scope.button = "Simpan";
          break;
          case 500:
            $scope.errors.ise = "Mohon maaf terdapat kesalahan di bagian server.";
            $scope.button = "DAFTAR";
            break;
          default:
            $scope.button = "Tersimpan";
            $timeout(function() { $scope.button = "Simpan"; }, 1000);
        }
      });
    }

  });

  app.controller('dataMembersCtrl', function($scope, $http, $compile, $timeout, Upload) {

    $scope.dataMembers = {};
    $scope.newMembers = {};
    $scope.hideMember = false;
    $scope.errors = {};
    $scope.btnSave = "Simpan";
    $scope.btnUpdate = "Simpan";
    $scope.btnDelete = "Hapus";

    $scope.infoFullName = ""
    $scope.infoMedia = "Pilih file untuk diunggah.";


    $scope.uploadFiles = function(file, errFiles) {
        $scope.media = file;
        $scope.errMedia = errFiles && errFiles[0];
        $scope.infoMedia = $scope.media.name;
    }

    $scope.getMembers = function() {

      $scope.dataMembersLoaded = 0;
      $http.get("http://api.ifest-uajy.com/v1/dota/"+$scope.idTeam+'/members').then(function (response) {
        if (response.data.data && response.data.data.media_id) {
          $scope.dataMembers = response.data.data;
        }else{
          $scope.dataMembers = 0;
        }
        $scope.dataMembersLoaded = 1;

        angular.forEach($scope.dataMembers, function(value, key) {
          $http.get("http://api.ifest-uajy.com/v1/media/"+value.media_id).then(function (response) {
            value.media_name = response.data.data.file_name;
          });
        });

        $('.new-member').remove();

        var count = $scope.dataMembers.length;

        if (count != 5) {
          var row = angular.element('<tr class="new-member"><td><input ng-model="newMembers.members[0][\'full_name\']" type="text" required="" style="width: 125px" /><br><span>{{ infoFullName }}</span></td><td><input ng-model="newMembers.members[0][\'steam_id\']" type="text" required="" /><br><span>{{ infoSteamId }}</span></td><td><select ng-model="newMembers.members[0][\'role\']" style="width: 100px"><option value="Member">Anggota</option><option value="Substitute">Cadangan</option></select><br><span>{{ infoRole }}</span></td><td><button type="file" ngf-select="uploadFiles($file, $invalidFiles)" accept="image/*" ngf-max-size="10MB" class="btn">Unggah</button><br><span>{{ infoMedia }}</span></td><td><button ng-click="addMembers()" type="button" class="btn">{{ btnSave }}</button></tr>');
          $('#member-list').append(row);
          $compile(row)($scope);
        }
      });
    }

    $scope.addMembers = function() {

      if ($scope.newMembers.members) {
        if ($scope.newMembers.members[0]['full_name']) {
          $scope.infoFullName = "";
        }else{
          $scope.infoFullName = "Isi nama lengkap!";
        }

        if ($scope.newMembers.members[0]['steam_id']) {
          $scope.infoSteamId = "";
        }else{
          $scope.infoSteamId = "Isi id steam!";
        }

        if ($scope.newMembers.members[0]['role']) {
          $scope.infoRole = "";
        }else{
          $scope.infoRole = "Pilih peran!";
        }
      }else{
        $scope.infoFullName = "Isi nama lengkap!";
        $scope.infoSteamId = "Isi id steam!";
        $scope.infoRole = "Pilih peran!";
      }

      if (!$scope.infoFullName && !$scope.infoSteamId && !$scope.infoRole && $scope.media) {        

        $scope.btnSave = "Menyimpan...";

        $scope.media.upload = Upload.upload({
            url: 'http://api.ifest-uajy.com/v1/media',
            data: {media: $scope.media}
        });

        $scope.media.upload.then(function (response) {

          $scope.newMembers.members[0]['media_id'] = response.data.data.id;

          $http({
            method  : 'POST',
            url     : 'http://api.ifest-uajy.com/v1/dota/'+$scope.idTeam+'/members',
            data    : $.param($scope.newMembers),
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
           })
          .then(function(response) {
            switch (response.status) {
              case 400:
                $scope.errors = response.data.errors;
                $scope.btnSave = "Simpan";
              break;
              case 500:
                $scope.errors.ise = "Mohon maaf terdapat kesalahan di bagian server.";
                $scope.button = "DAFTAR";
                break;
              default:
                $scope.media = "";
                $scope.newMembers = {};
                $scope.btnSave = "Simpan";
                $scope.getMembers();
                $scope.infoMedia = "Pilih file untuk diunggah.";
            }
          });
        });

      }
    }

    $scope.updateMember = function(data) {

      if (data.role == 'Captain' && !data.media_id) {
        if ($scope.media) {

          $scope.btnUpdate = "Menyimpan...";

          $scope.media.upload = Upload.upload({
              url: 'http://api.ifest-uajy.com/v1/media',
              data: { media: $scope.media }
          }).then(function (response) {

            $scope.infoMedia = "Upload";
            $timeout(function() { $scope.infoMedia = "Pilih file untuk diunggah." }, 1000);
            data['media_id'] = response.data.data.id;
            data.new_capt = true;
            $scope.updateMemberProcess(data);
            $scope.media = "";

          });
        }else{
            $scope.btnSave = "Simpan";
        }
      }else{
        $scope.updateMemberProcess(data);
      }
    }

    $scope.updateMemberProcess = function(data) {

      $scope.btnUpdate = "Menyimpan...";

      $http({
        method  : 'PATCH',
        url     : 'http://api.ifest-uajy.com/v1/dota/'+$scope.idTeam+'/members/'+data.id,
        data    : $.param(data),
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
       })
      .then(function(response) {
        $scope.hideMember = false;
        $scope.btnUpdate = "Simpan";

        if (data.new_capt) {
          $scope.getMembers();
        }
      });
    }

    $scope.hidingUpdateMember = function(id) {
      $scope.hideMember = id;
    }

    $scope.destroyMember = function(id) {

      $('.btn.delete-member.'+id).text('Menghapus...');

      $http.delete('http://api.ifest-uajy.com/v1/dota/'+$scope.idTeam+'/members/'+id).then(function (response) {
        $scope.getMembers();
      })
      .then(function(data) {
        $('.btn.delete-member.'+id).text('Terhapus');
        $timeout(function() { $('.btn.delete-member.'+id).text('Hapus'); }, 1000);
      });
    }

    $scope.getMembers();

  });

</script>

<?php
  }else{
    header("location: login.php");
  }
?>
