<?php

namespace App\Http\Controllers\Admin;

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
        $bankDeposits = BankDeposit::with(['client', 'worker', 'typeDeposit'])->paginate(10);
        return view('admin.bankDeposits.index', compact('bankDeposits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeDeposits = TypeDeposit::all();
        return view('admin.bankDeposits.create', compact('typeDeposits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankDepositRequest $request)
    {
        $createData = $request->validated();

        $bankDeposit = BankDeposit::create($createData);

        return redirect()->route('admin.bankDeposits.show', $bankDeposit->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(BankDeposit $bankDeposit)
    {
        return view('admin.bankDeposits.show', compact('bankDeposit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankDeposit $bankDeposit)
    {
        return view('admin.bankDeposits.edit', compact('bankDeposit'));
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

        return redirect()->route('admin.bankDeposits.show', compact('bankDeposit'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankDeposit $bankDeposit)
    {
        $bankDeposit->delete();
        return redirect()->route('admin.bankDeposits.index');
    }
}
