@extends('admin/layouts/mas')

@section('style')

    <style>
        
        li{
            list-style-type: none;
        }
        
        .lek{
            background-color: #2183CF;
            color: #fff;
            padding-top: 40px;
            padding-bottom: 40px;
            margin-top: 30px;
        }

        .lek a{
            background-color: #EC600A;
            color: #fff;
            border: none;
        }

    </style>

@endsection

@section('data')


    <div class="row">
        <div class="col-12 col-md-4">
            <h4>Dobrodošli u <b>NAZIV FIRME</b> Admin panel</h4>
            <p>Sa leve strane se nalaze sve aktivne opcije ovog panela</p>
            <div style="border-bottom: 1px solid #c5c5c5; margin-bottom: 30px;"></div>
        </div>
    </div>
    
    <div class="row" style="padding-left: 15px; padding-right: 15px;">

       <!-- <div class="col-12 col-md-3 text-center">
            <div class="lek">
                <h3>Ukupno lekova u bazi</h3>
                <h1><b></b></h1>
                <br>
                <a class="btn btn-default" href="/admin/dodaj-lek">Dodajte novi lek</a>
                <a class="btn btn-default" href="/admin/lista-lekova">Lista lekova</a>
            </div>
        </div>

        <div class="col-12 col-md-3 text-center">
            <div class="lek">
                <h3>Ukupno proizvođača u bazi</h3>
                <h1><b></b></h1>
                <br>
                <a class="btn btn-default" href="/admin/dodaj-fabriku">Dodajte proizvođača</a>
                <a class="btn btn-default" href="/admin/lista-fabrika">Lista proizvođača</a>
            </div>
        </div>

        <div class="col-12 col-md-3 text-center">
            <div class="lek">
                <h3>Ukupno legendi u bazi</h3>
                <h1><b></b></h1>
                <br>
                <a class="btn btn-default" href="/admin/dodaj-legende">Dodajte legendu</a>
                <a class="btn btn-default" href="/admin/lista-legende">Lista legendi</a>
            </div>
        </div>

        <div class="col-12 col-md-3 text-center">
            <div class="lek">
                <h3>Ukupno nosioca u bazi</h3>
                <h1><b></b></h1>
                <br>
                <a class="btn btn-default" href="/admin/dodaj-nosioce">Dodajte nosioca</a>
                <a class="btn btn-default" href="/admin/lista-nosioca">Lista nosioca</a>
            </div>
        </div>-->

    </div>


@endsection