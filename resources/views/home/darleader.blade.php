@extends('layouts.home')

@section('content')
    @include('layouts.home-navbar')

    <section id="darleaders" class="p-5 bg-white" style="height: 120vh;">
        <div class="container mt-5">
          <h2 class="text-center mb-5">DAR Leaders</h2>
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

@endsection