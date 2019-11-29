@extends('admin/layouts/loginMaster')

@section('style')

    <style>
        
        li{
            list-style-type: none;
        }

        .vcenter {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%,-50%);
        }

        input{
            width: 40% !important;
            margin-left: auto;
            margin-right: auto;
        }

        .col-md-6{
            width: 400px;
            -webkit-box-shadow: 7px 7px 14px -2px rgba(0,0,0,0.75);
            -moz-box-shadow: 7px 7px 14px -2px rgba(0,0,0,0.75);
            box-shadow: 7px 7px 14px -2px rgba(0,0,0,0.75);
        }

        .col-md-6 input{
            width: 100% !important;
        }

        button{
            background-color: #a5d549 !important;
            color: #fff !important;
        }

        a{
            color: #727272 !important;
        }

        .sho{
            display: block;
        }

    </style>

@endsection

@section('login')
 
    <div class="container">
        <div class="row" style="height: 100vh;">
            <div class="col-md-3"></div>

            <div class="col-md-6 text-center vcenter sho">
                
                <img style="margin-top: 20px; margin-bottom: 30px;" src="{{ asset('images/web/logo.jpg') }}" alt="Green Advertising" style="margin-bottom: 20px;"> 
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="form-group row">
        
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Korisnicko ime" required autocomplete="email" autofocus>
        
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="form-group row">
        
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Lozinka" required autocomplete="current-password">
        
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-default">
                                    {{ __('Ulogujte se') }}
                                </button>
                                
                            </div>
                        </div>
                    </form>
                    <a style="margin-bottom: 15px !important;" href="https://www.green-adv.rs" target="_blank">Sva prava zadržana © Green Advertising - 2019</a><br><br>
                </div>
            </div>
        </div>
    </div>


    <script>
        
        /*$(document).ready(function(){

            setTimeout(function(){
                $(".sho").show("slow");
            }, 500);
            
        });*/

    </script>

@endsection