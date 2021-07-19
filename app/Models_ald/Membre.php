<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $identifiant identifiant
@property varchar $nom nom
@property varchar $prenom prenom
@property varchar $mail mail
@property bit $mail_verif mail verif
@property varchar $mdp mdp
@property text $adresse adresse
@property varchar $tel tel
@property date $date_inscription date inscription
@property int $statut_membre statut membre
@property tinyint $banni banni
@property int $nombre_attentes_validation nombre attentes validation
@property varchar $hash_mail hash mail
@property varchar $hash_mdp hash mdp

 */
class Membre extends Model
{

/**
* Database table name
*/
protected $table = 'membres';

/**
* Mass assignable columns
*/
protected $fillable=['hash_mdp',
    'identifiant',
    'nom',
    'prenom',
    'mail',
    'mail_verif',
    'mdp',
    'adresse',
    'tel',
    'date_inscription',
    'statut_membre',
    'banni',
    'nombre_attentes_validation',
    'hash_mail',
    'hash_mdp'];

    /**
    * Date time columns.
    */
    protected $dates=['date_inscription'];




}
