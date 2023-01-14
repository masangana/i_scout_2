
@extends('layouts.app3')

@section('menu')
    @include('groupe.menu')
@endsection

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title capitalized">La route </h5>
            <p>
              Votre {{$unite}} compte {{$count}} membre(s). 
              Vous trouverez plus d'info dans le tableau 
            </p>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Post-Nom</th>
                  <th scope="col">Prénom</th>
                  <th scope="col">Date de naissance</th>
                  <th scope="col">Age</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($routiers as $index => $routier )
                    <tr>
                        <th scope="row"> {{$index+1}} </th>
                        <td class="capitalize">
                            <a href="{{Route('personnes.show', $routier )}} ">
                             {{ $routier->nom }} 
                            </a>
                        </td>
                        <td> {{ $routier->post_nom }} </td>
                        <td> {{ $routier->prenom }}</td>
                        <td>{{ $routier->date_naissance }}</td>
                        <td>{{ $routier->age() }}</td>
                        
                    </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection