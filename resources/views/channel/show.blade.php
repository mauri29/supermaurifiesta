@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="fa fa-2x fa-home fa-fw" aria-hidden="true"></i>&nbsp;{{ trans('show.title') }}
                        <form action="/channel/{channel}" method="post" class="pull-right">
                            <select name="locale" onchange="this.form.submit();">
                                <option value="de" {{ App::getLocale() == 'de' ? ' selected' : '' }}>Deutsch</option>
                                <option value="es" {{ App::getLocale() == 'es' ? ' selected' : '' }}>Español</option>                                
                            </select>
                            {{ csrf_field() }}
                        </form>  
                    </div>

                    <div class="panel-body">
                        <div class="media">
                            <div class="col-sm-8 col-md-8 col-md-offset-2 col-sm-offset-2">
                                <center><img src="https://ucarecdn.com/34134a26-904f-46dd-b2cb-0763c33847e0/LogotipoFinal.png" width="80"/> </center>
                                <center><h6>{!! trans('show.info') !!}</h6></center>
                                <hr>
                                <div class="media-left">
                                    <img src="{{ $channel->getImage() }}" class="media-object">
                                </div>
                                <div class="media-body">
                                    <div class="post">
                                        <h3 class="post__header">
                                            {{ trans('show.personal') }}
                                        </h3>
                                        <div class="post__author">
                                            <b>{{ trans('show.name') }}</b> {{ $channel->user->name }}<br>
                                            <b>{{ trans('show.surname') }}</b> {{ $channel->user->surname }}<br>
                                            <b>{{ trans('show.email') }}</b> {{ $channel->user->email }}<br>
                                            <b>{{ trans('show.user') }}</b> #{{ $channel->slug }}<br>
                                        </div>
                                        <h3 class="post__header">
                                            {{ trans('show.address') }}
                                        </h3>
                                        <div class="post__author">
                                            <b>{{ trans('show.addresse') }}</b> {{ $channel->address }}<br>
                                            <b>{{ trans('show.number') }}</b> {{ $channel->number }}<br>
                                            <b>{{ trans('show.post') }}</b> {{ $channel->post }}<br>
                                            <b>{{ trans('show.city') }}</b> {{ $channel->city }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <center><a href="{{ route('product.index') }}" type="button" class="btn btn-danger pull-right">{{ trans('show.product') }}</a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection