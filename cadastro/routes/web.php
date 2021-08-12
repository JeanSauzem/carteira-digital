<?php
/**
 * @OA\Post(
 *     path="/register/user",
 *    summary="Create users",
 *     description="Create users",
 *     @OA\RequestBody(
 *         description="Paramaters create Users",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(ref="#/components/schemas/postCadastro")
 *         )
 *     ),
 *     @OA\Response(response="201", description="A list with users"),
 *     @OA\Response(response="400", description="fail! create users"),
 * )
 * 
*/
/**
 * @OA\Schema(
 *   schema="postCadastro",
 *   required={"name", "cpf_cnpj", "email", "password","type_users_id"},
 *   @OA\Property(property="name", type="string"),
 *   @OA\Property(property="cpf_cnpj", type="integer"),
 *   @OA\Property(property="email", type="string"),
 *   @OA\Property(property="password", type="float"),
 *   @OA\Property(property="type_users_id", type="integer"),
 * )
*/
$router->group(['prefix' => 'register'], function () use ($router) {
    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->post('/', 'User\UserController@create');
    });
});