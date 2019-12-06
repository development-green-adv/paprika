@extends('admin/layouts/mas')

@section('style')

    <style>
        
        .modal-img {
            margin-bottom: auto;
            margin-top: auto;
        }
        #slike img {
            max-width: 150px;
            margin-top: 10px;
        }
    
    </style>

@endsection

@section('data')

    <div class="row">
        
        <form action="/admin/edit-product" method="POST">
            @csrf
            <div class="col-12 col-md-1"></div>

            <div class="col-12 col-md-10">

                <div class="row">
                    <div class="col-12 col-md-12">
                        <h4>Dodaj Proizvod</h4>
                        <div style="border-bottom: 1px solid #c5c5c5; margin-bottom: 30px;"></div>
                    </div>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session()->has('success'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(session()->has('messageError'))
                    <div class="alert alert-danger text-center">
                        {{ session()->get('messageError') }}
                    </div>
                @endif

                <input type="hidden" name="id" value="{{ $product->id }}">

                <div class="row">
                    
                    <div class="col-12 col-md-12">
                        
                        <div class="row">

                            <div class="form-group col-12 col-md-4">

                                <label for="">Izaberite kategoriju</label>
                                <select class="form-control" name="category" id="category">

                                    <option value="" selected disabled>Izaberite kategoriju</option>
                                    <option @if($product->category == "pizze") selected @endif value="pizze">Pizze</option>
                                    <option @if($product->category == "sendvici") selected @endif value="sendvici">Sendvici</option>
                                    <option @if($product->category == "stromboli") selected @endif value="stromboli">Stromboli</option>
                                    <option @if($product->category == "rostilj") selected @endif value="rostilj">Rostilj</option>
                                    <option @if($product->category == "rostilj-na-kilo") selected @endif value="rostilj-na-kilo">Rostilj na kilo</option>
                                    <option @if($product->category == "pomfrit") selected @endif value="pomfrit">Pomfrit</option>
                                    <option @if($product->category == "palacinke") selected @endif value="palacinke">Palacinke</option>
                                    
                                </select>
        
                            </div>

                            <div class="form-group col-12 col-md-4">

                                <label for="">Naziv proizvoda</label>
                                <input class="form-control" type="text" name="title" value="{{ $product->title }}">
        
                            </div>

                            <div class="form-group col-12 col-md-4">

                                <label for="">Opis proizvoda</label>
                                <input class="form-control" type="text" name="description" value="{{ $product->description }}">
        
                            </div>

                        </div>


                        <div class="row">

                            <div class="form-group col-12 col-md-4" id="glavna_cena">

                                <label>Cena proizvoda</label>
                                <input class="form-control" type="text" name="cena" value="{{ $product->cena }}">

                            </div>

                            <div class="form-group col-12 col-md-4">

                                <label>Proizvod na naslovnoj</label>
                                <select class="form-control" name="na_naslovnoj">

                                    <option value="" selected disabled>Izaberite</option>
                                    <option @if($product->na_naslovnoj == "da") selected @endif value="da">Da</option>
                                    <option @if($product->na_naslovnoj == "ne") selected @endif value="ne">Ne</option>

                                </select>

                            </div>

                        </div>


                        <div class="row" id="pizza_sec">

                            @if($product->category == "pizze")

                                <div class="form-group col-12 col-md-4">

                                    <label>Cena za 32cm</label>
                                    <input class="form-control" type="text" name="pica_32" value={{ $product->cena_32 }}>

                                </div>

                                <div class="form-group col-12 col-md-4">

                                    <label>Cena za 50cm</label>
                                    <input class="form-control" type="text" name="pica_50" value="{{ $product->cena_50 }}">

                                </div>

                            @endif

                        </div>


                        <div class="row text-left">
                            <p style="margin-left: 15px;"><b>Izaberite dodatke</b></p>

                            @if(count($allDodatak) > 0)

                                @foreach($allDodatak as $dodatak)

                                    <div class="col-12 col-md-2">
                                        <input type="checkbox" name="dodatak[]" @if(in_array($dodatak->id, $productDodatak)) checked @endif value="{{ $dodatak->id }}"> <span style="margin-left: 7px;">{{ $dodatak->dodatak_name }} ( <b>{{ $dodatak->dodatak_price }} rsd</b> )</span>
                                    </div>                                    

                                @endforeach

                            @endif

                        </div>
                        <br>
                    
                        <div class="row">

                            <div class="form-group col-12 col-md-4">
                    
                                <label>Slika proizvoda</label><br>
                                <span class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Izaberi</span>
                                <div id="glavna-slika"></div>

                            </div>

                        </div>


                        <div class="row">

                            <div class="col-12 col-md-4">

                                <label for="">Status proizvoda</label>
                                <select class="form-control" name="status">

                                    <option value="1">Aktivan</option>
                                    <option value="0">Neaktivan</option>
                                    
                                </select>
        
                            </div>

                        </div>
                        
                        <br>

                        <div class="row">

                            <div class="col-12 col-md-6">

                                <button class="btn btn-success">Sačuvaj</button>
        
                            </div>

                        </div>

                    </div>

                </div>

                
            </div>

        </form>

    </div>


    



    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Dodajte fotografije u biblioteku</h4>
                </div>
                <div class="modal-body">
                    <div style="border-bottom: 2px solid #c5c5c5; padding-bottom: 10px;">
                        <p><b>Izaberite fotografije sa racunara</b></p>


                        <form action="/admin/dodaj-galeriju-slika" id="upload_form" method="POST" enctype="multipart/form-data">

                            @csrf
                            <input type="file" name="images[]" id="galImg" multiple>
                            <button id="submitGallery" style="margin-top: 10px;" class="btn btn-primary">Sačuvaj</button>
                            <button style="margin-top: 10px;float:right; margin-right: 10px;" class="btn btn-primary galleryImages" onclick="showInDiv()">Sačuvaj galeriju</button>
                        </form>
                        

                    </div>

                    <div class="row" id="gallery-images">
                        @if(count($allImages) > 0)
                            @foreach ($allImages as $image)
                                <div class="col-12 col-md-3" style="margin-top: 30px; height: 120px; width: 120px; overflow: hidden; display: inline-flex;">
                                <img class="img-responsive modal-img" id="{{ $image->id }}" name="{{ $image->image_name }}" onclick="getImageValue({{ $image->id }})" src="../images_gallery/{{ $image->image_name }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                </div>
            </div>
        
        </div>
    </div>


    <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Dodajte fotografije u biblioteku</h4>
                </div>
                <div class="modal-body">
                    <div style="border-bottom: 2px solid #c5c5c5; padding-bottom: 10px;">
                        <p><b>Izaberite fotografije sa racunara</b></p>


                        <form action="/admin/dodaj-galeriju-slika" id="upload_form1" method="POST" enctype="multipart/form-data">

                            @csrf
                            <input type="file" name="images[]" id="galImg1" multiple>
                            <button id="submitGallery" style="margin-top: 10px;" class="btn btn-primary">Sačuvaj</button>
                            <button style="margin-top: 10px; float:right;" class="btn btn-primary mainImage" onclick="showInDivMain()">Sačuvaj glavnu sliku</button>
                        </form>
                        

                    </div>

                    <div class="row" id="gallery-images1">
                        @if(count($allImages) > 0)
                            @foreach ($allImages as $image)
                                <div class="col-12 col-md-3" style="margin-top: 30px; height: 120px; width: 120px; overflow: hidden; display: inline-flex;">
                                <img class="img-responsive modal-img bor" id="1{{ $image->id }}" name="{{ $image->image_name }}" onclick="getImageValue1({{ $image->id }})" src="../images_gallery/{{ $image->image_name }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                </div>
            </div>
        
        </div>
    </div>


    <script>
        
        

    </script>


    <script>

        var imageArray = [];
        var imageArray1 = [];

        function getImageValue(id){

            var data = $('#' + id).attr('name');

            if(imageArray.includes(data) == false){

                imageArray.push(data);
                $("#"+id).css("border", "4px solid red");

            }else{
                var index = imageArray.indexOf(data);
                if (index > -1) {
                imageArray.splice(index, 1);
                $("#"+id).css("border", "none");

                }
            }

        }



        function getImageValue1(id){

            var data = $('#' + id).attr('name');
            $(".bor").css("border", "none");

            if(imageArray1.includes(data) == false){
                $("#1"+id).css("border", "none");

                imageArray1 = [];
                imageArray1.push(data);
                $("#1"+id).css("border", "4px solid red");

            }else{

                imageArray1 = [];

                imageArray1.push(data);
                $("#1"+id).css("border", "none");
                
            }


        }


        function showInDiv(){

            var arrayLength = imageArray.length;

            $("#slike").empty();

            for (var i = 0; i < arrayLength; i++) {

                var img = "<img class='img-responsive' src='../images_gallery/"+imageArray[i]+"'/>";
                var input = "<input type='hidden' name='galleryImages[]' value="+imageArray[i]+" />";

                $("#slike").append(img);
                $("#slike").append(input);
            }

        }
        

        function showInDivMain(){

            var arrayLength1 = imageArray1.length;

            $("#glavna-slika").empty();

            for (var i = 0; i < arrayLength1; i++) {

                var img1 = "<img class='img-responsive' src='../images_gallery/"+imageArray1[i]+"'/>";
                var input1 = "<input type='hidden' name='mainImage' value="+imageArray1[i]+" />";

                $("#glavna-slika").append(img1);
                $("#glavna-slika").append(input1);
            }
            
        }
        


    </script>


    <script>
        
        $(document).ready(function(){

            $('#upload_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"/admin/dodaj-galeriju-slika",
                    method:"POST",
                    data:new FormData(this),
                    // dataType:'JSON',
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        //console.log(data);
                        $("#gallery-images").fadeOut(200);

                        $("#gallery-images").empty();

                        for(var i = 0; i < data.length; i++){
                            $('#gallery-images').append('<div class="col-12 col-md-3" style="margin-top: 30px; height: 120px; width: 120px; overflow: hidden; display: inline-flex;"><img class="img-responsive modal-img" id="'+ data[i]['id'] +'" name="'+ data[i]['image_name'] +'" onclick="getImageValue('+ data[i]['id'] +')" src="/public/images_gallery/' + data[i]['image_name'] + '"></div>');   
                        }

                        $("#gallery-images").fadeIn(4000);

                        $("#galImg").val("");
                    }
                })
            });

        });


        $(document).ready(function(){

            $('#upload_form1').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"/admin/dodaj-galeriju-slika",
                    method:"POST",
                    data:new FormData(this),
                    // dataType:'JSON',
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        console.log(data);
                        $("#gallery-images1").fadeOut(200);

                        $("#gallery-images1").empty();

                        for(var i = 0; i < data.length; i++){
                        $('#gallery-images1').append('<div class="col-12 col-md-3" style="margin-top: 30px; height: 120px; width: 120px; overflow: hidden; display: inline-flex;"><img class="img-responsive modal-img" id="'+ data[i]['id'] +'" name="'+ data[i]['image_name'] +'" onclick="getImageValue1('+ data[i]['id'] +')" src="/public/images_gallery/' + data[i]['image_name'] + '"></div>');   
                        }

                        $("#gallery-images1").fadeIn(4000);

                        $("#galImg1").val("");
                    }
                })
            });

        });

    </script>


    <script>

        var rb = 0;
        $(".add-video-link").click(function(){
            rb++;
            var input = "<div class='row' id='"+rb+"'><div class='col-11 col-md-11'> <input id='"+rb+"' style='margin-top: 15px;' class='form-control input' type='text' name='video_link[]' placeholder='Unesite link'></div> <div class='col-1 col-md-1 text-right'><div style='margin-top: 14px;' class='btn btn-danger' onclick='remove(this)' id='"+rb+"'>-</div></div></div>";
            $(".video-box").append(input);
        });

        function remove(el){
            $("div#" + el.id).remove();
        }

    </script>

    <script>
        
        $(document).ready(function(){

            //$("#pizza_sec").css("display", "none");

        });


        $("#category").on("change", function(){

            if($(this).val() == "pizze"){

                $("#pizza_sec").css("display", "block");
                $("#glavna_cena").css("display", "none");

            }else{

                $("#pizza_sec").css("display", "none");
                $("#glavna_cena").css("display", "block");

            }

        });
    
    </script>


@endsection