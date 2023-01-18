@extends('layouts.app3')

@section('menu')
    @include('province.menu')
@endsection

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-2">
      </div>

      <div class="col-lg-8">
        @include('user.create')
      </div>

      <div class="col-lg-2">
      </div>
    </div>
  </section>
@endsection