@extends('layouts.app')
@section('title','Chanchito | Dashboard')
@section('body-class','product-page')
@section('content') 
<div class="header header-filter" style="background-image: url('https://pbs.twimg.com/media/EYT5JELUcAA-Vx1.jpg:large');">

</div>

<div class="main main-raised">
    <div class="container"> 

        <div class="section ">
            <h2 class="title text-center">Dashboard</h2>
            <div class="card-body">
                @if (session('notificacion'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notificacion') }}
                    </div>
                @endif
                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                    <li class="active">
                        <a href="#dashboard" role="tab" data-toggle="tab">
                            <i class="material-icons">dashboard</i>
                            Carrito de compras
                        </a>
                    </li>
                    
                    <li>
                        <a href="#tasks" role="tab" data-toggle="tab">
                            <i class="material-icons">list</i>
                            Pedidos realizados
                        </a>
                    </li>
                </ul>
                <hr>
              <p>Tu carrito de compra presenta {{auth()->user()->cart->details->count()}} productos</p>     
               <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-left">Nombre</th>
                        <th class="text-right">Precio</th>
                        <th class="text-right">Cantidad</th>
                        <th class="text-right">SubTotal</th>
                        <th class="text-right">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (auth()->user()->cart->details as $detail) 
                    <tr>
                        <td class="text-center">
                            <img src="{{$detail->product->featured_image_url}}" height="60px" alt="">
                        </td>
                        <td>
                            <a href="{{url('/products/'.$detail->product->id)}}"target="_blank">{{$detail->product->name}}</a>
                        </td>
                        <td class="text-right"> ${{$detail->product->price}}</td>
                        <td class="text-right">{{$detail->cantidad}}</td>
                        <td class="text-right">${{$detail->cantidad*$detail->product->price}}</td>
                        <td class="td-actions text-right">
                           
                            <form action="{{url('/cart')}}" method="post">
                                {{ csrf_field() }}
                                {{method_field('DELETE')}}
                                 <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                <a href="{{'/products/'.$detail->product->id}}" type="button" rel="tooltip" title="Ver producto" target="_blank" class="btn btn-info btn-simple btn-xs">
                                    <i class="fa fa-info"></i>
                                </a>
                                <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
            <form action="{{url('/order')}}" method="post">
             {{ csrf_field() }}
            <button class="btn btn-primary btn-round">
             <i class="material-icons">done</i> 
             Pedidos realizados </button>
            </form>
            </div>            
                
            </div>

    </div>

</div>

@include('includes.footer')

@endsection
