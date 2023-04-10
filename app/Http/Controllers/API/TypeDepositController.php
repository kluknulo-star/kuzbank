<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeDeposit\StoreTypeDepositRequest;
use App\Http\Requests\TypeDeposit\UpdateTypeDepositRequest;
use App\Http\Resources\TypeDepositResource;
use App\Models\TypeDeposit;

class TypeDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeDeposit = TypeDeposit::all();
        return TypeDepositResource::collection($typeDeposit)->resolve();
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
    public function store(StoreTypeDepositRequest $request)
    {
        $createData = $request->validated();

        $typeDeposit = TypeDeposit::create($createData);

        return TypeDepositResource::make($typeDeposit)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeDeposit $typeDeposit)
    {
        return TypeDepositResource::make($typeDeposit)->resolve();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeDeposit $typeDeposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeDepositRequest $request, TypeDeposit $typeDeposit)
    {
        $updateData = $request->validated();

        $typeDeposit->update($updateData);

        return TypeDepositResource::make($typeDeposit)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeDeposit $typeDeposit)
    {
        $typeDeposit->delete();
        return response()->json(['message' => 'Успешно удалено']);
    }
}
