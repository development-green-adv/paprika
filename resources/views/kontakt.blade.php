@extends("layout/master")

@section("title", "Enter title here")

@section("seo_content")

    <meta name="keywords" content="" />
    <meta name="description" content="" />

@endsection

@section("content")

    @include("inc/header")


        <div class="container-fluid menu_front_section" style="background-image: url('{{ asset('images/web/meni-pizza.png') }}')">
            <div class="row h-100">
                <div class="container align-self-end">
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 120px;">
                            <h1>PAPRIKA live</h1>
                            <p>dobrodošli u naš porodični restoran</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid menu_item_section">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-3 menu_show">
                            <ul>
                                <li><img src="{{ asset('images/web/pizza-icon.png') }}" /> <span class="menu_item_name"><a href="/meni/pizze">Pizze</a></span></li>
                                <li><img src="{{ asset('images/web/sendvic-icon.png') }}" /> <span class="menu_item_name"><a href="/meni/sendvici">Sendviči</a></span></li>
                                <li><img src="{{ asset('images/web/stromboli-icon.png') }}" /> <span class="menu_item_name"><a href="/meni/stromboli">Stromboli</a></span></li>
                                <li><img src="{{ asset('images/web/hamburger-icon.png') }}" /> <span class="menu_item_name"><a href="/meni/rostilj">Roštilj</a></span></li>
                                <li><img src="{{ asset('images/web/gril-icon.png') }}" /> <span class="menu_item_name"><a href="/meni/rostilj-na-kilo">Roštilj/kg</a></span></li>
                                <li><img src="{{ asset('images/web/pomfrit-icon.png') }}" /> <span class="menu_item_name"><a href="/meni/pomfrit">Pomfrit</a></span></li>
                                <li><img src="{{ asset('images/web/palacinke-icon.png') }}" /> <span class="menu_item_name"><a href="/meni/palacinke">Palačinke</a></span></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-9 menu_show_item">

                            <div class="row">
                                <div class="col-12" style="border-bottom: 3px solid #212121; padding-bottom: 10px;">
                                    <h4 style="color: #fff;"><span style="margin-right: 15px;"><img src="{{ asset('images/web/nama.png') }}" alt="O nama"></span> Kontakt</h4>
                                </div>

                                <div class="col-12 col-md-12" style="padding-top: 40px;">
                                    
                                    <div class="row">

                                        <div class="col-12 col-md-4">
                                            <img class="img-fluid" src="{{ asset('images/web/auto.png') }}">
                                        </div>
                                        <div class="form-group col-12 offset-md-1 col-md-7">

                                            <input class="form-control" type="text" name="" placeholder="Ime i prezime">
                                            <input class="form-control" type="text" name="" placeholder="Email adresa">
                                            <input class="form-control" type="text" name="" placeholder="Kontakt telefon (opciono)">

                                            <textarea class='form-control' name="" id="" cols="30" rows="10" placeholder="Tekst poruke"></textarea>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid map_section" style="background-image: url('{{ asset('images/web/google-map.png') }}');">

        </div>


    @include("inc/footer")

    
        

@endsection