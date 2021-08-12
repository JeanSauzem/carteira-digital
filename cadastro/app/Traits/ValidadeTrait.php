<?php 

namespace App\Traits;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait ValidadeTrait
{
    public function validar(Request $request, array $rules)
    {
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            throw new Exception('Invalid parameter');
        }
    }

}
