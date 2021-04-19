<?php
include 'config.php';

if (isset($_POST['submit'])) {
  $from = $_GET['id'];
  $toUser = $_POST['to'];
  $amnt = $_POST['amount'];

  $sql = "SELECT * from users where id=$from";
  $query = mysqli_query($conn, $sql);
  $sql1 = mysqli_fetch_array($query);

  $sql = "SELECT * from users where id=$toUser";
  $query = mysqli_query($conn, $sql);
  $sql2 = mysqli_fetch_array($query);


  if ($amnt > $sql1['credits']) {

    echo "<script type='text/javascript'>
     alert('Insufficient Balance');
     
    </script>";
  } 
  else if ($amnt == 0) {
    echo "<script type='text/javascript'>
    alert('Enter Amount Greater than Zero');
    </script>";
  } else {

    $newCredit = $sql1['credits'] - $amnt;
    $sql = "UPDATE users set credits=$newCredit where id=$from";
    mysqli_query($conn, $sql);

    $newCredit = $sql2['credits'] + $amnt;
    $sql = "UPDATE users set credits=$newCredit where id=$toUser";
    mysqli_query($conn, $sql);

    $sender = $sql1['name'];
    $receiver = $sql2['name'];
    $sql = "INSERT INTO transaction(`sender`, `receiver`, `credits`) VALUES ('$sender','$receiver','$amnt')";
    $tns = mysqli_query($conn, $sql);
    if ($tns) {
      echo "<script type='text/javascript'>
                    alert('Transaction Successfull!');
                    window.location='transactionDetails.php';
                </script>";
    }
    $newCredit = 0;
    $amnt = 0;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>HSBC</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- site icons -->
<link rel="icon" href="images/fevicon/fevicon.png" type="image/gif" />
<!-- bootstrap css -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- Site css -->
<link rel="stylesheet" href="css/style.css" />
<!-- responsive css -->
<link rel="stylesheet" href="css/responsive.css" />
<!-- colors css -->
<link rel="stylesheet" href="css/colors1.css" />
<!-- custom css -->
<link rel="stylesheet" href="css/custom.css" />
<!-- wow Animation css -->
<link rel="stylesheet" href="css/animate.css" />
<link rel="icon" href="images/ic.png" type="image/icon type">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="generator" content="">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,600,700" rel="stylesheet">
</head>



  <?php
  require 'config.php';
  $query = "SELECT * FROM users";
  $result = mysqli_query($conn, $query);
  ?>
  <body>
 <!-- header top -->
  <div class="header_top">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="full">
            <div class="topbar-left">
              <ul class="list-inline">
                <li> <span class="topbar-label"><i class="fa  fa-home"></i></span> <span class="topbar-hightlight">540 Lorem Ipsum Mumbai, AB 90218</span> </li>
                <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="mailto:info@yourdomain.com">info@yourdomain.com</a></span> </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 right_section_header_top">
          <div class="float-left">
            <div class="social_icon">
              <ul class="list-inline">
                <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"></a></li>
                <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
                <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter" target="_blank"></a></li>
                <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn" target="_blank"></a></li>
                <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
              </ul>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <!-- end header top -->
  <!-- header bottom -->
  <div class="header_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
          <!-- logo start -->
          <div class="logo"> <a href="it_home.html"><img src="images/logos/it_logo.png" alt="logo" /></a> </div>
          <!-- logo end -->
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
          <!-- menu start -->
          <div class="menu_side">
            <div id="navbar_menu">
              <ul class="first-ul">
                <li> <a href="it_home.html">Home</a>
                  <ul>
                    <li><a href="it_home.html">It Home Page</a></li>
                    <li><a href="it_home_dark.html">It Dark Home Page</a></li>
                  </ul>
                </li>
                <li><a href="it_about.html">About Us</a></li>
                <li> <a href="it_service.html">Customer Details</a>
                  
                </li>
                <li class="propClone"><a href="transactionDetails.php">Transaction History</a></li>
                
               
              </ul>
            </div>
            
          </div>
          <!-- menu end -->
        </div>
      </div>
    </div>
  </div>
  <!-- header bottom end -->
</header>
<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Money Transfer</h1>
              <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Transaction History>Money Tranfer</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end inner page banner -->
    <?php
    include 'config.php';
    $sid = $_GET['id'];
    $sql = "SELECT * FROM  users where id=$sid";
    $query = mysqli_query($conn, $sql);
    if (!$query) {
      echo "Error " . $sql . "<br/>" . mysqli_error($conn);
    }
    $rows = mysqli_fetch_array($query);
    ?>
    <form method="post" name="tcredit" class="tabletext"><br />
      <label style="text-align: left;"> FROM: </label><br />
      <div>
        <table class="table table-striped table-bordered">
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Amount Transferred</th>
          </tr>
          <tr class="table-light">
            <td><?php echo $rows['id'] ?></td>
            <td><?php echo $rows['name'] ?></td>
            <td><?php echo $rows['email'] ?></td>
            <td><?php echo $rows['credits'] ?></td>
          </tr>
        </table>
      </div>
      <br />
      <label>TO:</label>
      <select class=" form-control" name="to" style="margin-bottom:5%;" required>
        <option value="" disabled selected> </option>
        <?php
        include 'config.php';
        $sid = $_GET['id'];
        $sql = "SELECT * FROM users where id!=$sid";
        $query = mysqli_query($conn, $sql);
        if (!$query) {
          echo "Error " . $sql . "<br/>" . mysqli_error($conn);
        }
        while ($rows = mysqli_fetch_array($query)) {
        ?>
          <option class="table text-center table-striped " value="<?php echo $rows['id']; ?>">

            <?php echo $rows['name']; ?>
            <!--(Credits:
                    <?php echo $rows['credits']; ?> )-->

          </option>
        <?php
        }
        ?>
      </select>
      <label>AMOUNT:</label>
      <input type="number" id="amm" class="form-control" name="amount" min="0" required /> <br />
      <div class="text-center btn3">
        <button class="button2" name="reset" type="reset" id="myBtn" style="margin:8px;">Reset</button>
        <button class="button2" name="submit" type="submit" id="myBtn" style="margin:8px;">Proceed</button>

      </div>
    </form>
  </div>

  <script>
    var d = new Date();
    document.getElementById("demo").innerHTML = d;
  </script>
  
<!-- footer -->
<footer class="footer_style_2">
  <div class="container-fuild">
    <div class="row">
      <div class="map_section">
        <div id="map"></div>
      </div>
      <div class="footer_blog">
        <div class="row">
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>It Next Theme</h2>
            </div>
            <p>Tincidunt elit magnis nulla facilisis. Dolor sagittis maecenas. Sapien nunc amet ultrices, dolores sit ipsum velit purus aliquet, massa fringilla leo orci.</p>
            <ul class="social_icons">
              <li class="social-icon fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li class="social-icon tw"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li class="social-icon gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>
          </div>
          
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>Contact us</h2>
            </div>
            <p>123 Gandhi road,<br>
              Mumbai, India<br>
              <span style="font-size:18px;"><a href="tel:+915684268523">+915684268523</a></span></p>
            <div class="footer_mail-section">
              <form>
                <fieldset>
                <div class="field">
                  <input placeholder="Email" type="text">
                  <button class="button_custom"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="cprt">
        <p>BBS © Copyrights 2021 Design by NEHA PATIL</p>
      </div>
    </div>
  </div>
</footer>
<!-- end footer -->
<!-- js section -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- menu js -->
<script src="js/menumaker.js"></script>
<!-- wow animation -->
<script src="js/wow.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
<script>

      // This example adds a marker to indicate the position 
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: {lat: 19.066909, lng: 72.877570},
      styles: [
               {
                 elementType: 'geometry',
                 stylers: [{color: '#fefefe'}]
               },
               {
                 elementType: 'labels.icon',
                 stylers: [{visibility: 'off'}]
               },
               {
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#616161'}]
               },
               {
                 elementType: 'labels.text.stroke',
                 stylers: [{color: '#f5f5f5'}]
               },
               {
                 featureType: 'administrative.land_parcel',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#bdbdbd'}]
               },
               {
                 featureType: 'poi',
                 elementType: 'geometry',
                 stylers: [{color: '#eeeeee'}]
               },
               {
                 featureType: 'poi',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#757575'}]
               },
               {
                 featureType: 'poi.park',
                 elementType: 'geometry',
                 stylers: [{color: '#e5e5e5'}]
               },
               {
                 featureType: 'poi.park',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#9e9e9e'}]
               },
               {
                 featureType: 'road',
                 elementType: 'geometry',
                 stylers: [{color: '#eee'}]
               },
               {
                 featureType: 'road.arterial',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#3d3523'}]
               },
               {
                 featureType: 'road.highway',
                 elementType: 'geometry',
                 stylers: [{color: '#eee'}]
               },
               {
                 featureType: 'road.highway',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#616161'}]
               },
               {
                 featureType: 'road.local',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#9e9e9e'}]
               },
               {
                 featureType: 'transit.line',
                 elementType: 'geometry',
                 stylers: [{color: '#e5e5e5'}]
               },
               {
                 featureType: 'transit.station',
                 elementType: 'geometry',
                 stylers: [{color: '#000'}]
               },
               {
                 featureType: 'water',
                 elementType: 'geometry',
                 stylers: [{color: '#c8d7d4'}]
               },
               {
                 featureType: 'water',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#b1a481'}]
               }
             ]
    });

        var image = 'images/it_service/location_icon_map_cont.png';
        var beachMarker = new google.maps.Marker({
          position:{lat: 19.066909, lng: 72.877570},
          map: map,
          icon: image
        });
      }
    </script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
<!-- end google map js -->
</body>
</html>
