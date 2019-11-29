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

        <form action="/admin/dodaj-administratora" method="POST">
            @csrf
            <div class="col-12 col-md-1"></div>

            <div class="col-12 col-md-10">

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
                        <h4>Dodaj administratora</h4>
                        <div style="border-bottom: 1px solid #c5c5c5; margin-bottom: 30px;"></div>
                    </div>
                </div>

                <div class="row">
    
                    <div class="form-group col-12 col-md-4">

                        <label for="">Ime</label>
                        <input class="form-control" type="text" name="name">
    
                    </div>

                    <div class="form-group col-12 col-md-4">

                        <label for="">Email</label>
                        <input class="form-control" type="text" name="email">
    
                    </div>

                    <div class="form-group col-12 col-md-4">

                        <label for="">Lozinka</label>
                        <input class="form-control" type="password" name="password">
    
                    </div>
    
                </div>

                <div class="row">
                    <div class="form-group col-12 col-md-4">

                        <button class="btn btn-success">Dodaj admina</button>
    
                    </div>
                </div>
                
            </div>

        </form>


    </div>





@endsection