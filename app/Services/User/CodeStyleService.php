<?php

namespace App\Services\User;

use App\Models\CodeStyle;

class CodeStyleService
{
    public function __construct()
    {

    }

    public function getCodeStyles()
    {
        $styles = CodeStyle::select('id', 'name')->active()->get();
        $styles = ($styles->count()) ? $styles->toArray() : [];

        return $styles;
    }

}
