<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Groupe;

class PersonneController extends Controller
{
    public function index() {
        $personnes = Personne::with('formations', 'groupe', 'district', 'province')->get();
        return view('personne.index', [
            'personnes' => $personnes,
        ]);
    }

    public function create() {
        return view('personne.create');
    }

    public function store(Request $request) {

        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'adresse' => 'required',
        ]);

        $groupe = Groupe::with('district')-> find(Auth::user()->userable_id);

        $personne = new Personne();
        $personne->nom = $request->nom;
        $personne->prenom = $request->prenom;
        $personne->post_nom = $request->post_nom;
        $personne->totem = $request->totem;
        $personne->sexe = $request->sexe;
        $personne->date_naissance = $request->date_naissance;
        $personne->lieu_naissance = $request->lieu_naissance;
        $personne->nationalite = $request->nationalite;
        $personne->adresse = $request->adresse;
        $personne->telephone = $request->telephone;
        $personne->email = $request->email;
        $personne->profession = $request->profession;
        $personne->etat_civil = $request->etat_civil;
        $personne->unite = $request->unite;
        $file = $request->photo;
        if ($request->hasFile('photo')) {
            $imageName = time().rand(0, 99).'.'.$file->extension();
            $file->move(public_path('images/personnes'), $imageName);
            $personne->photo = $imageName;
        }
        $personne->groupe_id = $groupe->id;
        $personne->district_id = $groupe->district->id;
        $personne->province_id = $groupe->district->province_id;
        $personne->save();

        return redirect()->route('personnes.create');
    }

    public function show(Personne $personne) {

        $personne->load('formations', 'groupe', 'district', 'province');
        return view('personne.show', [
            'personne' => $personne,
        ]);
    }
}
