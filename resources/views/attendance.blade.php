@extends('layouts.agent.home')

@section('content')
    <div class='row'>
        <div class="col-md-12">
            <ul>
            @foreach($user_logins->user_logins as $login)
                <li>{{ $login->event }}</li>
                <li>{{ $login->user_id }}</li>

            @endforeach
            </ul>
        </div>
    </div><!-- /.row -->
@endsection