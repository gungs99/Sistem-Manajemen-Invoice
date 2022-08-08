<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table_transaksi extends Model
{
    protected $table = 'table_transaksi';
    public $incrementing = false;

    public function customers()
    {
        return $this->belongsTo('App\Models\Customer', 'customer', 'id');
    }

    public function jasas()
    {
        return $this->belongsTo('App\Models\Jasa', 'jasa', 'id')->withDefault(['nama'=>null]);
    }

    public function status_pengerjaans()
    {
        return $this->belongsTo('App\Models\Status_pengerjaan', 'status_pengerjaan', 'id');
    }

    public function status_pembayarans()
    {
        return $this->belongsTo('App\Models\Status_pembayaran', 'status_pembayaran', 'id');
    }

    public function lines(){
        return $this->hasMany('App\Models\Table_transaksi_line','header');
    }

    public function totals($header){
        return $this->lines()->where('header',$header)->sum('grand_total');
    }
}
