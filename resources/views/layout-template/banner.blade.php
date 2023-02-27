<section id="hero" class="hero d-flex align-items-center">
  <div class="dark-mask" style="width: 100%; position: relative;background-color: rgba(0,0,0,0.4)">

    <div class="container" style="padding: 120px 0 60px 0;">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up" style="color:#002576">Your Lightning Fast Delivery Partner</h2>
          <p data-aos="fade-up" data-aos-delay="100">Facere distinctio molestiae nisi fugit tenetur repellat non praesentium nesciunt optio quis sit odio nemo quisquam. eius quos reiciendis eum vel eum voluptatem eum maiores eaque id optio ullam occaecati odio est possimus vel reprehenderit</p>

        
          {{-- @csrf --}}
            <input type="text" id="input-search" class="form-control" placeholder="Buscar..." style="width:335;height:50px">
            {{-- <button type="submit" class="btn btn-primary">Search</button> --}}
          

          {{-- <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>Clients</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projects</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                <p>Support</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                <p>Workers</p>
              </div>
            </div><!-- End Stats Item -->

          </div> --}}

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
          background-color: #22a7f0;
          color: white;
      }
    </style>
  </section>