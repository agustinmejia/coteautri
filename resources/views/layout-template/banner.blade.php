<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"/>


<section id="hero" class="hero d-flex align-items-center">
  <div class="dark-mask" style="width: 100%; position: relative;background-color: rgba(0,0,0,0.4); height: 100vh">
  {{-- <div class="dark-mask" style="width: 100%; position: relative;background-color: #EDEDED"> --}}


    <div class="container" style="padding: 120px 0 60px 0;">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up" style="color:#08acf2">CONSULTA DE NUMERO TELEFONICO COTEAUTRI RL</h2>
          <p data-aos="fade-up" data-aos-delay="100" style="color: rgb(255, 255, 255)">Para realizar b煤squeda por numero telef贸nico o por nombre y/o apellido, escriba los datos en el siguiente cuadro y luego presione Buscar</p>

        
       
            <div class="form-inline">
              <div id="field_wrapper">
                <div class="my-class-form-control-group">
                  <input type="text" id="input-search" class="form-control" placeholder="Buscar..." style="width:250;height:50px"> &nbsp;
                  <a class="btn btn-info" onclick="buscar()" id="add_button" style="width: 50px; height: 46px; font-size: 28px; justify-content: center;"><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
               </div>
            </div>

        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
      <br>
    
        <div class="row" id="div-results" style="min-height: 120px"></div>

      

    </div>
  </div>




    <style> 

      .my-class-form-control-group{
        display:flex;
        align-items:Center;
      }

      

      #dataStyle {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
      }

      #dataStyle td, #dataStyle th {
          border: 1px solid #ddd;
          padding: 8px;
          color: black;
      }

      /* #dataStyle tr:nth-child(even){background-color: #de1111;} */

      #dataStyle tr:hover {background-color: #ddd;}

      #dataStyle th {
          padding-top: 12px;
          padding-bottom: 12px;
          /* text-align: left; */
          background-color: #08acf2;
          color: white;
      }
    </style>


  </section>