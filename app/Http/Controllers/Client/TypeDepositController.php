<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeDeposit\StoreTypeDepositRequest;
use App\Http\Requests\TypeDeposit\UpdateTypeDepositRequest;
use App\Models\TypeDeposit;

class TypeDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeDeposits = TypeDeposit::paginate(10);
        return view('client.typeDeposits.index', compact('typeDeposits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.typeDeposits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeDepositRequest $request)
    {
        $createData = $request->validated();

        $typeDeposit = TypeDeposit::create($createData);

        return redirect()->route('client.typeDeposits.show', $typeDeposit->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeDeposit $typeDeposit)
    {
        return view('client.typeDeposits.show', compact('typeDeposit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeDeposit $typeDeposit)
    {
        return view('client.typeDeposits.edit', compact('typeDeposit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeDepositRequest $request, TypeDeposit $typeDeposit)
    {
        $updateData = $request->validated();

        foreach ($updateData as $key => $value)
        {
            if (!isset($value)){
                unset($updateData[$key]);
            }
        }

        $typeDeposit->update($updateData);

        return redirect()->route('client.typeDeposits.show', compact('typeDeposit'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeDeposit $typeDeposit)
    {
        if (empty($typeDeposit->bankDeposits->toArray()))
        {
            $typeDeposit->delete();
            return redirect()->route('client.typeDeposits.index');
        }
        return redirect()->route('client.typeDeposits.index')->withErrors('Не может быть удален, так как используется');
    }
}
