<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Need;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $data['title'] = 'Donasi';
        $data['donations'] = Donation::all();
        return view('admin.donation', $data);
    }

    public function getTransfer(Donation $donation)
    {
        $transfer_proof = $donation->transfer_proof;
        return response()->json(['success' => true, 'transfer_proof' => $transfer_proof]);
    }
}
