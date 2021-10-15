<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste()
    {
        return 'Dashboard Controller';
    }

    public function caixa()
    {
        return 'Caixa Controller';
    }

    public function financeiro()
    {
        return 'Financeiro Controller';
    }
}
