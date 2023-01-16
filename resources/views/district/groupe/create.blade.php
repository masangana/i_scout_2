@extends('layouts.app3')

@section('menu')
    @include('district.menu')
@endsection

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-2">
      </div>
      <div class="col-lg-8">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ajouter Un Groupe</h5>

            <!-- General Form Elements -->
            <form method="POST" action="{{Route('groupes.store')}}" class="row g-3">
                @csrf
              <div class="col-6">
                <label for="inputText" class="form-label">Nom</label>
                  <input type="text"
                         class="form-control"
                         name="name"
                         required>
              </div>
              <div class="col-6">
                <label for="inputEmail" class="form-label">Code</label>
                  <input type="text"
                         class="form-control"
                         name="code">
              </div>
              <div class="col-6">
                <label class="form-label">District</label>
                  <select class="form-select"
                          aria-label="Default select example"
                          name="district"
                          required>
                    <option selected value=" {{$district->id}} ">{{$district->name}}</option>
                  </select>
              </div>
              <div class="col-6">
                <label class="col-sm-3 col-form-label">Affiliation</label>
                  <select class="form-select"
                          aria-label="Default select example"
                          name="affiliate"
                          required>
                          <option selected>Select</option>
                          <option value="catholique">Catholique</option>
                          <option value="kimbaguiste">Kimbaguiste</option>
                          <option value="protestant">Protestant</option>
                          <option value="autre">Autre</option>
                  </select>
              </div>
              <div class="col-6">
                <label for="inputDate" class="col-sm-3 col-form-label">Date de création</label>
                <input type="date" class="form-control" name="creation_date">
              </div>
              <div class="col-6">
                <label for="inputDate" class="col-sm-3 col-form-label">adresse</label>
                <input type="text" class="form-control" name="adresse">
              </div>
              <div class="col-6">
                <label for="inputDate" class="col-sm-3 col-form-label">Téléphone</label>
                <input type="text" class="form-control" name="phone">
              </div>
              <div class="col-6">
                <label for="inputDate" class="col-sm-3 col-form-label">Email</label>
                <input type="email" class="form-control" name="email">
              </div>
              <div class="col-4">
                <label for="inputDate" class="form-label">Prémière Couleur</label>
                <input type="color" class="form-control form-control-color" 
                       id="exampleColorInput" value="#0080FF" title="Choisir une couleur"
                       name="couleur_1">
              </div>
              <div class="col-4">
                <label for="inputDate" class="form-label">Deuxième Couleur</label>
                <input type="color" class="form-control form-control-color" 
                       id="exampleColorInput" value="#F7D711" title="Choisir une couleur"
                       name="couleur_2">
              </div>
              <div class="col-4">
                <label for="inputDate" class="form-label">Troisième Couleur</label>
                <input type="color" class="form-control form-control-color" 
                       id="exampleColorInput" value="#CF071B" title="Choisir une couleur"
                       name="couleur_3">
              </div>
              <div class="col-12">
                <label for="inputPassword" class="form-label">Commentaire</label>
                
                  <textarea class="form-control"
                            style="height: 100px"
                            name="description"></textarea>
              </div>

              <div class="col-6">
                <label class="form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection