
@extends('layouts.app3')

@section('menu')
    @include('province.menu')
@endsection

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Districts</h5>
            <p>
              La liste des districts de la province scoute {{$province->name}}
            </p>
            @if ($province)
                 <table class="table datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Province</th>
                        <th scope="col">Code</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($province->districts as $index => $district )
                            <tr>
                                <th scope="row">{{$index+1}}</th>
                                <td>{{$district->name}}</td>
                                <td>{{$province->name}}</td>
                                <td>{{$district->code}} </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" href="{{ route('districts.show', $district->id) }}"
                                            ><i class="bx bx-edit-alt me-1"></i> Show</a
                                        >
                                        <a class="dropdown-item" href="{{ route('districts.edit', $district->id) }}"
                                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                        >
                                        <a class="dropdown-item" href="{{ route('districts.destroy', ['district' => $district->id]) }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('delete-form-{{ $district->id }}').submit();"
                                            ><i class="bx bx-trash me-1"></i> Delete</a
                                        >

                                        <form id="delete-form-{{ $district->id }}" action="{{ route('districts.destroy', ['district' => $district->id]) }}" method="POST" class="d-none">
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