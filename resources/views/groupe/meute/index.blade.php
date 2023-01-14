
@extends('layouts.app3')

@section('menu')
    @include('groupe.menu')
@endsection

@section('content')
<section class="section">
    <div class="row">
    <div class="col-lg-2">
    </div>
    
         
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">La Meute du Groupe </h5>
            <p class="card-text">Ajouter un membre dans le groupe</p>
            <hr>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <!-- Multi Columns Form -->
            <form class="row g-3" method="POST" action="{{Route('personnes.store')}}" enctype="multipart/form-data">
                @csrf
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Nom</label>
                <input type="text"
                       class="form-control" 
                       id="inputName5"
                       name="nom"
                       required>
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Post-Nom</label>
                <input type="text"
                       class="form-control" 
                       id="inputName5"
                       name="post_nom"
                       required>
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Prénom</label>
                <input type="text"
                       class="form-control" 
                       id="inputName5"
                       name="prenom"
                       required>
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Totem</label>
                <input type="text"
                       class="form-control" 
                       id="inputName5"
                       name="totem">
              </div>
              <hr>
              <div class="col-6">
                <label class="form-label">Lieu de Naissance</label>
                <input type="text"
                        class="form-control" 
                        id="inputAddres5s"
                        name="lieu_naissance"
                        required>
              </div>
              <div class="col-6">
                <label for="inputAddress5" class="form-label">Date de Naissance</label>
                <input type="date"
                       class="form-control" 
                       id="inputAddres5s"
                       name="date_naissance"
                       required>
              </div>
              <div class="col-6">
                <label class="form-label">Sexe</label>
                  <select class="form-select" aria-label="Default select example" name="sexe" required>
                    <option selected>Open this select menu</option>
                    <option value="M">Masculin</option>
                    <option value="F">Feminin</option>
                  </select>
              </div>
              <div class="col-6">
                <label for="inputAddress5" class="form-label">Profession</label>
                <input type="text"
                       class="form-control" 
                       id="inputAddres5s"
                       name="profession"
                       required>
              </div>
              <hr>

              <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Email</label>
                <input type="email" 
                       class="form-control" 
                       id="inputEmail5"
                       name="email">
              </div>
              <div class="col-md-6">
                <label for="inputCity" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="inputCity" name="telephone">
              </div>
              <div class="col-12">
                <label for="inputAddress5" class="form-label">Adresse</label>
                <input type="text" 
                       class="form-control" 
                       id="inputAddres5s" 
                       placeholder="1234 Main St" 
                       name="adresse"
                       required>
              </div>
              <hr>
              <div class="col-6">
                <label for="inputAddress2" class="form-label">Photo</label>
                <input class="form-control" 
                       type="file" 
                       id="formFile" 
                       name="photo"
                       accept=".jpg, .png, image/jpeg, image/png"
                       required>
              </div>
              
              <div class="col-6">
                <label class="form-label">Unité</label>
                  <select class="form-select" aria-label="Default select example" name="unite" required>
                    <option selected>Open this select menu</option>
                    <option value="meute">Meute</option>
                    <option value="troupe">Troupe</option>
                    <option value="compagnie">Compagnie</option>
                    <option value="clan">Clan</option>
                    <option value="route">Route</option>
                  </select>
              </div>
              <div class="col-6">
                <label for="inputZip" class="form-label">Etat Civil</label>
                <select class="form-select" id="inputZip" name="etat_civil" required>
                    <option selected>Open this select menu</option>
                    <option value="marie">Marié</option>
                    <option value="celibataire">Célibataire</option>
                    <option value="divorce">Divorcé</option>
                    <option value="veuf">Veuf</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="inputCity" class="form-label">Nationalité</label>
                <input type="text" class="form-control" id="inputCity" name="nationalite">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- End Multi Columns Form -->

          </div>
        </div>
      </div>
      <div class="col-lg-2">
      </div>
    </div>
</section>
@endsection