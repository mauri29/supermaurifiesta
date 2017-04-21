@extends('layouts.app')

@section('content')

    <div class="containermauri">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="fa fa-2x fa-hand-o-right" aria-hidden="true"></i>&nbsp; {{ trans('index.product') }}
                        <form action="/" method="post" class="pull-right">
                            <select name="locale" onchange="this.form.submit();">
                                <option value="de" {{ App::getLocale() == 'de' ? ' selected' : '' }}>Deutsch</option>
                                <option value="es" {{ App::getLocale() == 'es' ? ' selected' : '' }}>Español</option>
                            </select>
                            {{ csrf_field() }}
                        </form>
                    </div>


                    <div class="panel-body">
                        
                        <center>{{ $products->appends(Request::except('page'))->links()}}</center>
                        @foreach(array_chunk($products->getCollection()->all(), 3) as $row)
                            <div class="row">
                                @foreach($row as $product)
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail">
                                            <img src="{{ $product->imagePath }}" class="img-reponsive" alt="...">
                                            <div class="caption">
                                                <h4><span class="label label-primary pull-right price">{{ $product->price }}.- CHF</span></h4><br>
                                                <strong><div class="pull-left producttt"> {{ $product->title }}</div></strong><br>
                                                <h6 class="teaserde"> {!! $product->teaserde !!}</h6>
                                                <h6 class="teaseres"> {!! $product->teaseres !!}</h6>
                                                <div class="clearfix">
                                                    <div class="pull-left price">{{ $product->offer }} in stock</div><br>
                                                    <a href="{{ route('post.show', [$product->slug]) }}" class="btn btn-info pull-left" role="button">{{ trans('index.info') }}</a>
                                                    <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">{{ trans('index.add') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        <center>{{ $products->appends(Request::except('page'))->links()}}</center>
                        
                        <a href="{{ route('product.shoppingCart') }}" type="button" class="btn btn-danger pull-right">{{ trans('index.kassa') }}</a>

                    </div>
                    
                
                </div>
                
            </div>
        </div>
    </div>
@endsection



