<?php


namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
        public function store(Request $request)
        {
            $rules = [
                'url' => 'required|string|url',
                'login' => 'required|string',
                'password' => 'required|string',
            ];

            $validator = Validator::make($request->all(), $rules);
// dd($request->all());
            if ($validator->fails()) {
                return redirect('passwords.create')->withErrors($validator);
            }

            $user = Auth::user();

            Password::create([
                "site" => $request->url,
                "login" => $request->login,
                "password" => $request->password, // Utilisez bcrypt pour hacher le mot de passe
                "user_id" => $user->id,
            ]);

            return redirect('show-password');
        }

        
        public function showPasswords()
        {
            $user = Auth::user();
            $passwords = $user->passwords; // Assurez-vous que votre relation dans le modèle User est correctement définie

            return view('show_passwords', ['passwords' => $passwords]);
        }

        public function modify(Request $request, int $id)
        {
            $rules = [
                'password' => 'required|string',
            ];

            $validator = Validator::make($request->all(), $rules);
//dd($request->all());
            if ($validator->fails()) {
                return redirect('passwords.create')->withErrors($validator);
            }

            $user = Auth::user();

            Password::find($id)->update([ 
                "password" => $request->password,
            ]);
            return redirect('show-password');
        }

    }

?>