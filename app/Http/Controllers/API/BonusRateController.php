<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BonusRate\StoreBonusRateRequest;
use App\Http\Requests\BonusRate\UpdateBonusRateRequest;
use App\Http\Resources\BonusRateResource;
use App\Models\BonusRate;

class BonusRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bonusRate = BonusRate::all();
        return BonusRateResource::collection($bonusRate)->resolve();
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
    public function store(StoreBonusRateRequest $request)
    {
        $createData = $request->validated();

        $bonusRate = BonusRate::create($createData);

        return BonusRateResource::make($bonusRate)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(BonusRate $bonusRate)
    {
        return BonusRateResource::make($bonusRate)->resolve();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BonusRate $bonusRate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBonusRateRequest $request, BonusRate $bonusRate)
    {
        $updateData = $request->validated();

        $bonusRate->update($updateData);

        return BonusRateResource::make($bonusRate)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BonusRate $bonusRate)
    {
        $bonusRate->delete();
        return response()->json(['message' => 'Успешно удалено']);
    }
}
