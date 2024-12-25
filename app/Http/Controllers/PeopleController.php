<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
        $data['peoples'] = People::all();
        $data['title'] = "Data Penghuni";
        return view('admin.people', $data);
    }
    public function update(Request $request)
    {
        $data = $request->only(['TK', 'SD', 'SMP', 'SMA', 'Pengasuh']);
        foreach ($data as $key => $value) {
            $category = People::where('category', $key)->first();
            $category->update(['count' => $value]);
        }

        return redirect()->route('admin.people.index')->with('success', 'Data berhasil diupdate');
    }
}
