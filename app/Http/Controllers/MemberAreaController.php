<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MemberAreaController extends WalletController
{
    use Wallet;

    public function getDashboard()
    {
        $user = Auth::user();

        //get users wallet null condition handled in blade and getWallet();
        $wallet = $this->getWallet();
        $items_selling = $user->items_for_sale()->paginate(10);

        return view('member.dashboard', [
            'user' => $user,
            'wallet' => $wallet,
            'items_selling' => $items_selling
        ]);
    }
    
    public function getSellPage()
    {
        $user = Auth::user();
        return view('member.sell');
    }


}
