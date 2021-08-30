<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Puesto
 *
 * @property $id_puesto
 * @property $puesto
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado[] $empleados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Puesto extends Model
{
    
    static $rules = [
		'id_puesto' => 'required',
		'puesto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_puesto','puesto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        return $this->hasMany('App\Models\Empleado', 'id_puesto', 'id_puesto');
    }
    

}
