<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    use HasFactory;

    protected $fillable = [
        'hora',
        'doado',
        'empresa_id',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'instituicao_id', 'id');
    }
}
