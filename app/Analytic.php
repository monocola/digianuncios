<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analytic extends Model
{
    protected $table = 'analytics';

    /**
    * The "type" of the primary key ID.
    *
    * @var integer
    */
    protected $keyType = 'integer';

    protected $fillable = ['category_name','location','ip','user_id'];


    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }


    public function location($id)
    {
        if($id === '-'){
            return '--No consultado--';
        }else{
            return $id;
        }

    }


}
