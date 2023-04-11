<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankDeposit\StoreBankDepositRequest;
use App\Http\Requests\BankDeposit\UpdateBankDepositRequest;
use App\Models\BankDeposit;
use App\Models\TypeDeposit;

class BankDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankDeposits = BankDeposit::with(['client', 'worker', 'typeDeposit'])->whereIsApproved(null)->paginate(10);
        return view('worker.bankDeposits.index', compact('bankDeposits'));
    }

    public function archive()
    {
        $bankDeposits = BankDeposit::with(['client', 'worker', 'typeDeposit'])
            ->where('is_approved', '!=', null)
            ->where('worker_id', '=', auth()->id())
            ->paginate(10);
        return view('worker.bankDeposits.archive', compact('bankDeposits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeDeposits = TypeDeposit::all();
        return view('worker.bankDeposits.create', compact('typeDeposits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankDepositRequest $request)
    {
        $createData = $request->validated();

        $bankDeposit = BankDeposit::create($createData);

        return redirect()->route('worker.bankDeposits.show', $bankDeposit->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(BankDeposit $bankDeposit)
    {
        return view('worker.bankDeposits.show', compact('bankDeposit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankDeposit $bankDeposit)
    {
        return view('worker.bankDeposits.edit', compact('bankDeposit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankDepositRequest $request, BankDeposit $bankDeposit)
    {
        $updateData = $request->validated();

        foreach ($updateData as $key => $value) {
            if (!isset($value)) {
                unset($updateData[$key]);
            }
        }

        $bankDeposit->update($updateData);

        return redirect()->route('worker.bankDeposits.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankDeposit $bankDeposit)
    {
        $bankDeposit->delete();
        return redirect()->route('worker.bankDeposits.index');
    }
}
