<!DOCTYPE html>
<html lang="en">

<head>
    <title>Final Project</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- thema CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style8.css" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <script src="js/modernizr.custom.js"></script>

</head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <div class=" hi-icon-effect-8">
        <a href="#" title="Add Router" id="trigger-overlay" class="  hi-icon hi-icon-location">Archive</a>
    </div>
            
    
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top"  onclick = $("#menu-close").click(); >Monitoring</a>
            </li>
            <li>
                <a href="#top" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="#portfolio" onclick = $("#menu-close").click(); >Portfolio</a>
            </li>
            <li>
                <a href="#contact" onclick = $("#menu-close").click(); >Contact</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">
        <!-- Map -->
        <section  class="map">
            <script type="text/javascript">
                        var markers = [
                        <?php 
                        include "koneksi.php";  
                        $sql="SELECT * FROM router ";
                        $qry=mysql_query($sql);
                        while ($data=mysql_fetch_array($qry)) {
                        $id_router  =$data['id_router'];
                        $lokasi     =$data['lokasi'];
                        $lat        =$data['lat'];
                        $lng        =$data['lng'];
                        $cabang     =$data['cabang'];
                        $ip         =$data['ip'];
                        $keterangan  =$data['keterangan'];
                        ?>
                        
                        {
                            "title": <?php echo "'$lokasi'"; ?>,
                            "lat": <?php echo "'$lat'"; ?>,
                            "lng": <?php echo "'$lng'"; ?>,
                            "draggable":'true',
                            "description": <?php echo "'$lokasi $ip $keterangan'"; ?>,
                        },

                        <?php } ?>
                        ];
                        window.onload = function () {
                            LoadMap();
                        }
                        function LoadMap() {

                            var myLatLng = {lat: -0.789275, lng: 113.92132700000002};
                            var mapOptions = {
                                center: myLatLng,
                                zoom: 5,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };

                            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
                            // Define a symbol using SVG path notation, with an opacity of 1.
                            var lineSymbol = {
                                path: 'M 0,-1 0,1',
                                strokeOpacity: 1,
                                scale: 2
                                };
                            // Create the polyline, passing the symbol in the 'icons' property.
                            // Give the line an opacity of 0.
                            // Repeat the symbol at intervals of 20 pixels to create the dashed effect.
                            var line = new google.maps.Polyline({
                                path: [<?php 
                                    include "koneksi.php";
                                    $sql="SELECT * FROM router ";
                                    $qry=mysql_query($sql);
                                    while ($data=mysql_fetch_array($qry)) {
                                    $lokasi     =$data['lokasi'];
                                    $lat        =$data['lat'];
                                    $lng        =$data['lng'];
                                    $cabang     =$data['cabang'];
                                    
                                    ?>
                                     {lat: <?php echo "$lat"; ?>, lng: <?php echo "$lng"; ?>},
                                     <?php echo "$cabang"; ?>
                                     <?php } ?>],

                                    strokeColor:'red',                          
                                    strokeOpacity: 0,
                                    icons: [{
                                      icon: lineSymbol,
                                      offset: '0',

                                      repeat: '20px'
                                    }],
                                      map: map
                                  });
  
                            //Create and open InfoWindow ganti icon dan animasi.
                            var infoWindow = new google.maps.InfoWindow();

                            for (var i = 0; i < markers.length; i++) {
                                var data = markers[i];
                                var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                                var marker = new google.maps.Marker({
                                    position: myLatlng,
                                    map: map,
                                    icon:'img/pin2.png',
                                    title: data.title
                                });

                                //Attach click event to the marker.
                                (function (marker, data) {
                                    google.maps.event.addListener(marker, "click", function (e) {
                                        //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                                        infoWindow.setContent("<div class=' marker'>" + data.description + "</div>");
                                        infoWindow.open(map, marker);
                                    });
                                })(marker, data);
                            }
                        }
                    </script>
                    <div id="dvMap">
                    </div>
        </section>
    </header>

    <!-- Portfolio -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>Our Work</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-1.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-2.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-3.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-4.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Footer -->
    <footer>
        <div class="container" id="contact">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <p>Bandung <br>Telkom University</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (+62) 8222-7372224</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:Risang.pro@gmail.com">Risang.pro@gmail.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="https://www.facebook.com/Risanksaputra"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/risangsaputra"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Risang Saputra 2016</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- open/close -->
        <div class="overlay overlay-contentscale">
            <button type="button" class="overlay-close">Close</button>
            <nav>
                 <div id = "loginform">
                        <form class="input" action="proses.php" method="post">
                            <div class="location">  
                                <div class="details">
                                   
                                    <div class="input-group">
                                        <input name="lokasi" type="text" class="form-control search validate geocomplete" required>
                                        <span class="input-group-btn find">
                                            <button class=" but btn btn-default" type="button"><i class="fa fa-search fa-fw fa-2x"></i></button>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control lat" name="lat" placeholder="Latitude"  type="text" class="validate" readonly="">
                                        <input class="form-control lng" name="lng" placeholder="Longitude"  type="text" class="validate" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control ip" name="ip" placeholder="Ip address"  type="text" class="validate" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control ip" name="keterangan" placeholder="Keterangan"  type="text" class="validate" required>
                                    </div>
                                    
                                       <select class="lol"  name="cabang">
                                          <option value="" disabled selected>Choose your option</option>
                                            <?php                                    
                                            include "koneksi.php";
                                            $sql="SELECT * FROM router ORDER BY lokasi ASC";
                                            $qry=mysql_query($sql); while ($data=mysql_fetch_array($qry)) {
                                            $lokasi     =$data['lokasi'];
                                            $lng     =$data['lng'];
                                            $lat     =$data['lat'];

                                            ?>
                                           <option value="{<?php echo "lat: $lat, lng: $lng";?>},"><?php echo "$lokasi";?></option>

                                            <?php } ?>
                                          
                                        </select>
                                        
                                        
                                    <div class="form-group">
                                        <input class="btn-s" name="submit"   type="submit" value="Submit" >
                                    </div>
                            
                                </div>
                            </div>                                          
                        </form>

                    </div>  

            </nav>
        </div>
        
    <script src="js/classie.js"></script>
    <script src="js/demo7.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw2jxYPL72ZzcOv67gdx29UkIPuSi0bgo&callback=initMap">
    </script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="js/jquery.geocomplete.js"></script>  
    <script>


</body>

</html>
