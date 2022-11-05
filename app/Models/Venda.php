<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'qntd',
        'valor_total',
        'cupom_id',
        'produto_id'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }
}
