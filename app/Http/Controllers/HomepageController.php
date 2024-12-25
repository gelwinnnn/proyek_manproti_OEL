<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomepageController extends Controller
{
    public function index()
    {
        $data['title'] = 'Manajemen Homepage';
        $data['homepage'] = Homepage::first();
        return view('admin.homepage', $data);
    }

    public function update(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'vision' => 'required',
            'mission' => 'required',
            'history' => 'required',
        ]);
        if ($valid->fails()) {
            return response()->json(['success' => false, 'message' => $valid->errors()->first()]);
        }

        $validated = $valid->validated();

        $homepage = Homepage::first();

        $homepage->update($validated);
        return response()->json(['success' => true, 'message' => 'Homepage berhasil diperbarui.']);
    }
}
