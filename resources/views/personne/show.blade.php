
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
<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="{{asset("images/personnes/".$personne->photo)}}" alt="Profile" class="rounded-circle">
          <h2>{{$personne->prenom}} {{$personne->nom}} </h2>
          <h3>{{$personne->profession}}</h3>
          @if ($personne->is_active)
              <span class="badge bg-success">Actif</span>
          @else
              <span class="badge bg-danger">Non Actif</span>
          @endif
          <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>
            @if (Auth::user()->role == 'groupe')
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>
            @endif

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
             
              <h5 class="card-title"> D??tails Du Profile</h5>

              <div class="row">
                <div class="col-lg-6">
                  <div class="col-lg-3 col-md-4 label ">Nom</div>
                  <div class="col-lg-9 col-md-8"> {{$personne->nom}} {{$personne->post_nom}} {{$personne->prenom}} </div>
                </div>

                <div class="col-lg-6">
                  <div class="col-lg-6 col-md-4 label">Genre</div>
                  <div class="col-lg-6 col-md-8">{{$personne->sexe =='M' ? 'Masculin' : 'Feminin'}}</div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="col-lg-6 col-md-4 label">Lieu de Naissance</div>
                  <div class="col-lg-6 col-md-8">{{$personne->lieu_naissance}}</div>
                </div>
                <div class="col-lg-6">
                  <div class="col-lg-6 col-md-4 label">Date de Naissance</div>
                  <div class="col-lg-6 col-md-8">{{$personne->date_naissance->format('d/m/Y')}}</div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-lg-6">
                  <div class="col-lg-6 col-md-4 label">Nationalit??</div>
                  <div class="col-lg-6 col-md-8">{{$personne->nationalite}}</div>
                </div>
                <div class="col-lg-6">
                  <div class="col-lg-6 col-md-4 label">Adresse</div>
                  <div class="col-lg-6 col-md-8">{{$personne->adresse}}</div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="col-lg-6 col-md-4 label">Profession</div>
                  <div class="col-lg-6 col-md-8">{{$personne->profession}}</div>
                </div>
                <div class="col-lg-6">
                  <div class="col-lg-6 col-md-4 label">T??l??phone</div>
                  <div class="col-lg-6 col-md-8">{{$personne->telephone}}</div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="col-lg-6 col-md-4 label">E-mail</div>
                  <div class="col-lg-6 col-md-8">{{$personne->email}}</div>
                </div>
                <div class="col-lg-6">
                  <div class="col-lg-6 col-md-4 label">Etat Civil</div>
                  <div class="col-lg-6 col-md-8">{{$personne->etat_civil}}</div>
                </div>
              </div>
              <hr>
              <div class="row">
                
                <div class="col-lg-6">
                  <div class="col-lg-3 col-md-4 label">Totem</div>
                  <div class="col-lg-9 col-md-8">{{$personne->totem}}</div>
                </div>
                <div class="col-lg-6">
                  <div class="col-lg-6 col-md-4 label">Unit??</div>
                  <div class="col-lg-6 col-md-8">{{$personne->unite}}</div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="col-lg-6 col-md-4 label">Province</div>
                  <div class="col-lg-6 col-md-8">{{$personne->province->name}}</div>
                </div>
                <div class="col-lg-6">
                  <div class="col-lg-6 col-md-4 label">District</div>
                  <div class="col-lg-6 col-md-8">{{$personne->district->name}}</div>
                </div>
                
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="col-lg-6 col-md-4 label">Groupe</div>
                  <div class="col-lg-6 col-md-8">{{$personne->groupe->name}}</div>
                </div>
              </div>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form>
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <img src="assets/img/profile-img.jpg" alt="Profile">
                    <div class="pt-2">
                      <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                      <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="job" type="text" class="form-control" id="Job" value="Web Designer">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="country" type="text" class="form-control" id="Country" value="USA">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>
          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>
@endsection