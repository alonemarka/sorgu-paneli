<?php
require '../server/database.php';

$customCSS = array('<link href="../assets/plugins/apexcharts/apexcharts.css" rel="stylesheet">');

$customJAVA = array(
  '<script src="../assets/plugins/apexcharts/apexcharts.min.js"></script>',
  '<script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>',
  '<script src="../assets/js/pages/dashboard.js"></script>'
);

$page_title = 'Panel';

include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

$TotalAccountQry = $db->query("SELECT * FROM users");
$TotalAccountCount = $TotalAccountQry->rowCount();

$OnlineTimezone = date('d.m.y H:i');
$OnlineAccountQry = $db->query("SELECT * FROM users WHERE k_updatesync = '$OnlineTimezone'");
$OnlineCount = $OnlineAccountQry->rowCount();

$MembershipSSID = $_SESSION['GET_USER_SSID'];
$MemberhsipQuery = $db->query("SELECT * FROM users WHERE k_key = '$MembershipSSID'");

while ($MembershipData = $MemberhsipQuery->fetch()) {
  $Level = $MembershipData['k_rol'];
  $getNick = $MembershipData['k_adi'];
  $short = substr($MembershipData['k_time'], 0, 11);
  $short2 = str_replace("-", ".", $short);
  $endtime = $short2;
}
if ($Level == "1") {
  $membership = "Administrator";
} else {
  $membership = "Normal Üye";
}

?>
<style>
  .card-body {
    border: 1px solid #30363d;
    border-radius: 6px;
    border-color: #2d2d3f !important;
  }

  h9 {
    font-size: 16px !important;
  }
</style>
<div class="snow-container"><i class="snow" style="--sw-f: 1px;--sw-s: 5px;--sw-l: 54vw;--sw25-tx: 4rem;--sw75-tx: 2rem;--sw-d: 10.9s;--sw-t: 58s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 6px;--sw-l: 12vw;--sw25-tx: 3rem;--sw75-tx: 1rem;--sw-d: 2.9s;--sw-t: 29s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 6px;--sw-l: 9vw;--sw25-tx: -4rem;--sw75-tx: -2rem;--sw-d: 9.2s;--sw-t: 21s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 4px;--sw-l: 3vw;--sw25-tx: -3rem;--sw75-tx: -2rem;--sw-d: 1.3s;--sw-t: 43s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 3px;--sw-l: 51vw;--sw25-tx: -3rem;--sw75-tx: 4rem;--sw-d: 10.0s;--sw-t: 56s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 8px;--sw-l: 54vw;--sw25-tx: 2rem;--sw75-tx: 4rem;--sw-d: 9.1s;--sw-t: 23s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 4px;--sw-l: 57vw;--sw25-tx: 3rem;--sw75-tx: 1rem;--sw-d: 9.7s;--sw-t: 38s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 6px;--sw-l: 8vw;--sw25-tx: 0rem;--sw75-tx: 3rem;--sw-d: 1.4s;--sw-t: 19s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 8px;--sw-l: 46vw;--sw25-tx: 0rem;--sw75-tx: -1rem;--sw-d: 1.7s;--sw-t: 15s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 3px;--sw-l: 37vw;--sw25-tx: 4rem;--sw75-tx: -2rem;--sw-d: 4.4s;--sw-t: 10s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 8px;--sw-l: 71vw;--sw25-tx: 3rem;--sw75-tx: 3rem;--sw-d: 3.0s;--sw-t: 47s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 3px;--sw-l: 83vw;--sw25-tx: 1rem;--sw75-tx: -3rem;--sw-d: 8.1s;--sw-t: 49s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 5px;--sw-l: 94vw;--sw25-tx: -3rem;--sw75-tx: -3rem;--sw-d: 1.1s;--sw-t: 18s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 3px;--sw-l: 14vw;--sw25-tx: 1rem;--sw75-tx: -3rem;--sw-d: 4.4s;--sw-t: 54s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 6px;--sw-l: 33vw;--sw25-tx: -3rem;--sw75-tx: 2rem;--sw-d: 0.1s;--sw-t: 35s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 4px;--sw-l: 28vw;--sw25-tx: -1rem;--sw75-tx: 1rem;--sw-d: 1.6s;--sw-t: 17s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 7px;--sw-l: 35vw;--sw25-tx: 1rem;--sw75-tx: 4rem;--sw-d: 9.1s;--sw-t: 55s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 7px;--sw-l: 43vw;--sw25-tx: -2rem;--sw75-tx: 2rem;--sw-d: 9.3s;--sw-t: 25s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 8px;--sw-l: 72vw;--sw25-tx: 4rem;--sw75-tx: -3rem;--sw-d: 10.2s;--sw-t: 10s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 6px;--sw-l: 100vw;--sw25-tx: -2rem;--sw75-tx: 1rem;--sw-d: 4.4s;--sw-t: 32s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 4px;--sw-l: 86vw;--sw25-tx: -2rem;--sw75-tx: -2rem;--sw-d: 7.6s;--sw-t: 45s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 5px;--sw-l: 29vw;--sw25-tx: -2rem;--sw75-tx: -1rem;--sw-d: 7.1s;--sw-t: 36s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 3px;--sw-l: 61vw;--sw25-tx: -1rem;--sw75-tx: 3rem;--sw-d: 1.0s;--sw-t: 18s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 6px;--sw-l: 18vw;--sw25-tx: 0rem;--sw75-tx: 0rem;--sw-d: 2.9s;--sw-t: 43s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 3px;--sw-l: 19vw;--sw25-tx: 2rem;--sw75-tx: 2rem;--sw-d: 2.9s;--sw-t: 19s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 5px;--sw-l: 1vw;--sw25-tx: -4rem;--sw75-tx: -3rem;--sw-d: 6.4s;--sw-t: 39s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 6px;--sw-l: 76vw;--sw25-tx: 0rem;--sw75-tx: -4rem;--sw-d: 3.8s;--sw-t: 54s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 8px;--sw-l: 49vw;--sw25-tx: -4rem;--sw75-tx: -3rem;--sw-d: 8.7s;--sw-t: 27s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 3px;--sw-l: 56vw;--sw25-tx: -1rem;--sw75-tx: -3rem;--sw-d: 4.4s;--sw-t: 55s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 6px;--sw-l: 2vw;--sw25-tx: -1rem;--sw75-tx: -4rem;--sw-d: 8.2s;--sw-t: 41s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 3px;--sw-l: 63vw;--sw25-tx: 0rem;--sw75-tx: -2rem;--sw-d: 4.1s;--sw-t: 31s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 5px;--sw-l: 84vw;--sw25-tx: 1rem;--sw75-tx: 0rem;--sw-d: 8.1s;--sw-t: 15s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 4px;--sw-l: 92vw;--sw25-tx: -4rem;--sw75-tx: 4rem;--sw-d: 5.5s;--sw-t: 53s;"></i><i class="snow" style="--sw-f: 1px;--sw-s: 8px;--sw-l: 33vw;--sw25-tx: -4rem;--sw75-tx: 0rem;--sw-d: 6.3s;--sw-t: 35s;"></i><i class="snow" style="--sw-f: 0px;--sw-s: 7px;--sw-l: 45vw;--sw25-tx: 1rem;--sw75-tx: 2rem;--sw-d: 4.9s;--sw-t: 35s;"></i>
</div>
<div class="main-wrapper">
  <div class="row">
    <div class="col-md-3">
      <div class="card stats-card">
        <div class="card-body">
          <div class="stats-info">
            <h9 class="card-title">Kayıtlı Kullanıcılar<span class="stats-change stats-change-info"></span></h9>
            <h4 class="stats-text"><?php echo $TotalAccountCount; ?></h4>
          </div>
          <div class="stats-icon change-danger" style="background-color: transparent !important;box-shadow: none;border: none;">
            <i class="material-icons">group</i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stats-card">
        <div class="card-body">
          <div class="stats-info">
            <h9 class="card-title">Aktif Kullanıcılar<span class="stats-change stats-change-success"></span></h9>
            <p class="stats-text"><?php echo $OnlineCount; ?></p>
          </div>
          <div class="stats-icon change-success" style="background-color: transparent !important;box-shadow: none;border: none;">
            <i class="material-icons">rocket_launch</i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stats-card">
        <div class="card-body">
          <div class="stats-info">
            <h9 class="card-title">Toplam Bakiye<span class="stats-change stats-change-success"></span></h9>
            <p class="stats-text"><?php echo "0 $"; ?></p>
          </div>
          <div class="stats-icon change-success" style="background-color: transparent !important;box-shadow: none;border: none;">
            <i class="material-icons">account_balance_wallet</i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stats-card">
        <div class="card-body">
          <div class="stats-info">
            <h9 class="card-title">Mevcut Üyeliğiniz<span class="stats-change stats-change-success"></span></h9>
            <p class="stats-text"><?= $membership; ?></p>
          </div>
          <div class="stats-icon change-success" style="background-color: transparent !important;box-shadow: none;border: none;">
            <i class="material-icons">card_membership</i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-body" style="border-radius: 4px !important;">
        <h5 style="font-size: 19px" class="card-title">Genel Sohbet</h5>
        <div id="chat-container">

        </div>
        <hr>
        <form id="chat-form">
          <input type="text" class="form-control" id="chat-message" autocomplete="off" maxlength="75" minlength="1" name="message" placeholder="Mesaj Giriniz" required>
          <div style="padding: 5px;"></div>
          <button type="submit" class="btn btn-primary">Gönder</button>
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
          $(function() {
            var chatContainer = $('#chat-container');
            var chatForm = $('#chat-form');
            var chatMessage = $('#chat-message');

            function fetchMessages() {
              $.ajax({
                url: 'pages/api/get_messages.php',
                type: 'GET',
                success: function(data) {
                  chatContainer.html(data);
                  chatContainer.scrollTop(chatContainer.prop('scrollHeight'));
                },
                error: function() {
                  console.log('error');
                }
              });
            }


            fetchMessages();
            setInterval(fetchMessages, 2000);

            chatForm.on('submit', function(event) {
              event.preventDefault();
              var message = chatMessage.val();
              $.ajax({
                url: 'pages/api/send_message.php',
                type: 'POST',
                data: {
                  message: message
                },
                success: function(response) {
                  if (response == "swear") {
                    toastr.error('Küfür etmek yasaktır.');
                  } else if (response == "limit") {
                    toastr.error("Hız limiti aşıldı, lütfen bir süre bekleyin.");
                  } else if (response == "numeric") {
                    toastr.error("Sohbetimizde sayısal veri kullanımına izin vermiyoruz.");
                  } else if (response == "special") {
                    toastr.error("Özel karakterler kullanılamaz.");
                  }
                  chatMessage.val('');
                },
                error: function() {
                  console.log('error');
                }
              });
            });
          });
        </script>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 style="font-size: 19px" class="card-title">Kurallar</h5>
          <div id="rules">
            <span>Hesabınızı başka birisi ile paylaştığınızda kalıcı bir şekilde banlanıcaksınız.</span>
            <div style="padding: 7px;"></div>
            <span>Ünlülere devlet yetkililerine sorgu atmak kesinlikle yasaktır.
              <div style="padding: 7px;"></div>
              <span>Başka birinin ucuza hesabı sattığı üyelikler, fark edilirse kalıcı şekilde ban yiyecektir.</span>
              <div style="padding: 7px;"></div>
              <span>Her hangi bir teknik sorunda iade geçilmez.</span>
              <div style="padding: 7px;"></div>
              <span>Ban yiyen kişiler tekrar üyelik satın alabilirler.</span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body" style="padding-bottom: 9vh;">
          <h5 style="font-size: 19px" class="card-title">Hesap Bilgileriniz</h5>
          <table id="01000001" class="display" style="width:100%;">
            <thead>
              <tr>
                <th>Kullanıcı Adı</th>
                <th>Kalan Zaman</th>
                <th>İşletim Sistemi</th>
                <th>Tarayıcı</th>
                <th>Son Giriş Tarihi</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $query = $db->query("SELECT * FROM `users` WHERE `k_key` = '$MembershipSSID'");

              while ($getvar = $query->fetch()) {

                $uyetarih = $getvar['k_time'];

                if ($uyetarih != "") {
                  $nowDate = date("Y-m-d");
                  $d1 = new DateTime($nowDate);
                  $d2 = new DateTime($uyetarih);
                  $gun = $d1->diff($d2)->days;
                }

              ?>
                <tr>
                  <td><?php echo $getvar['k_adi']; ?></td>
                  <td><?php echo $gun; ?> Gün</td>
                  <td>
                    <div class="platform_icon"><?php getos($getvar['k_os']) ?></div>
                  </td>
                  <td><?php echo $getvar['k_browser']; ?></td>
                  <td><?php echo $getvar['k_lastlogin']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Duyuru Paneli</h5>
          <div class="table-responsive">

            <table id="01000001" class="table table-hover" style="width:100%;">
              <thead>
                <tr>
                  <th style="padding: 15px;">İçerik</th>
                  <th style="padding: 15px;">Paylaşılan Tarih</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = $db->query("SELECT * FROM `news` LIMIT 3");
                while ($getvar = $query->fetch()) {
                  echo '
<tr><td style="padding: 15px;">' . $getvar['d_icerik'] . '</td>
<td style="padding: 15px;">' . $getvar['d_time'] . '</td>
';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="content py-3" style="position: static !important;">
  <div class="row fs-sm" style="position: static !important;">
    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
      <i class='fa fa fa-quote-left'></i> Courage leads to heaven, fear leads to death.</a>
    </div>
    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
      Panel Adı Checker © <span data-toggle="year-copy" class="js-year-copy-enabled"><?= date('Y'); ?></span>
    </div>
  </div>
</div>

<?php
include('inc/footer_main.php');
?>