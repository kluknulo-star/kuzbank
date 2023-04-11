<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankDeposit\StoreBankDepositRequest;
use App\Http\Requests\BankDeposit\UpdateBankDepositRequest;
use App\Http\Requests\Worker\UpdateProfileRequest;
use App\Models\BankDeposit;
use App\Models\BonusRate;
use App\Models\TypeDeposit;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('client.profile.show', compact('user'));
    }
    public function edit()
    {
        $user = auth()->user();
        $bonusRates = BonusRate::all();
        return view('client.profile.edit', compact('user', 'bonusRates'));
    }
    public function update(UpdateProfileRequest $request)
    {
        $updateData = $request->validated();
        foreach ($updateData as $key => $value)
        {
            if (!isset($value)){
                unset($updateData[$key]);
            }
        }
        $user = auth()->user();
        $user->update($updateData);
        return view('client.profile.show', compact('user'));
    }

}
