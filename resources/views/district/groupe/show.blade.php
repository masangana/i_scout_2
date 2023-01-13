@extends('layouts.app3')

@section('menu')
    @include('district.menu')
@endsection


@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-6">

        @include('user.create')

      </div>

      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title"> {{$groupes->name}}  | {{$groupes->code}}</h5>
            <p class="card-text"> Equipe administrative </p>
                @if ($groupes->users)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($groupes->users as $index => $user)
                            <tr>
                                <th scope="row"> {{$index+1}} </th>
                                <td> {{$user->name}} </td>
                                <td> {{$user->email}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                @endif
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
