<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiExport;

class ExportLaravelController extends Controller
{
    function export()
    {
        return (new TransaksiExport)->download('Report_transaksi.xlsx');
    }
}