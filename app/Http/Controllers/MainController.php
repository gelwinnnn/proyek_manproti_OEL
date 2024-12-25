<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Event;
use App\Models\Homepage;
use App\Models\Need;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        $data['events'] = Event::latest()->take(3)->get();
        $data['homepage'] = Homepage::first();
        $data['peoples'] = People::all();
        return view('user.home', $data);
    }

    public function donation()
    {
        $data['needs'] = Need::first();
        $data['title'] = 'Donasi';
        return view('user.donation', $data);
    }
    public function events()
    {
        $data['events'] = Event::all();
        $data['title'] = 'Galeri Events';
        return view('user.events', $data);
    }
    public function eventShow(Event $event)
    {
        $data['event'] = $event;
        $data['title'] = 'Detail Event';
        return view('user.event-details', $data);
    }

    public function donate(Request $request)
    {
        $messages = [
            'name.required' => 'Nama wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'transfer_proof.required' => 'Bukti transfer wajib diunggah.',
            'transfer_date.required' => 'Tanggal transfer wajib diisi.',
        ];

        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'transfer_proof' => 'required',
            'transfer_date' => 'required',
        ], $messages);
        $validated = $valid->validated();

        if ($valid->fails()) {
            return response()->json(['message' => $valid->errors()->first(), 'success' => false]);
        }

        if ($request->hasFile('transfer_proof')) {
            $file = $request->file('transfer_proof');
            $file_name =  $request->name . '_' . now()->format('d-m-Y_H-i-s.') . $file->getClientOriginalExtension();
            $file_path = $file->storePubliclyAs('uploads/donasi',  $file_name, 'public');
            $validated['transfer_proof'] = $file_path;
        }
        Donation::create($validated);

        return response()->json(['message' => 'Donasi berhasil disimpan', 'success' => true]);
    }
}
