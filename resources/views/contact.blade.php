@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-danger">
                    <div class="panel-heading"><i class="fa fa-2x fa-users" aria-hidden="true"></i>&nbsp; {{ trans('contact.title') }}
                        <form action="/contact" method="post" class="pull-right">
                            <select name="locale" onchange="this.form.submit();">
                                <option value="de" {{ App::getLocale() == 'de' ? ' selected' : '' }}>Deutsch</option>
                                <option value="es" {{ App::getLocale() == 'es' ? ' selected' : '' }}>Español</option>                           
                            </select>
                            {{ csrf_field() }}
                        </form>  
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1">
                                    <p>{!! trans('contact.intro') !!}</p>
                                    <p>{!! trans('contact.main') !!}</p>
                                    <p>{!! trans('contact.conclusion') !!}</p>
                                    <p>{!! trans('contact.motto') !!}</p> 
                                    
                            </div>
                            <center><a href="{{ route('product.index') }}" type="button" class="btn btn-danger">{{ trans('contact.product') }}</a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection