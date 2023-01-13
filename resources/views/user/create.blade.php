<div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajoutez Un Utilisateur</h5>

      <!-- Vertical Form -->
      <form class="row g-3" method="POST" action="{{Route('users.store')}} ">
        @csrf
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Nom ou Totem</label>
          <input type="text" 
                 class="form-control"
                 id="inputNanme4"
                 name="name">
        </div>
        <div class="col-12">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email"
                 class="form-control" 
                 id="inputEmail4"
                 name="email">
        </div>

        @if ($districts)
            
            <div class="col-12">
                <label class="form-label">District</label>
                <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="district">
                    <option selected>Select</option>
                    @foreach ($districts as $district )
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
                </div>
            </div>
        @elseif ($groupes)
            <div class="col-12">
                <label class="form-label">Groupe</label>
                <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="groupe">
                    <option selected>Select</option>
                    @foreach ($groupes as $groupe )
                        <option value="{{ $groupe->id }}">{{ $groupe->name }}</option>
                    @endforeach
                </select>
                </div>
            </div>
        @endif
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Ajouter</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>
</div>