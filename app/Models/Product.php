<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /*define que a aplicação só vai receber dados para essas colunas. Sem isso a aplicação ficaria vunerável!  */
    protected $fillable = ['name', 'description', 'preco', 'image'];

    public function search($filter = null)
    {
        $results = $this->where(function ($query) use ($filter) {
            if($filter){
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })//->toSql();
        ->simplePaginate();
       // dd($results);
        return $results;
    }
}
