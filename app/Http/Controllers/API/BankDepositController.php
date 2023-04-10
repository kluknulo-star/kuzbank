<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankDeposit\StoreBankDepositRequest;
use App\Http\Requests\BankDeposit\UpdateBankDepositRequest;
use App\Http\Resources\BankDepositResource;
use App\Models\BankDeposit;

class BankDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankDeposit = BankDeposit::all();
        return BankDepositResource::collection($bankDeposit)->resolve();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankDepositRequest $request)
    {
        $createData = $request->validated();

        $bankDeposit = BankDeposit::create($createData);

        return BankDepositResource::make($bankDeposit)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(BankDeposit $bankDeposit)
    {
        return BankDepositResource::make($bankDeposit)->resolve();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankDeposit $bankDeposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankDepositRequest $request, BankDeposit $bankDeposit)
    {
        $updateData = $request->validated();

        $bankDeposit->update($updateData);

        return BankDepositResource::make($bankDeposit)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankDeposit $bankDeposit)
    {
        $bankDeposit->delete();
        return response()->json(['message' => 'Успешно удалено']);
    }
}
