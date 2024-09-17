<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id','empresa_id','servico_id','data_inicial','data_final','valor', 'status'];

    public function cliente()
    {
        return $this->belongsTo (Cliente::class);

    }
    public function empresa()
    {
        return $this->belongsTo (Empresa::class);

    }
    public function servico()
    {
        return $this->belongsTo (Servico::class);
        
    }
}
