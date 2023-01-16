@extends('layouts.app3')

@section('menu')
    @include('district.menu')
@endsection

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-3">

        <div class="card">
          
        </div>

      </div>
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ajouter Un Groupe</h5>

            <!-- General Form Elements -->
            <form method="POST" action="{{Route('groupes.store')}} ">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                  <input type="text"
                         class="form-control"
                         name="name"
                         required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Code</label>
                <div class="col-sm-10">
                  <input type="text"
                         class="form-control"
                         name="code">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">District</label>
                <div class="col-sm-10">
                  <select class="form-select"
                          aria-label="Default select example"
                          name="district"
                          required>
                    <option selected value=" {{$district->id}} ">{{$district->name}}</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Affiliation</label>
                <div class="col-sm-10">
                  <select class="form-select"
                          aria-label="Default select example"
                          name="affiliate"
                          required>
                          <option selected>Select</option>
                          <option value="catholique">catholique</option>
                          <option value="kimbaguiste">kimbaguiste</option>
                          <option value="protestant">protestant</option>
                          <option value="autre">autre</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
                <div class="col-sm-10">
                  <textarea class="form-control"
                            style="height: 100px"
                            name="description"></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

      <div class="col-lg-3">

        <div class="card">
          
        </div>

      </div>
    </div>
  </section>
@endsection