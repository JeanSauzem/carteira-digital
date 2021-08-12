<?php

namespace App\Http\Controllers;

use App\Traits\ValidadeTrait;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
/**
* @OA\Info(
*     title="Transaction API",
*     version="1.0.0"
* )
*/
/**
* @OA\Server(url="http://175.211.0.1:8034")
*/
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
    use ValidadeTrait;
}
