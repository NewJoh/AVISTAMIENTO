<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ornitologo
 *
 * @property $id
 * @property $Nombre
 * @property $Apellido
 * @property $Correo
 * @property $created_at
 * @property $updated_at
 *
 * @property Avistamiento[] $avistamientos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ornitologo extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'Apellido' => 'required',
		'Correo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','Apellido','Correo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function avistamientos()
    {
        return $this->hasMany('App\Models\Avistamiento', 'id_ornitologos', 'id');
    }
    

}
