<?php

namespace App\Services\User;

use App\Http\Resources\CodeStyleCollection;
use App\Models\CodeStyle;

class CodeStyleService
{
    public function __construct()
    {

    }

    public function getCodeStyles()
    {
        $styles = CodeStyle::select('id', 'name')->active()->get();

        return $styles;
    }

}
