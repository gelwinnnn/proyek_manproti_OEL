<?php

namespace App\Http\Controllers;

use App\Models\Need;
use Illuminate\Http\Request;

class NeedController extends Controller
{
    public function index()
    {
        $data['needs'] = Need::first();
        $data['title'] = 'Kebutuhan Panti Asuhan OEL';
        return view('admin.needs', $data);
    }

    public function update(Request $request)
    {
        $data = $request->only(['needs']);
        $need = Need::first();
        $need->update($data);

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }
}
