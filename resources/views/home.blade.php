@extends('layouts.app3')

@section('menu')
    @if (Auth::user()->role == 'district')
        @include('district.menu')
    @elseif (Auth::user()->role == 'groupe')
        @include('groupe.menu')
    @elseif (Auth::user()->role == 'province')
        @include('province.menu')
    @endif
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenue') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes connectés. Retournez sur votre tableau de bord!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
