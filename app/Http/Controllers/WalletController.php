<?php

namespace App\Http\Controllers;

use App\LTCWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Api\BlockIO\BlockIo;

include_once (app_path() . '\API\BlockIO\block_io.php');

trait Wallet {

    public function getWallet()
    {


        $user = Auth::user();
        $db_wallet = $user->wallet()->first();

        if ($db_wallet) {

            //blockio.com
            $apiKey = "YOUR API KEY";
            $version = 2;
            //blockio.com
            $pin = "YOUR BLOCK IO PIN";
            $block_io = new BlockIo($apiKey, $pin, $version);
            $walletAddress = $db_wallet->pub_key;

            $response = $block_io->get_address_balance(array('addresses' => $walletAddress));

            /*
             *
             * wallet:
             *          pub_key
             *          balance
             *          held balance - sold item profits
             *
             */


            $wallet_obj = new \stdClass();
            $wallet_obj->pub_key = $response->data->balances[0]->address;
            $wallet_obj->balance = $response->data->available_balance;

            return $wallet_obj;
        }
        else {
            return null;
        }


    }

    public function genWallet() {

        $apiKey = "YOUR API KEY";
        $version = 2;
        $pin = "YOUR BLOCK IO PIN";
        $block_io = new BlockIo($apiKey, $pin, $version);
        $data = $block_io->get_new_address(array());
        $pub_key = $data->data->address;

        $user = Auth::user();

        $wallet = new LTCWallet();
        $wallet->pub_key = $pub_key;


        $user->wallet()->save($wallet);

        //return response()->json(['message' => $request['body']]);
        return response()->json(200);
    }
}

class WalletController extends Controller
{
    
    use Wallet;

}
