<?php

namespace App\Http\Controllers\User;

use App\Contract\Facades\CreateUserContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $createUserFacades;

    public function __construct(CreateUserContract $createUserFacades)
    {
        $this->createUserFacades = $createUserFacades;
    }
    /**
     * @OA\Post(
     *     path="/register/user",
     *     description="Create users",
     *     @OA\Response(response="201", description="A list with users"),
     *     @OA\Response(response="400", description="fail! create users"),
     * )
     * 
    */
    public function create(Request $request)
    {
        try {
            $this->validar($request, [
                "name" => "required",
                "cpf_cnpj" => "required|unique:users",
                "email" => "required|email|unique:users",
                "password" =>"required",
                "type_users_id" => "required"
            ]);

            $result = $this->createUserFacades->createUser($request->all());

            return response()->json($result, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}