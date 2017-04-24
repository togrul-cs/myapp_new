@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                    @if (Auth::guest())
                        <div><a href="{{ url('/login') }}">Login</a></div>
                    @else

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
