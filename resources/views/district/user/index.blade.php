
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
            <h5 class="card-title">Les Administrateurs </h5>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Email</th>
                  <th scope="col">Groupe</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($groupes as $groupe )
                    @foreach ($groupe->users as $index => $user )
                    <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td>{{$user->name}} </td>
                        <td>{{$user->email}}</td>
                        <td>{{$groupe->name}}</td>
                        <td>
                            @if ($user->is_active)
                                <span class="badge bg-success">Actif</span>
                            @else
                                <span class="badge bg-danger">Non Actif</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}"
                                        disabled><i class="bx bx-edit-alt me-1" ></i> Edit</a
                                    >
                                    <a class="dropdown-item" href="{{ route('users.destroy', ['user' => $user->id]) }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{ $user->id }}').submit();"
                                        ><i class="bx bx-trash me-1"></i> Delete</a>
                                    

                                    <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a class="dropdown-item" href="{{ route('users.is_active', ['user' => $user->id]) }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('active-form-{{ $user->id }}').submit();"
                                        ><i class='bx bx-power-off'></i> 
                                        {{$user->is_active ? 'Desactiver' : 'Activer'}}
                                    </a>

                                    <form id="active-form-{{ $user->id }}" action="{{ route('users.is_active', ['user' => $user->id]) }}" method="POST">
                                        @csrf

                                    </form>

                                </div>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection