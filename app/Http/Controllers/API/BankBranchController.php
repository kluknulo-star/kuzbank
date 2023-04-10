<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankBranch\StoreBankBranchRequest;
use App\Http\Requests\BankBranch\UpdateBankBranchRequest;
use App\Http\Resources\BankBranchResource;
use App\Models\BankBranch;

class BankBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankBranch = BankBranch::all();
        return BankBranchResource::collection($bankBranch)->resolve();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankBranchRequest $request)
    {
        $createData = $request->validated();

        $bankBranch = BankBranch::create($createData);

        return BankBranchResource::make($bankBranch)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(BankBranch $bankBranch)
    {
        return BankBranchResource::make($bankBranch)->resolve();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankBranch $bankBranch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankBranchRequest $request, BankBranch $bankBranch)
    {
        $updateData = $request->validated();

        $bankBranch->update($updateData);

        return BankBranchResource::make($bankBranch)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankBranch $bankBranch)
    {
        $bankBranch->delete();
        return response()->json(['message' => 'Успешно удалено']);
    }
}
