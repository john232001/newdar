@extends('layouts.home')

@section('content')

@include('layouts.home-navbar')
<section id="home">
    <div class="bg-cover min-vh-100 d-flex align-items-center">
    </div>
</section>
<!-- About Us Sections -->
<section class="p-5 bg-light" id="about">
  <div class="container">
    <h2 class="text-center mb-5">About Us</h2>
    <div class="row align-items-center justify-content-between mb-5">
      <div class="col-md-6">
        <img src="https://image.slidesharecdn.com/historyofagrarianreform-160902051208/95/history-of-agrarian-reform-1-638.jpg?cb=1472793223" class="img-fluid rounded-3" alt="" />
      </div>
      <div class="col-md-6 p-5">
        <h2>Agrarian Reform History</h2>
        <p>
            The history of agrarian reform in the Philippines dates back to the early 20th century,
             when the American colonial government implemented a number of measures aimed at improving the lives of Filipino farmers. These measures included the Homestead Act of 1903, which allowed individuals to claim land for free if they cultivated it for five years,
             and the Cadastral Act of 1913, which established a system for surveying and registering land ownership.
        </p>
        <a href="#mmv" class="btn btn-success mt-3">
          <i class="fa fa-arrow-down"></i> See More 
        </a>
      </div>
    </div>
  </div>
</section>
<!-- Mandate, Mission, Vision Sections -->
<section id="mmv" class="bg-white p-5">
    <div class="container">
      <div class="row align-items-center justify-content-between mb-5">
          <div class="col-md p-5">
            <h2>Mandate and Functions</h2>
            <p>
              To lead in the implementation of the Comprehensive Agrarian Reform Program (CARP) through Land Tenure Improvement (LTI),
               Agrarian Justice and Coordinated delivery of essential Support Services to client beneficiaries. <br>
               <ul>
                  <li>To provide Land Tenure security to landless farmers through land acquisition and distribution; leasehold arrangements’ implementation and other LTI services;</li>
                  <li>To provide legal intervention to Agrarian Reform Beneficiaries (ARBS) through adjudication of agrarian cases and agrarian legal assistance;</li>
                  <li>To implement, facilitate and coordinate the delivery of support services to ARBs through Social Infrastructure and Local Capability Building (SILCAB); Sustainable Agribusiness and Rural Enterprise Development (SARED); and Access Facilitation and Enhancement Services (AFAES).</li>
               </ul>
            </p>
          </div>
          <div class="col-md">
              <img src="{{ asset('assets/img/mandate.png') }}" class="img-fluid" alt="" />
          </div>
      </div>
      <div class="row align-items-center justify-content-between mb-5">
          <div class="col-md">
            <img src="{{ asset('assets/img/mission.png')}}" class="img-fluid" alt="" />
          </div>
          <div class="col-md p-5">
            <h2>Mission Statement</h2>
            <p>
              DAR is the lead government agency that upholds and implements comprehensive and genuine agrarian reform which actualizes equitable land distribution, ownership, agricultural productivity, and tenurial security for,
               of and with the tillers of the land towards the improvement of their quality of life.
            </p>
          </div>
        </div>
        <div class="row align-items-center justify-content-between mb-5">
          <div class="col-md p-5">
            <h2>Vision</h2>
            <p>
              A just, safe and equitable society that upholds the rights of tillers to own, control, secure, cultivate and enhance their agricultural lands,
               improve their quality of life towards rural development and national industrialization.
            </p>
          </div>
          <div class="col-md">
              <img src="{{ asset('assets/img/vision.png') }}" class="img-fluid" alt="" />
          </div>
      </div>
    </div>
  </section>
<section id="darleaders" class="p-5">
  <div class="container">
    <h2 class="text-center text-white mb-5">DAR Leaders</h2>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row g-4 d-flex justify-content-center">
                <div class="col-md-6 col-lg-3">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <img
                        src="https://media.dar.gov.ph/source/2022/08/28/1.jpg"
                        class="rounded-circle mb-3"
                        alt="Condrado M. Estrella III"
                        style="width: 120px; height: 120px;"
                      />
                      <h4 class="leader">Condrado M. Estrella III</h4>
                      <span class="term">
                        Secretary <br>
                        Department of Agrarian Reform <br>
                        July 1, 2022 - present
                      </span>
                    </div>
                  </div>
                </div>
      
                <div class="col-md-6 col-lg-3">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <img
                        src="https://media.dar.gov.ph/source/2021/12/12/0.jpg"
                        class="rounded-circle mb-3"
                        alt="Bernie F. Cruz"
                        style="width: 120px; height: 120px;"
                      />
                      <h4 class="leader">Bernie F. Cruz</h4>
                      <span class="term">
                        Acting Secretary <br>
                        Department of Agrarian Reform <br>
                        October 28, 2021 - June 19, 2022
                      </span>
                    </div>
                  </div>
                </div>
      
                <div class="col-md-6 col-lg-3">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <img
                        src="https://media.dar.gov.ph/source/2021/05/14/nation01-051421.jpg"
                        class="rounded-circle mb-3"
                        alt="John R. Castriciones"
                        style="width: 120px; height: 120px;"
                      />
                      <h4 class="leader">John R. Castriciones</h4>
                      <span class="term">
                        Secretary <br>
                        Department of Agrarian Reform <br>
                        December 1, 2017 - October 6, 2021
                      </span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="carousel-item">
            <div class="row g-4 d-flex justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2022/01/11/0.jpg"
                          class="rounded-circle mb-3"
                          alt="Rosalina L. Bistoyong"
                          style="width: 120px; height: 120px;"
                        />
                        <h4 class="leader">Rosalina L. Bistoyong</h4>
                        <span class="term">
                          OIC - Secretary <br>
                          Department of Agrarian Reform <br>
                          September 8, 2017 - December 1, 2017
                        </span>
                      </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <img
                        src="https://media.dar.gov.ph/source/2018/07/26/secmariano.jpg"
                        class="rounded-circle mb-3"
                        alt="Rafael V. Mariano"
                        style="width: 120px; height: 120px;"
                      />
                      <h4 class="leader">Rafael V. Mariano</h4>
                      <span class="term">
                        OIC - Secretary <br>
                        Department of Agrarian Reform <br>
                        July 1, 2016 - September 8, 2017
                      </span>
                    </div>
                  </div>
                </div>
      
                <div class="col-md-6 col-lg-3">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <img
                        src="https://media.dar.gov.ph/source/2018/07/26/secdelosreyes.jpg"
                        class="rounded-circle mb-3"
                        alt="Virgilio R. de Los Reyes"
                        style="width: 120px; height: 120px;"
                      />
                      <h3 class="leader">Virgilio R. de Los Reyes</h3>
                      <span class="term">
                        Secretary <br>
                        Department of Agrarian Reform <br>
                        July 1, 2010 - July 1, 2016
                      </span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="carousel-item">
            <div class="row g-4 d-flex justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2018/07/26/secpangandaman-1.jpg"
                          class="rounded-circle mb-3"
                          alt="Nasser C. Pangandaman"
                          style="width: 120px; height: 120px;"
                        />
                        <h3 class="leader">Nasser C. Pangandaman</h3>
                        <span class="term">
                          Secretary <br>
                          Department of Agrarian Reform <br>
                          July 10, 2005 - June 30, 2010
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2018/07/26/secvilla.jpg"
                          class="rounded-circle mb-3"
                          alt="Rene C. Villa"
                          style="width: 120px; height: 120px;"
                        />
                        <h3 class="leader">Rene C. Villa</h3>
                        <span class="term">
                          Secretary <br>
                          Department of Agrarian Reform <br>
                          August 26, 2004 - July 9, 2005
                        </span>
                      </div>
                    </div>
                  </div>
                <div class="col-md-6 col-lg-3">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <img
                        src="https://media.dar.gov.ph/source/2018/07/26/secponce.jpeg"
                        class="rounded-circle mb-3"
                        alt="Jose Mari B. Ponce"
                        style="width: 120px; height: 120px;"
                      />
                      <h3 class="leader">Jose Mari B. Ponce</h3>
                      <span class="term">
                        OIC - Secretary <br>
                        Department of Agrarian Reform <br>
                        February 20, 2004 - August 24, 2004
                      </span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="carousel-item">
            <div class="row g-4 d-flex justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2018/07/26/secpagdanganan.jpeg"
                          class="rounded-circle mb-3"
                          alt="Roberto M. Pagdanganan"
                          style="width: 120px; height: 120px;"
                        />
                        <h3 class="leader">Roberto M. Pagdanganan</h3>
                        <span class="term">
                          Secretary <br>
                          Department of Agrarian Reform <br>
                          January 20, 2003 - January 20, 2004
                        </span>
                      </div>
                    </div>
                  </div>
        
                  <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2018/07/26/secbraganza.png"
                          class="rounded-circle mb-3"
                          alt="Hernani A. Braganza"
                          style="width: 120px; height: 120px;"
                        />
                        <h3 class="leader">Hernani A. Braganza</h3>
                        <span class="term">
                          Secretary <br>
                          Department of Agrarian Reform <br>
                          February 12, 2001 - January 15, 2003
                        </span>
                      </div>
                    </div>
                  </div>
        
                  <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2018/07/26/secmorales.png"
                          class="rounded-circle mb-3"
                          alt="Horacio R. Morales "
                          style="width: 120px; height: 120px;"
                        />
                        <h3 class="leader">Horacio R. Morales</h3>
                        <span class="term">
                          Secretary <br>
                          Department of Agrarian Reform <br>
                          July 1, 1998 - February 11, 2001
                        </span>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="carousel-item">
            <div class="row g-4 d-flex justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2018/07/26/secgarilao.jpeg"
                          class="rounded-circle mb-3"
                          alt="Ernesto D. Garilao"
                          style="width: 120px; height: 120px;"
                        />
                        <h3 class="leader">Ernesto D. Garilao</h3>
                        <span class="term">
                          Secretary <br>
                          Department of Agrarian Reform <br>
                          June 30, 1992 - June 30, 1998
                        </span>
                      </div>
                    </div>
                  </div>
        
                  <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2018/07/26/secleong.jpeg"
                          class="rounded-circle mb-3"
                          alt="Benjamin T. Leong"
                          style="width: 120px; height: 120px;"
                        />
                        <h3 class="leader">Benjamin T. Leong</h3>
                        <span class="term">
                          Secretary <br>
                          Department of Agrarian Reform <br>
                          April 6, 1990 - June 30, 1992
                        </span>
                      </div>
                    </div>
                  </div>
        
                  <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2018/07/26/secabad.jpeg"
                          class="rounded-circle mb-3"
                          alt="Florencio B. Abad"
                          style="width: 120px; height: 120px;"
                        />
                        <h3 class="leader">Florencio B. Abad</h3>
                        <span class="term">
                          Secretary <br>
                          Department of Agrarian Reform <br>
                          January 4, 1990 - April 5, 1990
                        </span>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="carousel-item">
            <div class="row g-4 d-flex justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2018/07/26/secsantiago.jpeg"
                          class="rounded-circle mb-3"
                          alt="Miriam D. Santiago"
                          style="width: 120px; height: 120px;"
                        />
                        <h3 class="leader">Miriam D. Santiago</h3>
                        <span class="term">
                          Secretary <br>
                          Department of Agrarian Reform <br>
                          July 20, 1989 - January 4, 1990
                        </span>
                      </div>
                    </div>
                  </div>
                <div class="col-md-6 col-lg-3">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <img
                        src="https://media.dar.gov.ph/source/2018/07/26/secjuico.jpeg"
                        class="rounded-circle mb-3"
                        alt="Philip E. Juico"
                        style="width: 120px; height: 120px;"
                      />
                      <h3 class="leader">Philip E. Juico</h3>
                      <span class="term">
                        Secretary <br>
                        Department of Agrarian Reform <br>
                        June 23, 1987 - July 1, 1989
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <img
                        src="https://media.dar.gov.ph/source/2018/07/26/secalvarez.png"
                        class="rounded-circle mb-3"
                        alt="Heherson T. Alvarez"
                        style="width: 120px; height: 120px;"
                      />
                      <h3 class="leader">Heherson T. Alvarez</h3>
                      <span class="term">
                        Minister <br>
                        Ministry of Agrarian Reform <br>
                        May 1, 1986 - March 7, 1987
                      </span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="carousel-item">
            <div class="row g-4 d-flex justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2018/07/26/secestrella.png"
                          class="rounded-circle mb-3"
                          alt="Conrado Estrella"
                          style="width: 120px; height: 120px;"
                        />
                        <h3 class="leader">Conrado Estrella</h3>
                        <span class="term">
                          Secretary <br>
                          Department of Agrarian Reform <br>
                          September 10, 1971 - April 30, 1986
                        </span>
                      </div>
                    </div>
                  </div>
        
                  <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2018/07/26/govgozon.png"
                          class="rounded-circle mb-3"
                          alt="Benjamin M. Gozon"
                          style="width: 120px; height: 120px;"
                        />
                        <h3 class="leader">Benjamin M. Gozon</h3>
                        <span class="term">
                          Governor <br>
                          Land Authority <br>
                          July 1964 - December 1965
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2018/07/26/govperezjr.png"
                          class="rounded-circle mb-3"
                          alt="Rodrigo D. Perez, Jr."
                          style="width: 120px; height: 120px;"
                        />
                        <h3 class="leader">Rodrigo D. Perez, Jr.</h3>
                        <span class="term">
                          Governor <br>
                          Land Authority <br>
                          November 1963 - July 1964
                        </span>
                      </div>
                    </div>
                </div> 
            </div>
          </div>
          <div class="carousel-item">
            <div class="row g-4 d-flex justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                      <div class="card-body text-center">
                        <img
                          src="https://media.dar.gov.ph/source/2022/08/11/socmed-card-2-may-23-2018.jpg"
                          class="rounded-circle mb-3"
                          alt="Sixto K. Roxas"
                          style="width: 120px; height: 120px;"
                        />
                        <h3 class="leader">Sixto K. Roxas</h3>
                        <span class="term">
                          Governor <br>
                          Land Authority <br>
                          August 1963 - October 1963
                        </span>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </div>
</section>
<!-- Services -->
<section id="services" class="bg-white p-5">
    <div class="container">
      <h2 class="text-center mb-5">Services</h2>
      <div class="row text-center g-4">
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
              <img src="https://darcaraga.files.wordpress.com/2019/07/lts_banner_final_5b24574e8f9c45_35679073.jpg?w=616" class="card-img-top" alt="landtenureservices" style="width: 100%">
              <div class="card-body">
                <h3 class=" mb-3">Land Tenure Services</h3>
                <span class="">Land Tenure Services is operationalized either through land acquisition and distribution (LAD) or leasehold operations. LAD involves the redistribution of government and private agricultural lands to landless farmers and farm workers. </span>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
              <img src="https://darcaraga.files.wordpress.com/2019/07/als_5b2458b8206885_06676945.jpg" class="card-img-top" alt="landtenureservices" style="width: 100%">
              <div class="card-body">
                <h3 class="mb-3">Agrarian Legal Services</h3>
                <span class="">This is complemented with two programs, namely: agrarian legal assistance (ALA) under the Bureau of Agrarian Legal Assistance (BALA) and adjudication of agrarian cases under the Department of Agrarian Reform Adjudication Board (DARAB).</span>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
              <img src="https://media.dar.gov.ph/source/2018/06/16/APAS_5b245f99dc9e57_40698601.jpg" class="card-img-top" alt="landtenureservices" style="width: 100%">
              <div class="card-body">
                <h3 class="mb-3">Agrarian Policy Advisory Services</h3>
                <span>This MFO on Agrarian Policy Advisory Services (APAS) covers policy advisory formulation, updating and dissemination. For FY 2015, the Department of Agrarian Reform has signed and issued 5 Administrative Orders and 1 Memorandum Circular. </span>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
              <img src="https://media.dar.gov.ph/source/2021/05/13/arb-installation.jpg" class="card-img-top" alt="landtenureservices" style="height: 132px; width: 100%;">
              <div class="card-body">
                <h3 style="margin-bottom: 50px; margin-top: 20px;">ARBDSP</h3>
                <span>Technical Advisory Support Services (TASS) is an agrarian reform component that aims to capacitate Agrarian Reform Beneficiaries (ARBs)  and provide them access to neccessary support services to make their land productive. </span>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
<!-- Footer -->
<footer class="p-3 text-white text-center position-relative">
  <div class="container">
    <p class="lead">{{ \Carbon\Carbon::now()->year }} Department of Agrarian Reform.</p>
  </div>
</footer>
@endsection