<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use App\Notifications\joinTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('team_create')
                ->withErrors($validator)
                ->withInput();
        }

        // Créer la nouvelle équipe
        $team = Team::create([
            "name" => $request->name,
        ]);

        // Associer l'équipe à l'utilisateur actuel
        $user = Auth::user();

        // Check if the user and team exist
        if ($user && $team) {
            $user->teams()->attach($team->id);
        }
        //dd($request->all());
        return redirect()->route('team.index');
    }

    // fonction pour rediriger vers team_create.blade.php
    public function team_create()
    {
        return view('team_create');
    }

    // fonction pour rediriger vers show_teams.blade.php
    public function show_teams()
    {
        return view('show_teams');
    }

    // fonction pour rediriger vers team.invite.blade.php
    public function team_invite()
    {
        return view('team_invite');
    }

    
    public function index()
{
    $user = Auth::user();
    $teams = $user->teams()->with('users')->get(); // Charger le name des membres de chaque équipe

    return view('show_teams', ['teams' => $teams]);
}

public function joinTeam(Request $request)
{
    $rules = [
        'login' => 'required|string',
        'name' => 'required|string',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()->route('team.invite')
            ->withErrors($validator)
            ->withInput();
    }

    // Récupérer l'utilisateur ajouté
    $userAdded = User::where('name', $request->input('login'))->first();

    // Vérifier si l'utilisateur ajouté existe
    if (!$userAdded) {
        return redirect()->route('team.invite')
            ->withErrors(['name' => 'Utilisateur non trouvé'])
            ->withInput();
    }

    // Récupérer l'équipe
    $team = Team::where('name', $request->input('name'))->first();

    // Vérifier si l'équipe existe
    if (!$team) {
        return redirect()->route('team.invite')
            ->withErrors(['name' => 'Équipe non trouvée'])
            ->withInput();
    }

    // Vérifier si l'utilisateur est déjà dans l'équipe
    if ($team->users()->where('user_id', $userAdded->id)->exists()) {
        return redirect()->route('team.invite')
            ->withErrors(['login' => 'Utilisateur déjà dans l\'équipe'])
            ->withInput();
    }

    // Récupérer l'utilisateur ajoutant (par exemple, l'utilisateur actuellement authentifié)
    $userAdding = Auth::user();

    // Ajouter l'utilisateur dans l'équipe
    $team->users()->attach($userAdded->id);

    // Notifier les autres membres de l'équipe
    $teamMembers = $team->users->where('id', '!=', $userAdded->id); // Exclure l'utilisateur ajouté
    foreach ($teamMembers as $member) {
    $member->notify(new joinTeam($userAdded, $userAdding));
}

    return redirect()->route('team.index');
}

}

?>