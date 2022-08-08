<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table_transaksi_line extends Model
{
    protected $table = 'table_transaksi_line';
    public $incrementing = false;

    public function materials()
    {
        return $this->belongsTo('App\Models\Material', 'material', 'id');
    }    

    public function jasas()
    {
        return $this->belongsTo('App\Models\Jasa', 'jasa', 'id')->withDefault(['nama'=>null]);
    }
}
