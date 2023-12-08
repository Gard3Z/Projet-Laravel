<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
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

        return redirect()->route('dashboard');
    }
}

?>