<?php
  ob_start();
  session_start();
  if ($_SESSION['dota2_teams']['id']) {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>dota2 - Area Peserta</title>
    <meta name="description" content="dota2">
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
    <!--<link rel="icon" type="image/png" href="images/favicon.png">-->
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

    <section id="bglogin" ng-app="dota2App" ng-init="idTeam=<?php echo $_SESSION['dota2_teams']['id']; ?>" id="main">
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
                    <tr>
                      <th>Asal Sekolah</th>
                      <td><input ng-model="dataTeam.origin" type="text" name="origin" /></td>
                    </tr>
                    <tr>
                      <th>Kategori Lomba</th>
                      <td>{{ dataTeam.category.name }}</td>
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
                        Proposal
                      </th>
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
                      <th>SKM</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="member-list">
                    <tr ng-repeat="data in dataMembers" class="member">
                      <td>
                        <input ng-show="hideMember == data.id" ng-model="data.name" type="text" required />
                        <span ng-hide="hideMember == data.id">{{ data.name }}</span>
                      </td>
                      <td>
                        <a href="http://api.ifest-uajy.com/storage/media/{{ data.media_name }}" target="_blank">Lihat</a>
                      </td>
                      <td>
                        <button ng-hide="hideMember == data.id" ng-click="hidingUpdateMember(data.id)" type="button" class="btn">Sunting</button> <button ng-show="hideMember == data.id" ng-click="updateMember(data)" type="button" class="btn">{{ btnUpdate }}</button> <button ng-click="destroyMember(data.id)" type="button" class="btn delete-member {{ data.id }}">Hapus</button>
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
    $scope.infoProposal = "Pilih file untuk diunggah.";
    $scope.infoReceipt = "Pilih file untuk diunggah.";
    $scope.dataDetail = {};

    $scope.dataTeamLoaded = 0;
    $scope.dataMembersLoaded = 0;
    $scope.dataDetailsLoaded = 0;

    $scope.getTeam = function() {

      $http.get("http://api.ifest-uajy.com/v1/dota2/"+$scope.idTeam).then(function (response) {

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

    $scope.uploadProposal = function(file, errFiles) {
      $scope.proposal = file;
      $scope.errProposal = errFiles && errFiles[0];
      $scope.infoProposal = $scope.proposal.name;
    }

    $scope.uploadReceipt = function(file, errFiles, id) {
      $scope.receipt = file;
      $scope.errReceipt = errFiles && errFiles[0];

      if (id) {
        $('.receipt-info.'+id).text($scope.receipt.name);
      }else{
        $scope.infoReceipt= $scope.receipt.name;
      }
    }

    $scope.getDetail = function() {
      $http.get("http://api.ifest-uajy.com/v1/dota2/"+$scope.idTeam).then(function (response) {

        $scope.dataDetailsLoaded = 0;
        $('.details').remove();
        $('.new-details').remove();

        $scope.dataTeam = response.data.data;

        if ($scope.dataTeam.proposal != 0) {

          if ($scope.dataTeam.proposal != 0) {
            $http.get("http://api.ifest-uajy.com/v1/media/"+response.data.data.proposal).then(function (response) {
              $scope.dataTeam.proposal_name = response.data.data.file_name;
            });
          }
          if ($scope.dataTeam.receipt != 0) {
            $http.get("http://api.ifest-uajy.com/v1/media/"+response.data.data.receipt).then(function (response) {
              $scope.dataTeam.receipt_name = response.data.data.file_name;
            });
          }

          var row = angular.element('<tr class="details"><td><a href="http://api.ifest-uajy.com/storage/media/{{ dataTeam.proposal_name }}" target="_blank">Lihat</a></td><td><a ng-show="dataTeam.receipt != 0" href="http://api.ifest-uajy.com/storage/media/{{ dataTeam.receipt_name }}" target="_blank">Lihat</a><button ng-show="dataTeam.receipt == 0" type="file" ngf-select="uploadReceipt($file, $invalidFiles, dataTeam.id)" accept="image/*" ngf-max-size="10MB" class="btn">Unggah</button> <span ng-show="dataTeam.receipt == 0" class="receipt-info {{ dataTeam.id }}">Pilih file untuk diunggah</span></td><td><span ng-show="dataTeam.status == 0">Menunggu verifikasi</span><span ng-show="dataTeam.status == 1">Lolos</span></td><td><button ng-show="dataTeam.receipt == 0" ng-click="updateDetail(dataTeam.id)" type="button" class="btn update-detail {{ dataTeam.id }}">Simpan</button><button ng-show="dataTeam.status == 0" ng-click="destroyDetail(dataTeam.id)" type="button" class="btn delete-detail {{ dataTeam.id }}">Hapus</button></td></tr>');

          $('#detail-list').append(row);

          $compile(row)($scope);

        }else{

          var row = angular.element('<tr class="new-details"><td><button type="file" ngf-select="uploadProposal($file, $invalidFiles)" ngf-max-size="10MB" class="btn">Unggah</button> <span>{{ infoProposal }}</span></td><td></td><td></td><td><button ng-click="addDetail()" type="button" class="btn">{{ btnSave }}</button></td></tr>');

          $('#detail-list').append(row);

          $compile(row)($scope);
        }

        $scope.dataDetailsLoaded = 1;

      });
    }

    $scope.addDetail = function() {
      if ($scope.proposal) {

        $scope.btnSave = "Menyimpan...";

        $scope.proposal.upload = Upload.upload({
            url: 'http://api.ifest-uajy.com/v1/media',
            data: { media: $scope.proposal }
        }).then(function (response) {

          $scope.infoProposal = "Upload";
          $timeout(function() { $scope.infoProposal = "Pilih file untuk diunggah." }, 1000);
          $scope.dataDetail['proposal'] = response.data.data.id;
          $scope.addDetailProcess();
          $scope.proposal = "";
        });
      }else{
          $scope.infoDocument = "Unggah proposal terlebih dahulu";
          $scope.btnSave = "Simpan";
      }
    }

    $scope.addDetailProcess = function() {
      $http({
        method  : 'PATCH',
        url     : 'http://api.ifest-uajy.com/v1/dota2/'+$scope.idTeam,
        data    : $.param($scope.dataDetail),
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
       })
      .then(function(data) {
        $scope.btnSave = "Simpan";
        $scope.getDetail();
      });
    }

    $scope.updateDetail = function(id) {

      if ($scope.receipt) {

        $('.btn.update-detail.'+id).text('Menyimpan...');

        $scope.receipt.upload = Upload.upload({
            url: 'http://api.ifest-uajy.com/v1/media',
            data: { media: $scope.receipt }
        }).then(function (response) {

          $scope.dataDetail['receipt'] = response.data.data.id;

          $http({
            method  : 'PATCH',
            url     : 'http://api.ifest-uajy.com/v1/dota2/'+$scope.idTeam,
            data    : $.param($scope.dataDetail),
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
           })
          .then(function(data) {
            $('.btn.update-detail.'+id).text('Simpan');
            $('.receipt-info.'+id).text('Pilih file untuk diunggah');
            $scope.getDetail();
            $scope.receipt = "";
          });
        });
      }
    }

    $scope.destroyDetail = function(id) {

      $('.btn.delete-detail.'+id).text('Menghapus...');

      $scope.dataDetail['proposal'] = 0;
      $scope.dataDetail['receipt'] = 0;

      $http({
        method  : 'PATCH',
        url     : 'http://api.ifest-uajy.com/v1/dota2/'+$scope.idTeam,
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
        url     : 'http://api.ifest-uajy.com/v1/dota2/'+$scope.idTeam,
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
      $http.get("http://api.ifest-uajy.com/v1/dota2/"+$scope.idTeam+'/members').then(function (response) {
        if (response.data.data) {
          $scope.dataMembers = response.data.data;
        }else{
          $scope.dataMembers = 0;
        }
        $scope.dataMembersLoaded = 1;

        angular.forEach($scope.dataMembers, function(value, key) {
          $http.get("http://api.ifest-uajy.com/v1/media/"+value.student_id_scan).then(function (response) {
            value.media_name = response.data.data.file_name;
          });
        });

        $('.new-member').remove();

        var count = $scope.dataMembers.length;

        if (count != 5) {
          var row = angular.element('<tr class="new-member"><td><input ng-model="newMembers.members[0][\'name\']" type="text" required="" /><br><span>{{ infoFullName }}</span></td><td><button type="file" ngf-select="uploadFiles($file, $invalidFiles)" accept="image/*" ngf-max-size="10MB" class="btn">Unggah</button><br><span>{{ infoMedia }}</span></td><td><button ng-click="addMembers()" type="button" class="btn">{{ btnSave }}</button></tr>');
          $('#member-list').append(row);
          $compile(row)($scope);
        }
      });
    }

    $scope.addMembers = function() {

      if ($scope.newMembers.members) {

        $scope.infoFullName = "";

        if ($scope.media) {

          $scope.btnSave = "Menyimpan...";

          $scope.media.upload = Upload.upload({
              url: 'http://api.ifest-uajy.com/v1/media',
              data: {media: $scope.media}
          });

          $scope.media.upload.then(function (response) {

            $scope.newMembers.members[0]["media_id"] = 0;
            $scope.newMembers.members[0]["student_id_scan"] = response.data.data.id;

            $http({
              method  : 'POST',
              url     : 'http://api.ifest-uajy.com/v1/dota2/'+$scope.idTeam+'/members',
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

        }else{
          $scope.infoMedia = "Unggah kartu identitas!";
        }

      }else{
        $scope.infoFullName = "Isi nama lengkap!";
      }
    }

    $scope.updateMember = function(data) {

      $scope.btnUpdate = "Menyimpan...";

      $http({
        method  : 'PATCH',
        url     : 'http://api.ifest-uajy.com/v1/dota2/'+$scope.idTeam+'/members/'+data.id,
        data    : $.param(data),
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
       })
      .then(function(data) {
        $scope.hideMember = false;
        $scope.btnUpdate = "Simpan";
      });
    }

    $scope.hidingUpdateMember = function(id) {
      $scope.hideMember = id;
    }

    $scope.destroyMember = function(id) {

      $('.btn.delete-member.'+id).text('Menghapus...');

      $http.delete('http://api.ifest-uajy.com/v1/dota2/'+$scope.idTeam+'/members/'+id).then(function (response) {
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
