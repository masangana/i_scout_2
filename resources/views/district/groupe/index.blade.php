
@extends('layouts.app3')

@section('menu')
    @include('district.menu')
@endsection

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Districts</h5>
            <p>
              La liste des districts de la district scoute {{$district->name}}
            </p>
            @if ($district)
                 <table class="table datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">district</th>
                        <th scope="col">Code</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($district->groupes as $index => $groupe )
                            <tr>
                                <th scope="row">{{$index+1}}</th>
                                <td>{{$groupe->name}}</td>
                                <td>{{$district->name}}</td>
                                <td>{{$groupe->code}} </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('groupes.show', $groupe->id) }}"
                                            ><i class='bx bx-plus-circle'></i> Voir</a
                                        >
                                        <a class="dropdown-item" href="{{ route('groupes.destroy', ['groupe' => $groupe->id]) }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('delete-form-{{ $groupe->id }}').submit();"
                                            ><i class="bx bx-trash me-1"></i> Delete</a
                                        >

                                        <form id="delete-form-{{ $groupe->id }}" action="{{ route('groupes.destroy', ['groupe' => $groupe->id]) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach              
                    </tbody>
                </table>
            @else
               
            @endif
            
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection