@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-danger">
                    <div class="panel-heading"><i class="fa fa-2x fa-shopping-cart" aria-hidden="true"></i>&nbsp; {{ trans('shop.kassa') }} 
                        <form action="/shopping-cart" method="post" class="pull-right">
                            <select name="locale" onchange="this.form.submit();">
                                <option value="de" {{ App::getLocale() == 'de' ? ' selected' : '' }}>Deutsch</option>
                                <option value="es" {{ App::getLocale() == 'es' ? ' selected' : '' }}>Español</option>
                            </select>
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class="panel-body">
                        
                        @if(Session::has('cart'))
                            <div class="row">
                                <div class="col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-2">
                                    <center><img src="https://ucarecdn.com/34134a26-904f-46dd-b2cb-0763c33847e0/LogotipoFinal.png" width="80"/> </center>
                                    <center><h6>{!! trans('shop.info') !!}</h6></center>
                                    <center><a href="{{ route('product.index') }}" type="button" class="btn btn-danger">{{ trans('shop.products') }}</a></center><hr>
                                    <div class="post__header">
                                        <strong>{{ trans('shop.string') }}</strong>
                                    </div>
                                    <ul class="list-group">
                                    <!--<h1 class="animated infinite zoomInLeft">Example</h1>-->
                                        @foreach($products as $product)
                                            <li class="list-group-item">
                                                <img src="{{ $product['item']['imagePath'] }}" class="author__image">
                                                &nbsp;<span class="label label-pill label-danger pull-left">{{ $product['qty'] }}</span>&nbsp;<span class="label label-primary pull">{{ $product['weight'] }} kg.</span>&nbsp;<span class="label label-danger pull">{{ $product['price'] }}.- CHF</span><br>
                                                &nbsp;<span class="label label-info pull"><strong>{{ $product['item']['title'] }}</strong></span><br><br>
                                                <!--<span class="badge pull-right">{{ $product['offer'] }} {{ trans('shop.stock') }}</span><br>-->
                                                
                                                <a href="{{ route('product.addByOne', ['id' => $product['item']['id']]) }}" class="btn btn-success dropdown-toogle"><i class="fa fa-plus" aria-hidden="true"></i>{{ trans('shop.up') }}</a>&nbsp;
                                                <a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}" class="btn btn-success dropdown-toogle"><i class="fa fa-minus" aria-hidden="true"></i>{{ trans('shop.down') }}</a>&nbsp;
                                                <a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}" class="btn btn-success dropdown-toogle"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <hr>
                                    <div class="post__header"><strong><i class="fa fa-2x fa-truck" aria-hidden="true"></i> {{ trans('shop.total') }}</strong></div>
                                    <div class="post__author">                                
                                        <ul class="list-group">
                                            <li class="list-group-item"><strong>{{ trans('shop.tpps') }}</strong><span class="pull-right"> {{ $totalPrice }}.- CHF</span></li>
                                            <li class="list-group-item">
                                                <strong>{{ trans('shop.tps') }}</strong> <span class="label label-primary">{{ $totalWeight }} kg.</span> 
                                                </strong>
                                            <span class="pull-right"> {{ $totalPost }}.- CHF</span></li>
                                            <div class="panel-footer">
                                                <strong>{{ trans('shop.total') }} </strong><span class="pull-right">{{ $totalPrice + $totalPost }}.- CHF</span>
                                            </div>
                                            <li class="list-group-item"><img src="https://ucarecdn.com/a414ad0a-be9f-4404-8bde-1bdf7444d297/visabankcardicon33715.png" height="50"><span class="pull-right"> <a href="{{ route('checkout') }}" type="button" class="btn btn-success pull-left"> {{ trans('shop.visa') }}</a></span><center><h6>{!! trans('checkout.checkoutconenvio') !!}</h6></center></li>

                                            <li class="list-group-item"><img src="https://ucarecdn.com/1a9097c7-684e-4f92-877d-320a71371e1a/sgkb_einzahlungsschein_orange.jpg" height="35"><span class="pull-right"> <a href="{{ route('rechnung') }}" type="button" class="btn btn-success pull-right">{{ trans('shop.conti') }}</a></span><center><h6>{!! trans('checkout.rechnungconenvio') !!}</h6></center></li>
                                        </ul>
                                    </div>
                                    <hr>

                                    <div class="post__header"><strong>{{ trans('shop.totalsin') }}</strong></div>
                                    <div class="post__author">                                
                                        <ul class="list-group">
                                            <li class="list-group-item"><strong>{{ trans('shop.tpps') }}</strong><span class="pull-right"> {{ $totalPrice }}.- CHF</span></li>
                                            <li class="list-group-item">
                                                <strong>{{ trans('shop.tps') }}</strong> <span class="label label-primary">{{ $totalWeight }} kg.</span> 
                                                </strong>
                                            <span class="pull-right"> 0.- CHF</span></li>
                                            <div class="panel-footer">
                                                <strong>{{ trans('shop.total') }} </strong><span class="pull-right">{{ $totalPrice }}.- CHF</span>
                                            </div>
                                            <li class="list-group-item"><img src="https://ucarecdn.com/a414ad0a-be9f-4404-8bde-1bdf7444d297/visabankcardicon33715.png" height="50"><span class="pull-right"> <a href="{{ route('checkoutsin') }}" type="button" class="btn btn-success pull-left">{{ trans('shop.visa') }}</a></span><center><h6>{!! trans('checkout.checkoutsinenvio') !!}</h6></center></li>
                                            
                                            <li class="list-group-item"><img src="https://ucarecdn.com/1a9097c7-684e-4f92-877d-320a71371e1a/sgkb_einzahlungsschein_orange.jpg" height="35"><span class="pull-right"> <a href="{{ route('rechnungsin') }}" type="button" class="btn btn-success pull-right">{{ trans('shop.conti') }}</a></span><center><h6>{!! trans('checkout.rechnungsinenvio') !!}</h6></center></li>
                                        </ul>
                                    </div>
                                    <ul>
                                        <li><h6>{{ trans('shop.buy') }}</h6></li>
                                        <li><h6>{{ trans('shop.date') }}</h6></li>
                                        <li><h6>{{ trans('shop.send') }}</h6></li>
                                        <li><h6>{{ trans('shop.post') }}</h6></li>
                                        <li><h6>{{ trans('shop.rechnung') }}</h6></li>
                                        <li><h6>{{ trans('shop.vissa') }}</h6></li>
                                  
                                    </ul>
                                </div>
                            </div>                       
                            <a href="{{ route('product.index') }}" type="button" class="btn btn-danger pull-right">{{ trans('shop.products') }}</a><br>                    
                        @else
                        <center><img src="https://ucarecdn.com/34134a26-904f-46dd-b2cb-0763c33847e0/LogotipoFinal.png" width="80"/> </center>
                                    <center><h5>{{ trans('shop.noproducts') }}</h5></center>
                                    <center><a href="{{ route('product.index') }}" type="button" class="btn btn-danger">{{ trans('shop.products') }}</a></center><hr>            
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection