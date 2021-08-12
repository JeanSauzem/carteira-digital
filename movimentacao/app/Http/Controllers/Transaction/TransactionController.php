<?php

namespace App\Http\Controllers\Transaction;

use App\Contracts\Facades\DepositContract;
use App\Contracts\Facades\TransferContract;
use App\Facades\DepositFacades;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $depositFacades,
              $transferFacades;

    public function __construct(
        DepositContract $depositFacades,
        TransferContract $transferFacades
    ) {
        $this->depositFacades = $depositFacades;
        $this->transferFacades = $transferFacades;
    }

    public function deposit(Request $request)
    {
        try {
            $this->validar($request,[
                'users_id' => 'required|exists:wallet_users,users_id',
                'value' => 'required'
            ]);
            $this->depositFacades->deposit($request->all());
            return response()->json(['Wallet Deposit '. $request->input('value').' with success!'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function transfer(Request $request)
    {
        try {
            $this->validar($request,[
                'source_user' => 'required|exists:wallet_users,users_id',
                'destination_user' => 'required|exists:wallet_users,users_id',
                'value' => 'required'
            ]);
          
            $this->transferFacades->transfer($request->all());

            return response()->json(['Transfer with success!'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }
}