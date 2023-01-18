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
<section class="section">
    
</section>

<section class="section profile">
  <div class="row">

    <div class="col-xl-12">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">
            @if (Auth::user()->role == 'district')
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Vue Globale</button>
              </li>
            @endif
            

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Liste</button>
            </li>

          </ul>
          <div class="tab-content pt-2">
            @if (Auth::user()->role == 'district')
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
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
                </div>
            @endif
            
            <div class="tab-pane fade profile-edit pt-3  @if(!Request()->routeIs('groupe.meute')) show active @endif" id="profile-edit">

              <!-- Profile Edit Form -->
                <h5 class="card-title">Profile Details @if(!Request()->routeIs('groupe.meute')) {{$groupes->name}}  @endif</h5>
                @include('personne.index')        
              <!-- End Profile Edit Form -->

            </div>
          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>
@endsection
