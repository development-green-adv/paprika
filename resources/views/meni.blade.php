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
                            <h1>NAŠ MENI {{ Session::get('user') }}</h1>
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
                                <li><img src="{{ asset('images/web/pizza-icon.png') }}" /> <span class="menu_item_name"><a @if($category == "pizze") style="color: #fd2403;" @endif href="/meni/pizze">Pizze</a></span></li>
                                <li><img src="{{ asset('images/web/sendvic-icon.png') }}" /> <span class="menu_item_name"><a @if($category == "sendvici") style="color: #fd2403;" @endif href="/meni/sendvici">Sendviči</a></span></li>
                                <li><img src="{{ asset('images/web/stromboli-icon.png') }}" /> <span class="menu_item_name"><a @if($category == "stromboli") style="color: #fd2403;" @endif href="/meni/stromboli">Stromboli</a></span></li>
                                <li><img src="{{ asset('images/web/hamburger-icon.png') }}" /> <span class="menu_item_name"><a @if($category == "rostilj") style="color: #fd2403;" @endif href="/meni/rostilj">Roštilj</a></span></li>
                                <li><img src="{{ asset('images/web/gril-icon.png') }}" /> <span class="menu_item_name"><a @if($category == "rostilj-na-kilo") style="color: #fd2403;" @endif href="/meni/rostilj-na-kilo">Roštilj/kg</a></span></li>
                                <li><img src="{{ asset('images/web/pomfrit-icon.png') }}" /> <span class="menu_item_name"><a @if($category == "pomfrit") style="color: #fd2403;" @endif href="/meni/pomfrit">Pomfrit</a></span></li>
                                <li><img src="{{ asset('images/web/palacinke-icon.png') }}" /> <span class="menu_item_name"><a @if($category == "palacinke") style="color: #fd2403;" @endif href="/meni/palacinke">Palačinke</a></span></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-9 menu_show_item">

                            @if(count($products) > 0)

                                @foreach($products as $product)

                                    <div class="row" style="background-color: #212121; padding: 7px 7px 11px 7px; margin-bottom: 13px;">
                                        <div class="col-12 col-md-7 align-self-center">
                                            <h5>{{ $product->title }}</h5>
                                            <p>{{ $product->description }}</p>
                                        </div>
                                        <div class="col-12 col-md-5 text-right align-self-center">
                                            <p> 
                                                @if($product->category == "pizze") {{ $product->cena_32 }} / {{ $product->cena_50 }} rsd @else {{ $product->cena }} rsd @endif 
                                                <span class="menu_show_item_cart">
                                                    <img data-toggle="modal" data-target="#exampleModal{{ $product->id }}" src="{{ asset('images/web/shopping-cart.png') }}"/>
                                                </span>
                                            </p>
                                        </div>  
                                    </div>

                                    <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $product->category }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <!--<span aria-hidden="true">&times;</span>-->
                                                    </button>


                                                    <h5 style="color: #000;">Ukupna cena: 
                                                        @if($product->category == "pizze") 

                                                            <span id="totalPrice{{ $product->id }}" mainPrice="{{ $product->cena_32 }}"><b>{{ $product->cena_32 }}</b> rsd</span> 

                                                        @else 

                                                            <span id="totalPrice{{ $product->id }}" mainPrice="{{ $product->cena }}"><b>{{ $product->cena }}</b> rsd</span> 

                                                        @endif
                                                    </h5>


                                                </div>
                                                <div class="modal-body">

                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-12">
                                                            <h6><b>Izaberite kolicinu</b></h6>
                                                        </div>
                                                        <div class="col-12">
                                                            <div onclick="decrementQnt({{ $product->id }})" style="padding: 10px 14px; background-color: #000; color: #fff; display: inline-block; margin-right: 10px;">
                                                                -
                                                            </div>
                                                            <div style="display: inline-block;">
                                                                <b id="qnt{{ $product->id }}">1</b>
                                                            </div>
                                                            <div onclick="incrementQnt({{ $product->id }})" style="padding: 10px 12px; background-color: #000; color: #fff; display: inline-block; margin-left: 10px;">
                                                                +
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <script>

                                                        function incrementQnt(id){

                                                            var currentQnt = $("#qnt"+id).text();

                                                            if(parseInt(currentQnt) > 0 && parseInt(currentQnt) < 10){

                                                                var totalQnt = parseInt(currentQnt) + 1;
                                                                $("#qnt"+id).text(totalQnt);

                                                                var currPrice = $("#totalPrice"+id).attr("mainPrice");

                                                                setProductPrice(id, totalQnt, currPrice);

                                                            }

                                                        }  

                                                        function decrementQnt(id){

                                                            var currentQnt = $("#qnt"+id).text();

                                                            if(parseInt(currentQnt) > 1 && parseInt(currentQnt) < 11){

                                                                var totalQnt = parseInt(currentQnt) - 1;
                                                                $("#qnt"+id).text(totalQnt);

                                                                var currPrice = $("#totalPrice"+id).attr("mainPrice");

                                                                setProductPrice(id, totalQnt, currPrice);

                                                            }

                                                        }

                                                        function setProductPrice(id, totalQnt, currPrice){

                                                            var newPrice = currPrice * totalQnt;
                                                            $("#totalPrice"+id).text(newPrice+' rsd');

                                                        }
                                                    
                                                    </script>


                                                    @if($product->category == "pizze")

                                                        <label><b>Izaberite velicinu</b></label>
                                                        <select name="pizza_size_price" class="form-control">
                                                            <option selected value="{{ $product->cena_32 }}">32cm</option>
                                                            <option value="{{ $product->cena_50 }}">50cm</option>
                                                        </select>

                                                    @endif

                                                    
                                                    @if(count($dodaci) > 0)
                                                    
                                                        @foreach($dodaci as $dodatak)

                                                            @if(count($productDodatak) > 0)

                                                                @foreach($productDodatak as $prodDodatak)

                                                                    @if($product->id == $prodDodatak->id_product)

                                                                        @if($dodatak->id == $prodDodatak->id_dodatak)

                                                                            <input type="checkbox" name="dodatak[]" value="{{ $dodatak->dodatak_price }}">   {{ $dodatak->dodatak_name }} - <b>{{ $dodatak->dodatak_price }} rsd</b> <br>

                                                                        @endif

                                                                    @endif

                                                                @endforeach

                                                            @endif

                                                        @endforeach

                                                    @endif

                                                </div>
                                                <div class="modal-footer">
                                                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            @else

                                <h6 style="color: #fff;">Trenutno nema proizvoda u ovoj kategoriji</h6>

                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid map_section" style="background-image: url('{{ asset('images/web/google-map.png') }}');">
            
        </div>


    @include("inc/footer")

    
        

@endsection