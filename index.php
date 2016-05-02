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
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7/leaflet.css"/>
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
               <script
        src="http://cdn.leafletjs.com/leaflet-0.7/leaflet.js">
    </script>

  

    <div id="map"></div>
        <script>
            var map = L.map('map').setView([-0.789275, 113.92132700000002], 5);
        mapLink = 
            '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            maxZoom: 18,
            }).addTo(map);
            var LeafIcon = L.Icon;

            var konek = new LeafIcon({iconUrl: "img/konek.png",iconAnchor: [13, 39],popupAnchor: [0, -33]}),
                fail = new LeafIcon({iconUrl: "img/fail.png",iconAnchor: [13, 39],popupAnchor: [0, -33]});
                
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
            
            // L.marker([<?php echo "$lat"; ?>, <?php echo "$lng"; ?>]).bindPopup('<?php echo "$ip"; ?>').addTo(map);

        <?php 
        exec("ping -t 1 " . $ip, $output, $result);

        if ($result == 0)

        echo  "L.marker([$lat, $lng],{icon:konek}).bindPopup('$ip <br> $keterangan').addTo(map);";
        else
        echo  "L.marker([$lat, $lng],{icon:fail}).bindPopup('$ip <br> $keterangan').addTo(map);";
        ?>

             var polyline = L.polyline([
            [<?php echo "$lat"; ?>, <?php echo "$lng"; ?>],[<?php echo "$cabang"; ?>],],
            {
                color: 'green',
                weight: 2,
                opacity: .7,
                lineJoin: 'round'
            }
            ).addTo(map);
             <?php } ?>
            
        </script>
                    
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
                                          <option value="" disabled selected>Cabang Dari</option>
                                            <?php                                    
                                            include "koneksi.php";
                                            $sql="SELECT * FROM router ORDER BY lokasi ASC";
                                            $qry=mysql_query($sql); while ($data=mysql_fetch_array($qry)) {
                                            $lokasi     =$data['lokasi'];
                                            $lng     =$data['lng'];
                                            $lat     =$data['lat'];

                                            ?>
                                           <option value="<?php echo "$lat, $lng";?>"><?php echo "$lokasi";?></option>

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
