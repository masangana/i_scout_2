@extends('layouts.app3')

@section('menu')
    @include('province.menu')
@endsection

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-6">

        @include('user.create')

      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Creer Element</h5>

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection