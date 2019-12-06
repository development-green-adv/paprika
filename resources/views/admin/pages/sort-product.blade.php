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
        
        <form action="/admin/sort-product" method="POST">
            @csrf
            <div class="col-12 col-md-1"></div>

            <div class="col-12 col-md-10">

                <div class="row">
                    <div class="col-12 col-md-12">
                        <h4>Sortiraj Proizvode</h4>
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

                <div class="row">
                    
                    <div class="col-12 col-md-12">
                        
                        <div class="row">

                            <div class="form-group col-12 col-md-4">

                                <label for="">Izaberite kategoriju</label>
                                <select class="form-control" name="category" id="category">

                                    <option value="" selected disabled>Izaberite kategoriju</option>
                                    <option value="pizze">Pizze</option>
                                    <option value="sendvici">Sendvici</option>
                                    <option value="stromboli">Stromboli</option>
                                    <option value="rostilj">Rostilj</option>
                                    <option value="rostilj-na-kilo">Rostilj na kilo</option>
                                    <option value="pomfrit">Pomfrit</option>
                                    <option value="palacinke">Palacinke</option>
                                    
                                </select>
        
                            </div>

                        </div>

                    </div>

                </div>

                
            </div>

        </form>

    </div>

    <script>
        
        $("#category").on("change", function(){

            var cat = $(this).val();

            $.ajax({
                url:"/admin/get-sort-product",
                method:"POST",
                data: cat,
                success:function(data)
                {
                    console.log(data);
                }
            });

        });
    
    </script>


@endsection