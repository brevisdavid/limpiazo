@extends('layouts.app')
@section('body-class','signup-page') 
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('/img/city.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <!--<form class="form" method="" action="">-->
                   <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}  
                       <div class="header header-primary text-center">
                            <h4>Registro</h4>
                          <!--   <div class="social-line">
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>-->
                        </div>
                        <p class="text-divider">Completa tus datos</p>
                        <div class="content">

                             <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"name="name"  placeholder="Ingrese su nombre..."value="{{ old('name') }}" required autocomplete="name" autofocus>

                              </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                               <!-- <input type="text" class="form-control" placeholder="Email...">-->
                                <input id="email" type="email" class="form-control" placeholder="Correo electronico" @error('email') is-invalid @enderror" name="email" 
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password" type="password" placeholder="Contrase??a..." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                             </div>
                             <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password-confirm" type="password" placeholder="Confimar contrase??a..." 
                                class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">

                            </div>


                             <!-- If you want to add a checkbox to this form, uncomment this code-->
                            {{-- <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember')? 'checked' : '' }}>
                                    Recordar Sesi??n
                                </label>
                            </div> --}}
                         </div>
                        <div class="footer text-center">
                          <!-- <a href="#pablo" class="btn btn-simple btn-primary btn-lg">Ingresar</a>-->
                           <button type="submit" value=""class="btn btn-info">Confirmar Registro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')

</div>
@endsection
