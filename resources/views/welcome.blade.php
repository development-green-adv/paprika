@extends("layout/master")

@section("title", "Enter title here")

@section("seo_content")

    <meta name="keywords" content="" />
    <meta name="description" content="" />

@endsection

@section("content")

    @include("inc/header")


        <div class="slideshow">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('images/web/slider-img-1.png') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/web/slider-img-2.png') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/web/slider-img-3.png') }}" alt="Third slide">
                    </div>
                </div>
            </div>
        </div>


        <section id="paprika-first-section">
            <div class="paprika-first-section-left" style="background-image: url('images/web/paprika-first-section-left.png');">
                <h1>Paprika Food</h1>
                <p>Od same ideje porodice da otvori  restoran pizzeriju, nije postojao kompromis – pizza peć mora biti na drva. Peć na drva nije samo alat, ona je jedan od glavnih sastojaka ukusa pizza, koje izlaze iz nje.</p>
                <p>Porodična težnja ka savršenom ukusu prenela se i na ostatak jelovnika, uslugu, kao i prostor u kojem se nalazimo, sa željom da našim gostima pruzimo savršenstvo boja i ukusa.</p>
                <p>Svaki naš proizvod je poseban, ručno pravljen sa puno ljubavi</p>
            </div>
            <div class="paprika-first-section-right" style="background-image: url('{{ asset('/images/web/paprika-first-section-right.png') }}')"></div>
        </section>


        <section id="paprika-second-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Naše preporuke za danas</h1>
                    </div>
                </div>
                <div class="preporuke-linkovi">
                    <a href="#">PIZZA</a>
                    <a href="#">SENDVIČ</a>
                    <a href="#">STROMBOLI</a>
                    <a href="#">ROŠTILJ</a>
                    <a href="#">ROŠTILJ/KG</a>
                    <a href="#">POMFRIT</a>
                    <a href="#">PALAČINKE</a>
                </div>
                <div class="row">
                        <div class="col-md-3">
                            <div class="preporuke-card text-center">
                                <img class="mb-5" src="{{ asset('images/web/pizza-1.png') }}">
                                <h3>Cappriciosa</h3>
                                <p>pelat, kačkavalj, šunka, 
                                        pečurke, masline</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="preporuke-card text-center">
                                <img class="mb-5" src="{{ asset('images/web/pizza-2.png') }}">
                                <h3>Quattro Formaggi</h3>
                                <p>pelat, kačkavalj, mozzarella, gorgonzola, 
                                        parmezan, maslinovo ulje</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="preporuke-card text-center">
                                <img class="mb-5" src="{{ asset('images/web/pizza-3.png') }}">
                                <h3>Tradizionale</h3>
                                <p>pelat, kačkavalj, 
                                        dimljena suva slanina, jaje</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="preporuke-card text-center">
                                <img class="mb-5" src="{{ asset('images/web/pizza-4.png') }}">
                                <h3>Capra Blu</h3>
                                <p>krem pavlaka, kačkavalj, 
                                        dimljena suva pečenica, koziji sir</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section id="paprika-third-section" style="background-image: url('{{ asset('/images/web/paprika-third-section-bg.png') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Paprika Food</h1>
                        <p>JEDINSTVENO - NARUČITE HRANU I POSMATRAJTE KAKO SE PRIPREMA</p>
                        <!-- <img src="./images/paprika-third-section-inner.png" alt=""> -->
                        <iframe src="http://g0.ipcamlive.com/player/player.php?alias=5de4e89619411" width="800px" height="450px" 
                            frameborder="0" allowfullscreen autoplay="1">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>



        <section id="fourth-section">
            <div class="paprika-fourth-section-left" style="background-image: url('{{ asset('images/web/paprika-fourth-section-left.png') }}')"></div>
            <div class="paprika-fourth-section-right text-center" style="background-image: url('{{ asset('images/web/paprika-fourth-section-right.png') }}')">
                <h1>Besplatna dostava</h1>
                <p>od 09.00h do 23.00h</p>
                <a href="#">062 828 38 66</a>,
                <a class="ml-1" href="#">011 406 76 68</a> <br> <br>
                <a class="mapa-dostave" href="#">POGLEDAJ MAPU DOSTAVE</a>
            </div>
        </section>

        <div id="map">
            <img src="{{ asset('images/google-map.png') }}">
        </div>


    @include("inc/footer")


@endsection