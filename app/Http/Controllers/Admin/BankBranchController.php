<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankBranch\StoreBankBranchRequest;
use App\Http\Requests\BankBranch\UpdateBankBranchRequest;
use App\Models\BankBranch;

class BankBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankBranches = BankBranch::paginate(10);
        return view('admin.bankBranches.index', compact('bankBranches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bankBranches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankBranchRequest $request)
    {
        $createData = $request->validated();

        $bankBranch = BankBranch::create($createData);

        return redirect()->route('admin.bankBranches.show', $bankBranch->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(BankBranch $bankBranch)
    {
        return view('admin.bankBranches.show', compact('bankBranch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankBranch $bankBranch)
    {
        return view('admin.bankBranches.edit', compact('bankBranch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankBranchRequest $request, BankBranch $bankBranch)
    {
        $updateData = $request->validated();

        foreach ($updateData as $key => $value)
        {
            if (!isset($value)){
                unset($updateData[$key]);
            }
        }

        $bankBranch->update($updateData);

        return redirect()->route('admin.bankBranches.show', compact('bankBranch'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankBranch $bankBranch)
    {
        if (empty($bankBranch->users->toArray()))
        {
            $bankBranch->delete();
            return redirect()->route('admin.bankBranches.index');
        }
        return redirect()->route('admin.bankBranches.index')->withErrors('Не может быть удален, так как используется');
    }
}
