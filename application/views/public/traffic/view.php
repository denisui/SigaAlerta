<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Sigalerta .: Tráfego :.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="img/favicon.png">

    <?php $this->load->view('public/include/styles/styles'); ?>
  </head>
  <!-- head -->

  <body class="sticky-header">
    <div class="body-innerwrapper">

      <?php $this->load->view('public/include/menu'); ?>

      <!--==================================
    =            START PAGE TITLE        =
    ===================================-->
      <section id="page-title">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-title-wrapper">
              <div class="container">
                <h2 class="pull-left title">
                  <span class="cat-icon">T </span> Tráfego</h2>
                <!-- breadcrumb -->
                <ol class="breadcrumb pull-right">
                  <li>
                    <a href="<?php echo base_url(); ?>">Home</a>
                  </li>
                  <li class="active">
                    Tráfego
                  </li>
                </ol>
                <!-- //breadcrumb -->
              </div>
              <!-- //container -->
            </div>
            <!-- //page-title-wrapper -->
          </div>
        </div>
        <!-- //row -->
      </section>
      <!--====  End of PAGE TITLE  ====-->


      <!--==================================
    =            START MAIN WRAPPER      =
    ===================================-->
      <section class="main-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <!-- Advertisement one -->
              <div class="advertisement mtb30">
                <div class="row">
                  <div class="col-sm-12">
                    //Advertising
                  </div>
                </div>
              </div>
              <!-- //Advertisement one -->
            </div>
            <div class="col-sm-9">
              <div class="section-title">
                <h3>
                  <span class="cat-icon">P</span>Veja o tráfego em tempo real</h3>
              </div>
              <!-- //section-title -->

              <div class="simple-article-overlay mtt30">
                <div class="row">
                  <div class="col-sm-12">
                    <!-- MAP-->
                    <!--<div id="gmap-dropdown" style="with:300px;height:550px;"></div>                  
                  <div id="gmap-list"></div>-->
                    <div id="map" style=""></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- //col-sm-9 -->

            <div class="col-sm-3">
              <!-- Social counter -->
              <div class="social-counter">
                <div class="section-title">
                  <h3>
                    <span class="cat-icon">
                      <i class="fa fa-share-alt"></i>
                    </span>Estamos Conectados</h3>
                </div>
                <!-- //section-title -->

                <div class="clearfix">
                  //
                </div>
              </div>
            </div>
            <!-- //col-sm-3 -->
          </div>
          <!-- //row -->
        </div>
        <!-- //container -->
      </section>
      <!--====  End of MAIN WRAPPER  ====-->

      <?php $this->load->view('public/include/footer'); ?>
      <?php $this->load->view('public/include/menu-mobile'); ?>
    </div>
    <!-- //body-innerwrapper -->

    <?php $this->load->view('public/include/scripts/scripts'); ?>                 
    <script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyCERAeMD9Tbn2bIoEka47cYSN4k_-mLrXY"></script>
    <script src="<?php echo base_url(); ?>assets/public/js/util.js"></script>
    <script>
    $(document).ready(function() {
      setTimeout(function() {
        $(location).attr('href', '');
      }, 300000);
          /* Google Maps -------------------------*/
          var locations = [   
              <?php
                foreach ($result as $key => $v) {
                    ?>
                    ["<?php echo $v->location->cityName; ?>", <?php echo $v->location->latitude; ?>, <?php echo $v->location->longitude; ?>, "<?php echo $v->content->fullJpeg; ?>", "<?php echo $v->name; ?>"],
                    <?php
                }
              ?>        
          ];
          var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 10,
              center: new google.maps.LatLng(<?php echo $v->location->latitude; ?>, <?php echo $v->location->longitude; ?>),
              mapTypeId: google.maps.MapTypeId.ROADMAP
          });
          var infowindow = new google.maps.InfoWindow();
          var marker, i;
          var image = "assets/public/img/webcam.png";
          for (i = 0; i < locations.length; i++) {
              marker = new google.maps.Marker({
                  position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                  map: map,
                  icon: image
              });
              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                  return function() {
                      infowindow.setContent("<div style='float:left'><img src='"+locations[i][3]+"'></div><div style='float:right; padding: 10px;'><b>"+locations[i][0]+"</b><br/>123 Address<br/> City,Country</div>");
                      infowindow.open(map, marker);
                  }
              })(marker, i));
          }
          var trafficLayer = new google.maps.TrafficLayer();
          trafficLayer.setMap(map);
      });
    </script>
  </body>

</html>