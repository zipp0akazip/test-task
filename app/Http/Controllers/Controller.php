<?php

namespace App\Http\Controllers;

use App\Http\Requests\Balance;
use App\Http\Requests\Deposit;
use App\Http\Requests\Transfer;
use App\Http\Requests\Withdraw;
use App\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    public function balance(Balance $balance) {
        $user = User::find($balance->user);

        return ['balance'=> $user->balance];
    }

    public function deposit(Deposit $deposit) {
        $user = User::find($deposit->user);

        if (is_null($user)) {
            User::create(['id' => $deposit->user, 'balance' => $deposit->amount]);
        } else {
            $user->balance += $deposit->amount;
            $user->save();
        }
    }

    public function withdraw(Withdraw $withdraw) {
        $user = User::find($withdraw->user);

        $user->balance -= $withdraw->amount;
        $user->save();
    }

    public function transfer(Transfer $transfer) {
        $fromUser = User::find($transfer->from);
        $toUser = User::find($transfer->to);

        $fromUser->balance -= $transfer->amount;
        $toUser->balance += $transfer->amount;

        DB::transaction(function () use ($fromUser, $toUser)  {
            $fromUser->save();
            $toUser->save();
        });
    }
}
