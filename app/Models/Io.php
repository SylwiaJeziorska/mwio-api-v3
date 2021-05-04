<?php

namespace App\Models;

use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
/**
 * @property int $id_membre id membre
 * @property tinyint $validee validee
 * @property tinyint $a_valider a valider
 * @property tinyint $a_zoner a zoner
 * @property varchar $id_io_ref id io ref
 * @property tinyint $modifiee modifiee
 * @property varchar $id_zones id zones
 * @property geometry $situation situation
 * @property date $date_releve date releve
 * @property date $date_validee date validee
 * @property varchar $lieu_dit lieu dit
 * @property varchar $origine origine
 * @property text $proprio_terrain proprio terrain
 * @property text $proprio_io proprio io
 * @property text $ampleur ampleur
 * @property text $impact impact
 * @property varchar $patrimonialite patrimonialite
 * @property varchar $classe classe
 * @property varchar $etat etat
 * @property varchar $dimensions dimensions
 * @property text $nombre nombre
 * @property text $accessibilite accessibilite
 * @property text $facilite_demontage facilite demontage
 * @property text $commentaires commentaires
 * @property text $image image
 * @property text $video video
 * @property date $date_demontage date demontage
 * @property varchar $type_chantier type chantier
 * @property text $nom_partenaires nom partenaires
 * @property text $duree_chantier duree chantier
 * @property text $commentaires_chantier commentaires chantier
 * @property tinyint $demontee demontee
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property situation
 */
class Io extends Model
{
    use SpatialTrait;

    /**
     * Database table name
     */
    protected $table = 'io';

    /**
     * Mass assignable columns
     */
    protected $fillable = ['id_membre',
        'validee',
        'a_valider',
        'a_zoner',
        'id_io_ref',
        'modifiee',
        'id_zones',
        'situation',
        'date_releve',
        'date_validee',
        'lieu_dit',
        'origine',
        'proprio_terrain',
        'proprio_io',
        'ampleur',
        'impact',
        'patrimonialite',
        'classe',
        'etat',
        'dimensions',
        'nombre',
        'accessibilite',
        'facilite_demontage',
        'commentaires',
        'image',
        'video',
        'date_demontage',
        'type_chantier',
        'nom_partenaires',
        'duree_chantier',
        'commentaires_chantier',
        'demontee'];

    /**
     * Date time columns.
     */
    protected $dates = [
        'date_releve',
        'date_validee',
        'date_demontage'];
    protected $spatialFields = [
        'situation'
    ];

    public function getSituationAttribute($record)
    {
        $p = Point::fromWKT($record);

        if(!$record==null && !$p==null){
            $situationCoord = ['lat' => $p->getLat(), 'lon' => $p->getLng()];
            return $situation =["coordinates" => $situationCoord];
        }


    }


}
