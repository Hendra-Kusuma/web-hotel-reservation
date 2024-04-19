<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::paginate(6);
        return view('hotels.hotel-page', ['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createHotel()
    {
        return view('hotels.hotel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_hotel' => 'required|unique:hotels|min:5',
            'alamat' => 'required|min:5',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'total_room' => 'required|min:1'
        ]);

        $imageUrl = $request->file('image_url')->store('images');

        Hotel::create([
            'name_hotel' => $request->name_hotel,
            'alamat' => $request->alamat,
            'image_url' => $imageUrl,
            'total_room' => $request->total_room
        ]);

        return redirect('/hotel')->with('success', 'New hotel ' . $request->name_hotel . ' has been created!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hotel = Hotel::find($id);
        return view('hotels.edit-hotel', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        // dd($request);
        try {
            $request->validate([
                'name_hotel' => 'unique:hotels|min:5',
                'alamat' => 'min:5',
                'image_url' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'total_room' => 'min:1'
            ]);
            $hotel = Hotel::find($id);
    
            // Lakukan perubahan pada atribut hotel
            $hotel->name_hotel = $request->name_hotel;
            $hotel->alamat = $request->alamat;
            $hotel->total_room = $request->total_room;
    
            // Periksa apakah file gambar baru diunggah
            if ($request->hasFile('image_url')) {
                // Hapus file gambar lama
                Storage::delete($hotel->image_url);
                // Simpan file gambar yang baru
                $imageUrl = $request->file('image_url')->store('images');
                $hotel->image_url = $imageUrl;
            } else {
                $hotel->image_url = $hotel->image_url;
            }
            $hotel->save();
            // Redirect kembali ke halaman edit dengan pesan sukses
            return redirect('/hotel')->with('success', 'Hotel updated successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus data hotel dari database
        Hotel::destroy($id);
        return redirect('/hotel')->with('success', 'Hotel deleted successfully');
    }
}
