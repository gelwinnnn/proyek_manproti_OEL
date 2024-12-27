<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        $data['title'] = 'Event';
        $data['events'] = Event::all();
        return view('admin.events', $data);
    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5148',
            'date' => 'required|date',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'image.required' => 'Gambar wajib diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Gambar harus berformat jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar maksimal 5MB.',
            'date.required' => 'Tanggal wajib diisi.',
            'date.date' => 'Tanggal harus berupa format tanggal yang valid.',
        ]);
        $validated = $valid->validated();

        if ($valid->fails()) {
            return response()->json(['success' => false, 'message' => $valid->errors()->first()]);
        }


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name =  $request->name . '_' . now()->format('d-m-Y_H-i-s.') . $file->getClientOriginalExtension();
            $file_path = $file->storePubliclyAs('uploads/events',  $file_name, 'public');
            $validated['image'] = $file_path;
        }

        Event::create($validated);
        return response()->json(['success' => true, 'message' => 'Event berhasil ditambahkan.']);
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json(['success' => true, 'message' => 'Event berhasil dihapus!']);
    }

    public function update(Request $request, Event $event)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:5148',
            'date' => 'required|date',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Gambar harus berformat jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar maksimal 5MB.',
            'date.required' => 'Tanggal wajib diisi.',
            'date.date' => 'Tanggal harus berupa format tanggal yang valid.',
        ]);
        $validated = $valid->validated();

        if ($valid->fails()) {
            return response()->json(['success' => false, 'message' => $valid->errors()->first()]);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name =  $request->name . '_' . now()->format('d-m-Y_H-i-s.') . $file->getClientOriginalExtension();
            $file_path = $file->storePubliclyAs('uploads/events',  $file_name, 'public');
            $validated['image'] = $file_path;
        }

        $event->update($validated);
        return response()->json(['success' => true, 'message' => 'Event berhasil diubah.']);
    }
}
