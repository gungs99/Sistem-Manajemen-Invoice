<?php

namespace App\Exports;

use App\Models\Customer;
use App\Models\Jasa;
use App\Models\Material;
use App\Models\Status_pembayaran;
use App\Models\Status_pengerjaan;
use App\Models\Table_transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class TransaksiExport implements FromView
{
   
    use Exportable;
    protected $data;

    public function __construct($dt){
    	$this->data = $dt;
    }
    
    public function view(): View
    {
        return view('transaksi.excel',[
            'trans' => $this->data
        ]);
    }
}
