<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Session;

class ConnexionController extends Controller
{
    public function index() {
        return view('login.index', []);
    }
    
    public function login(Request $request) {
        $validationFormulaire = false; // Booléen qui indique si les données du formulaire sont valides
        // Validation des données du formulaire
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        
        // Vérification du couple login/mot de passe
        $login = htmlspecialchars($request->input('login'));
        $motDePasse = htmlspecialchars($request->input('password'));
        
        if(Utilisateur::existeLogin($login)) {
            $utilisateur = Utilisateur::where('login', $login)->first();
            
            if ($utilisateur->verifierMotDePasse($motDePasse)) {
                // Méthode garantie pour sauvegarder la session
                $request->session()->put('connexion', $utilisateur->id_utilisateur);
                $request->session()->save(); // Force la sauvegarde immédiate
                return redirect()->route('entrepreneurs.index');
            } else {
                return redirect()->route('login.show')
                ->with('error', 'Email ou mot de passe incorrect.');
            }
        } else {
            return redirect()->route('login.show')
                ->with('error', 'Email ou mot de passe incorrect.');
        }
    }
    
    public function logout(Request $request) {
        // Supprimer la session
        session()->forget('connexion');
        
        return redirect()->route('login.show')
            ->with('success', 'Vous avez été déconnecté avec succès.');
    }
}