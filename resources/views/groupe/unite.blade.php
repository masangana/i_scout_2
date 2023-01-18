<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-capitalize">{{$unite}} </h5>
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
                  <th scope="col">Status</th>
                  <th scope="col">Date de naissance</th>
                  <th scope="col">Age</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($personnes as $index => $personne )
                    <tr>
                        <th scope="row"> {{$index+1}} </th>
                        <td class="capitalize">
                            <a href="{{Route('personnes.show', $personne )}} ">
                             {{ $personne->nom }} 
                            </a>
                        </td>
                        <td> {{ $personne->post_nom }} </td>
                        <td> {{ $personne->prenom }}</td>
                        <td> 
                            @if ($personne->is_active)
                              <span class="badge bg-success">Actif</span>
                            @else
                              <span class="badge bg-danger">Non Actif</span>
                            @endif
                        </td>
                        <td>{{ $personne->date_naissance->format('d-m-Y') }}</td>
                        <td>{{ $personne->age() }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('personnes.show', $personne->id) }}"
                                        disabled><i class="bx bx-edit-alt me-1" ></i> Voir</a
                                    >
                                    

                                    <form id="delete-form-{{ $personne->id }}" action="{{ route('personnes.destroy', ['personne' => $personne->id]) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a class="dropdown-item" href="{{ route('personnes.is_active', ['personne' => $personne->id]) }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('active-form-{{ $personne->id }}').submit();"
                                        ><i class='bx bx-power-off'></i> 
                                        {{$personne->is_active ? 'Desactiver' : 'Activer'}}
                                    </a>

                                    <form id="active-form-{{ $personne->id }}" action="{{ route('personnes.is_active', ['personne' => $personne->id]) }}" method="POST">
                                        @csrf

                                    </form>

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>