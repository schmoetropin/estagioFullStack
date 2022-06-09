<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['titulo','nao_iniciado','em_andamento','concluido','data_tarefa'];
}
