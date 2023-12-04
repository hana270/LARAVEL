<?php
// app/Http/Controllers/BebeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bebe;

class BebeController extends Controller
{

    public function index()
    {
        $bebes = Bebe::all();
        return view('bebes.index', compact('bebes'));
    }

    
    public function store(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required|date',
            'nombre_ordonnel' => 'required',
            'sexe' => 'required',
            'lieu' => 'required',
            'date_acceptation' => 'required|date',
            'date_integration' => 'required|date',
            'nom_mere_bio' => 'required',
            'nom_pere_bio' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'nom_mere_adoptive' => 'required',
            'nom_pere_adoptive' => 'required',
            'tel_adoptive' => 'required',
            'adresse_adoptive' => 'required',
        ]);

        // Créez un nouveau bébé avec les données du formulaire
        $bebe = Bebe::create($request->all());

        // Retirez la ligne suivante une fois que tout fonctionne correctement
        // dd($request->all());

        // Redirigez l'utilisateur vers la page appropriée après la création du bébé
        return redirect()->route('bebes.index')->with('success', 'Bébé ajouté avec succès.');
    }

    public function destroy(Bebe $bebe)
    {
        $bebe->delete();
        return response()->json(null, 204);
    }

    public function create()
    {
        return view('add');
    }

    
    public function destroyForm()
    {
        // Supposons que vous récupérez la liste des bébés dans cette méthode
        $bebes = Bebe::all();
    
        // Assurez-vous que $bebeId est défini ici, vous pouvez le définir avec la première entrée de la liste des bébés, par exemple
        $bebeId = $bebes->first()->id;
    
        // Passez les données à la vue
        return view('destroy', compact('bebeId'));
    }
    public function destroyById(Request $request)
    {
        $bebeId = $request->input('bebe_id');
        $bebe = Bebe::find($bebeId);

        if (!$bebe) {
            return response()->json(['message' => 'Bébé non trouvé.'], 404);
        }

        $bebe->delete();
        return response()->json(['message' => 'Bébé supprimé avec succès.'], 200);
    }

    public function edit(Bebe $bebe)
{
    return view('edit', compact('bebe'));
}
public function update(Request $request, Bebe $bebe)
{
    $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'nombre_ordonnel' => 'required',
        'sexe' => 'required',
        'date_naissance' => 'required|date',
        'lieu' => 'required',
        'date_acceptation' => 'required|date',
        'date_integration' => 'required|date',
        'nom_mere_bio' => 'required',
        'nom_pere_bio' => 'required',
        'telephone' => 'required',
        'adresse' => 'required',
        'nom_mere_adoptive' => 'required',
        'nom_pere_adoptive' => 'required',
        'tel_adoptive' => 'required',
        'adresse_adoptive' => 'required',
        // Include other attributes here
    ]);

    $bebe->update($request->all());

    return redirect()->route('bebes.index')->with('success', 'Bébé mis à jour avec succès.');
}













   
}









?>