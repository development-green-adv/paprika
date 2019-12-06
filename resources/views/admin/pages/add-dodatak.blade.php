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
        
        <form action="/admin/add-dodatak" method="POST">
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

                

                <div class="row">
                    
                    <div class="col-12 col-md-12">
                        
                        <div class="row">

                            <div class="form-group col-12 col-md-4">

                                <label for="">Ime dodatka</label>
                                <input class="form-control" type="text" name="dodatak_name">
        
                            </div>

                            <div class="form-group col-12 col-md-4">

                                <label for="">Cena dodatka</label>
                                <input class="form-control" type="text" name="dodatak_price">
        
                            </div>

                            <div class="col-12 col-md-4">

                                <label for="">Status dodatka</label>
                                <select class="form-control" name="status">

                                    <option value="1">Aktivan</option>
                                    <option value="0">Neaktivan</option>
                                    
                                </select>
        
                            </div>
    

                        </div>

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


@endsection