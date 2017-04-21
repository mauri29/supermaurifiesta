@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="fa fa-2x fa-users" aria-hidden="true"></i>&nbsp; {{ trans('buy.title') }}
                        <form action="/buy" method="post" class="pull-right">
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
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h3>Your friends</h3>
                                        @if(!$friends->count())
                                            <p>You have no friends</p>
                                        @else
                                            @foreach($friends as $user)
                                                @include('user/partials/userblock')
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <h4>Friend requests</h4>
                                        @if(!$requests->count())
                                            <p>You have no friend requests.</p>
                                        @else
                                            @foreach($requests as $user)
                                                @include('user.partials.userblock')
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection