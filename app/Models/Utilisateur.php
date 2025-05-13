<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Utilisateur extends Model
{
    use HasFactory;

    protected $table = 'utilisateurs';

    protected $primaryKey = 'id_utilisateur';

    protected $fillable = [
        'login', 
        'mot_de_passe'
    ];

    public static function existeLogin($login) {
        $nb = self::where("login", $login)->count();
        if($nb > 0) {
            return true;
        }
        else {
            return false;
        }
    }
    public function verifierMotDePasse($motDePasse) { 
        if (Hash::check($motDePasse, $this->mot_de_passe)) { 
            return true; 
        }else{
            return false; 
        }
    }
}
