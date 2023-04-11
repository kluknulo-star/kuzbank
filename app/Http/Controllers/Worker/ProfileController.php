<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\Worker\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('worker.profile.show', compact('user'));
    }
    public function edit()
    {
        $user = auth()->user();
        return view('worker.profile.edit', compact('user'));
    }
    public function update(UpdateProfileRequest $request)
    {
        $updateData = $request->validated();
        $user = auth()->user();
        $user->update($updateData);
        return view('worker.profile.show', compact('user'));
    }

}
