<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\BonusRate\StoreBonusRateRequest;
use App\Http\Requests\BonusRate\UpdateBonusRateRequest;
use App\Models\BonusRate;

class BonusRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bonusRates = BonusRate::paginate(10);
        return view('worker.bonusRates.index', compact('bonusRates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('worker.bonusRates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBonusRateRequest $request)
    {
        $createData = $request->validated();

        $bonusRate = BonusRate::create($createData);

        return redirect()->route('worker.bonusRates.show', $bonusRate->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(BonusRate $bonusRate)
    {
        return view('worker.bonusRates.show', compact('bonusRate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BonusRate $bonusRate)
    {
        return view('worker.bonusRates.edit', compact('bonusRate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBonusRateRequest $request, BonusRate $bonusRate)
    {
        $updateData = $request->validated();

        foreach ($updateData as $key => $value)
        {
            if (!isset($value)){
                unset($updateData[$key]);
            }
        }

        $bonusRate->update($updateData);

        return redirect()->route('worker.bonusRates.show', compact('bonusRate'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BonusRate $bonusRate)
    {
        if (empty($bonusRate->users->toArray()))
        {
            $bonusRate->delete();
            return redirect()->route('worker.bonusRates.index');
        }
        return redirect()->route('worker.bonusRates.index')->withErrors('Не может быть удален, так как используется');
    }
}
