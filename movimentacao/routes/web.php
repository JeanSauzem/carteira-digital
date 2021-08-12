<?php
/**
 * @OA\Post(
 *     path="/transaction/deposit",
 *     summary="User deposit Wallet",
 *     description="User deposit Wallet",
 *     @OA\RequestBody(
 *         description="Paramaters deposit Wallet",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(ref="#/components/schemas/depositWallet")
 *         )
 *     ),
 *     @OA\Response(response="200", description="Deposit Wallet with Success"),
 *     @OA\Response(response="400", description="fail! deposit Wallet"),
 * )
 * 
*/
/**
 * @OA\Schema(
 *   schema="depositWallet",
 *   required={"users_id", "value"},
 *   @OA\Property(property="users_id", type="integer"),
 *   @OA\Property(property="value", type="integer"),
 * )
*/
$router->group(['prefix' => 'transaction'], function () use ($router) {
    $router->post('/deposit', 'Transaction\TransactionController@deposit');
    /**
     * @OA\Post(
     *     path="/transaction",
     *     summary="Transfer value at users",
     *     description="Transfer value at users",
     *     @OA\RequestBody(
     *         description="Paramaters Transfer value",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/transferWallet")
     *         )
     *     ),
     *     @OA\Response(response="200", description="tranfers Wallet with Success"),
     *     @OA\Response(response="400", description="fail! tranfers Wallet"),
     * )
     * 
    */
    /**
     * @OA\Schema(
     *   schema="transferWallet",
     *   required={"source_user", "destination_user", "value" },
     *   @OA\Property(property="source_user", type="integer"),
     *   @OA\Property(property="destination_user", type="integer"),
     *   @OA\Property(property="value", type="integer"),
     * )
    */
    $router->post('/', 'Transaction\TransactionController@transfer');
});