<!-- Por cada producto se mostrara una cartita en el inicio de la pagina -->

<section class="sec_galeria">
  <h2>¡Estas a punto de brindar tu luz a los demás!</h2>
</section>

<section class="infod">
  <p>Al comprar las insignias de tus Santos favoritos estarás contribuyendo a cada una de las obras dentro de nuestra parroquia.</p>
  <p id="p2">Podrás revisar tus insignias en el Álbum al iniciar sesión. ¡Completa toda la colección y presúmela con nosotros en nuestras redes sociales!</p>
</section>

<section class="row"> 
  <section class="textobasico">
    <h3><b>Libra del Amor</b></h3> 
  </section>
  {{foreach libra}}
    <section class="col-sm-6 col-md-3 m-padding">
      <div class="card col-13 depth-2 m-padding">

        <span class="col-sm-12 center depth-1">
          <!-- Si existe imagen pequeña la muestra -->
          {{if urlthbprd}}
            <img src="{{urlthbprd}}" alt="{{codprd}} {{dscprd}}" class="imgthumb center"/>
          {{endif urlthbprd}}
        </span>


        <!-- Mostrando codigo interno y descripcion del producto -->
        <span class="col-112 col-12 center depth-1 m-padding card-desc">
          <span class="card-side">{{skuprd}}</span>
          <span class="col-12">{{dscprd}}</span>
        </span>

          <!-- Boton para añadir a la carretilla -->
          <span class="col-12 bold center m-padding">
            <a href="index.php?page=addToCart&codprd={{codprd}}" class="l-padding btn btn-primary col-12 sendToCart"> L {{prcprd}}</a>
          </span>
        </span>

      </div>
    </section>
  {{endfor libra}} 
</section>
</br>
</br>

<section class="row">
  <section class="textobasico">
    <h3><b>Comedor</b></h3>
  </section>
  {{foreach comedor}}
  <section class="col-sm-6 col-md-3 m-padding">
    <div class="card col-13 depth-2 m-padding">

      <span class="col-sm-12 center depth-1">
        <!-- Si existe imagen pequeña la muestra -->
        {{if urlthbprd}}
        <img src="{{urlthbprd}}" alt="{{codprd}} {{dscprd}}" class="imgthumb center" />
        {{endif urlthbprd}}
      </span>


      <!-- Mostrando codigo interno y descripcion del producto -->
      <span class="col-112 col-12 center depth-1 m-padding card-desc">
        <span class="card-side">{{skuprd}}</span>
        <span class="col-12">{{dscprd}}</span>
      </span>

      <!-- Boton para añadir a la carretilla -->
      <span class="col-12 bold center m-padding">
        <a href="index.php?page=addToCart&codprd={{codprd}}" class="l-padding btn btn-primary col-12 sendToCart"> L
          {{prcprd}}</a>
      </span>
      </span>

    </div>
  </section>
  {{endfor comedor}}
</section>
</br>
</br>

<section class="row">
    <section class="textobasico">
      <h3><b>Clínica</b></h3>
    </section>
  {{foreach clinica}}
  <section class="col-sm-6 col-md-3 m-padding">
    <div class="card col-13 depth-2 m-padding">

      <span class="col-sm-12 center depth-1">
        <!-- Si existe imagen pequeña la muestra -->
        {{if urlthbprd}}
        <img src="{{urlthbprd}}" alt="{{codprd}} {{dscprd}}" class="imgthumb center" />
        {{endif urlthbprd}}
      </span>


      <!-- Mostrando codigo interno y descripcion del producto -->
      <span class="col-112 col-12 center depth-1 m-padding card-desc">
        <span class="card-side">{{skuprd}}</span>
        <span class="col-12">{{dscprd}}</span>
      </span>

      <!-- Boton para añadir a la carretilla -->
      <span class="col-12 bold center m-padding">
        <a href="index.php?page=addToCart&codprd={{codprd}}" class="l-padding btn btn-primary col-12 sendToCart"> L
          {{prcprd}}</a>
      </span>
      </span>

    </div>
  </section>
  {{endfor clinica}}
</section>
</br>
</br>

<section class="row">
    <section class="textobasico">
      <h3><b>Obras Sociales</b></h3>
    </section>
  {{foreach sociales}}
  <section class="col-sm-6 col-md-3 m-padding">
    <div class="card col-13 depth-2 m-padding">

      <span class="col-sm-12 center depth-1">
        <!-- Si existe imagen pequeña la muestra -->
        {{if urlthbprd}}
        <img src="{{urlthbprd}}" alt="{{codprd}} {{dscprd}}" class="imgthumb center" />
        {{endif urlthbprd}}
      </span>


      <!-- Mostrando codigo interno y descripcion del producto -->
      <span class="col-112 col-12 center depth-1 m-padding card-desc">
        <span class="card-side">{{skuprd}}</span>
        <span class="col-12">{{dscprd}}</span>
      </span>

      <!-- Boton para añadir a la carretilla -->
      <span class="col-12 bold center m-padding">
        <a href="index.php?page=addToCart&codprd={{codprd}}" class="l-padding btn btn-primary col-12 sendToCart"> L
          {{prcprd}}</a>
      </span>
      </span>

    </div>
  </section>
  {{endfor sociales}}
</section>
</br>
</br>

<section class="row">
      <section class="textobasico">
        <h3><b>Obras de Remodelación de la Iglesia</b></h3>
      </section>
  {{foreach remodelacion}}
  <section class="col-sm-6 col-md-3 m-padding">
    <div class="card col-13 depth-2 m-padding">

      <span class="col-sm-12 center depth-1">
        <!-- Si existe imagen pequeña la muestra -->
        {{if urlthbprd}}
        <img src="{{urlthbprd}}" alt="{{codprd}} {{dscprd}}" class="imgthumb center" />
        {{endif urlthbprd}}
      </span>


      <!-- Mostrando codigo interno y descripcion del producto -->
      <span class="col-112 col-12 center depth-1 m-padding card-desc">
        <span class="card-side">{{skuprd}}</span>
        <span class="col-12">{{dscprd}}</span>
      </span>

      <!-- Boton para añadir a la carretilla -->
      <span class="col-12 bold center m-padding">
        <a href="index.php?page=addToCart&codprd={{codprd}}" class="l-padding btn btn-primary col-12 sendToCart"> L
          {{prcprd}}</a>
      </span>
      </span>

    </div>
  </section>
  {{endfor remodelacion}}
</section>
</br>
</br>

<section class="row">
        <section class="textobasico">
          <h3><b>Apadrinar niños para Escuelas</b>
          </h3>
        </section>
  {{foreach apadrinar}}
  <section class="col-sm-6 col-md-3 m-padding">
    <div class="card col-13 depth-2 m-padding">

      <span class="col-sm-12 center depth-1">
        <!-- Si existe imagen pequeña la muestra -->
        {{if urlthbprd}}
        <img src="{{urlthbprd}}" alt="{{codprd}} {{dscprd}}" class="imgthumb center" />
        {{endif urlthbprd}}
      </span>


      <!-- Mostrando codigo interno y descripcion del producto -->
      <span class="col-112 col-12 center depth-1 m-padding card-desc">
        <span class="card-side">{{skuprd}}</span>
        <span class="col-12">{{dscprd}}</span>
      </span>

      <!-- Boton para añadir a la carretilla -->
      <span class="col-12 bold center m-padding">
        <a href="index.php?page=addToCart&codprd={{codprd}}" class="l-padding btn btn-primary col-12 sendToCart"> L
          {{prcprd}}</a>
      </span>
      </span>

    </div>
  </section>
  {{endfor apadrinar}}
</section>
</br>


<script>

  /* Ruta que devuelva un archivo JSON al dar clic en sendToCart.
     Se manda por post el hipervinculo y en console sale lo que devuelve.
  */

  $().ready(function()
  {
    $(".sendToCart").click(function(e)
    {
      e.preventDefault();
      e.stopPropagation();

      $.post(
        $(this).attr("href"),
        function(data, success, xqXML)
        {
          console.log(data);

          /* Si cartAmount existe y es mayor que 0 */
          if(data.cartAmount && data.cartAmount > 0)
          {
            window.location.reload();
          }
        }
      )
    });

  });

</script>

<style>

  .sec_galeria h2{
    font-size: 1.7rem;
  }

  .infod p{
    padding-top: 1rem;
    padding-bottom: 1rem;
    font-size: 1.5rem; 
  }

  .infod p#p2{
    padding-top: 0rem;
    margin-bottom: 1.5rem;
  }

  .textobasico{
    font-size: 0.9rem;
  }

  .card{
    position: relative;
  }

  .card-desc{
    height: 4em;
    overflow: hidden; /*scroll*/
  }

  .card-side{
      position: absolute;
      top:6em;
      left:1em;
      transform-origin: left top;
      transform: rotate(-90deg);
  }

  .l-padding{
    background-color: #E7D1BC;
    color: black;
  }

  .col-13{
    background-color: #c18907;
  }

  .l-padding:hover{
    background-color: white;
    color: gold;
  }

  .col-sm-12{
    background-color: white;
  }

  .col-112{
    background-color: white;
  }

  .sendToCart{
    text-decoration: none;
  }


</style>
