<?php 

namespace App\Services\User;

use App\Models\Code;

class CodeService
{
    public function __construct()
    {
        
    }

    public function save($request)
    {
        try {
            $code = new Code;
            $code->title = $request->title;
            $code->code = json_encode($request->code);
            $code->user_id = 1;
            $code->style_id = $request->style_id;
    
            $code->save();

            return $code;
        } catch (\Throwable $th) {
            info($th->getMessage());
        }

        return false;
    }
}