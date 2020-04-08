<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <title>{{page_title}}</title>
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
            <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


            <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700&display=swap" rel="stylesheet">
            <link rel="shortcut icon" href="img/jesus.png" type="image/x-icon">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700,800" rel="stylesheet">

            
            <link rel="stylesheet" href="public/css/papier.css" />
            <!-- <link rel="stylesheet" href="public/css/estilo.css" /> -->
            <link rel="stylesheet" href="public/css/estilos.css" />
            <link rel="stylesheet" href="public/css/grid.css" />
             
            



            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script src="https://kit.fontawesome.com/c15b744a04.js" crossorigin="anonymous"></script>
            <script src="public/js/jquery.min.js"></script>
            
            {{foreach css_ref}}
                <link rel="stylesheet" href="{{uri}}" />
            {{endfor css_ref}}


        </head>
        <body>
          <div class="menu">
              <div class="brand"><a href="index.php?page=index">{{page_title}}</a></div>
              <ul>
                  <li><a href="index.php?page=login">Iniciar Sesión</a></li>
              </ul>
              <div class="hbtn"> <div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div></div>
          </div> -->

          <!-- Inicia el Menu -->
          <header>
            <nav>
                <section class="contenedor nav">
                    <div class="logo">
                        <img src="public/imgs/logoP.png" alt="">
                    </div>
                    <div class="enlaces-header">
                        <a href="index.php?page=index">Inicio</a>
                        <a href="index.php?page=nosotros" >Nuestra Parroquia</a>
                        <a href="index.php?page=sacramentos">Sacramentos</a>
                        <a href="index.php?page=dimensiones">Dimensiones</a>
                        <a href="index.php?page=pastorales">Pastorales</a>
                        <a href="index.php?page=plataforma">Plataforma</a>
                        <a href="index.php?page=servicios">Servicios</a>
                    </div>
                    <div class="hamburguer">
                        <i class="fas fa-bars"></i>
                    </div>
                </section>
            </nav>
        </header>

          <!-- termina el menu -->


            <div class="contenido">
                {{{page_content}}}
            </div>

            <div class="footer">
                    <div class="footer-container">
                        <div class="footer-main">
                            <div class="footer-columna">
                                    <h3>Parroco</h3>
                                <p> 
                                    <b>Padre Javier Eduardo Martinez</b>
                                    <br/>
                                    
                                </p>
                                </div>
                            <div class="footer-columna">
                                <h3> Dirección</h3>
                                <span class="fas fa-map-marker"><p>col. Loarque, calle principal.</p></span>
                                <span class="fas fa-phone"><p>(+504) 2226-5775 </p></span>
                                <span class="fas fa-envelope"><p>cristohnresucitado@gmail.com</p></span>
                                <span class="fas fa-mobile-alt"><p>(+504) 9430-6883</p></span>
                            </div> 
                            <div class="footer-columna">
                                <h3> Sobre Nosotros</h3>
                                    <p>La parroquia cristo resucitado esta ubicada en la colonia Loarque, Tegucigalpa, Honduras. Pertenece a la arquidiócesis de Tegucigalpa, nuestro arzobispo es S.E.R. Monseñor Oscar Andres Rodríguez Maradiaga. Nuestro párroco es el padre Javier Eduardo Martínez.</p>
                            </div> 
                        </div>
                    </div>
                </div class="go-top-button">
                </div class="contenedor"></div> 
                
                <div class="footer-copy-redes">
                    <div class="main-copy-redes">
                        <div class="footer-copy">
                            <p >&copy; 2019, Todos los derechos reservados - | ParroquiaCristoResucitado |</p>
                
                        </div>
                        <div class="footer-redes" >
                
                            <a href="https://www.facebook.com/parroquiacristoresucitadohn/"  class="fab fa-facebook" id="facebook" target="_blank"></a>
                            <a href="https://twitter.com/cristo_hn" class="fab fa-twitter" id="twitter" target="_blank"></a>
                            <a href="https://www.youtube.com/channel/UCsTHBqB02EUBDMt82iQ3qqg" class="fab fa-youtube" id="youtube" target="_blank"></a>
                            <a href="https://www.instagram.com/cristohn_resucitado/" class="fab fa-instagram-square" id="instagram" target="_blank"></a>
                            
                        </div>
                    </div> 
                </div>
            </div>

            
            {{foreach js_ref}}
                <script src="{{uri}}"></script>
            {{endfor js_ref}}
            <script>
              $().ready(function(e){
                $(".hbtn").click(function(e){
                  e.preventDefault();
                  e.stopPropagation();
                  $(".menu").toggleClass('open');
                  });
              });
            </script>
        </body>
    </html>
