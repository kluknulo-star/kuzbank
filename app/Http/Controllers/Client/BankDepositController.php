<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreBankDepositRequest;
use App\Models\BankDeposit;
use App\Models\TypeDeposit;
use Illuminate\Contracts\Database\Eloquent\Builder;

class BankDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankDeposits = BankDeposit::with(['client', 'typeDeposit'])
            ->where('client_id', '=', auth()->id())
            ->where(function (Builder $query) {
                $query->whereNull('is_approved')
                    ->orWhere('is_approved', '=', false);
            })
            ->paginate(10);
        return view('client.bankDeposits.index', compact('bankDeposits'));
    }

    public function archive()
    {
        $bankDeposits = BankDeposit::with(['client', 'typeDeposit'])
            ->where('client_id', '=', auth()->id())
            ->where('is_approved', '=', true)
            ->paginate(10);
        return view('client.bankDeposits.index', compact('bankDeposits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeDeposits = TypeDeposit::all();
        return view('client.bankDeposits.create', compact('typeDeposits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankDepositRequest $request)
    {
        $createData = $request->validated();
        $typeDeposit = TypeDeposit::find($createData['type_deposit_id']);
        $user = auth()->user();
        $createData['client_id'] = $user->id;
        $createData['percent'] = $user->bonusRate->percent + $typeDeposit->percent;
        $createData['closed_at'] =\Carbon\Carbon::now()->addMonths($typeDeposit->duration_month);

        unset($createData['percent_bonus']);
        $bankDeposit = BankDeposit::create($createData);

        return redirect()->route('client.bankDeposits.show', $bankDeposit->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(BankDeposit $bankDeposit)
    {
        return view('client.bankDeposits.show', compact('bankDeposit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
//    public function edit(BankDeposit $bankDeposit)
//    {
//        return view('client.bankDeposits.edit', compact('bankDeposit'));
//    }

    /**
     * Update the specified resource in storage.
     */
//    public function update(UpdateBankDepositRequest $request, BankDeposit $bankDeposit)
//    {
//        $updateData = $request->validated();
//
//        foreach ($updateData as $key => $value) {
//            if (!isset($value)) {
//                unset($updateData[$key]);
//            }
//        }
//
//        $bankDeposit->update($updateData);
//
//        return redirect()->route('client.bankDeposits.show', compact('bankDeposit'));
//    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankDeposit $bankDeposit)
    {
        $bankDeposit->delete();
        return redirect()->route('client.bankDeposits.index');
    }
}
