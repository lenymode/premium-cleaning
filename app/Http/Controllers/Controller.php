<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function tablePerPage(): int
    {
        $perPage = request()->integer('per_page', 10);

        return in_array($perPage, [10, 25, 50, 100], true) ? $perPage : 10;
    }
}
