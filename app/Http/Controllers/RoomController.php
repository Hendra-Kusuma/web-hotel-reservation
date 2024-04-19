<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $rooms = Room::where('id_hotel', $id)->get()->all();
        $hotel = Hotel::where('id', $id)->first();
        return view('rooms/room', ['rooms'=>$rooms, 'hotel'=>$hotel]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $hotel = Hotel::find($id);
        return view('rooms/create-room', ['hotel'=>$hotel]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'name_room' => 'required|min:5',
                'image_room' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'price'=>'required|',
                'id_hotel' => 'required|min:1'
            ]);
    
            Room::create([
                'name_room' => $request->name_room,
                'image_room' => $request->file('image_room')->store('images'),
                'price' => $request->price,
                'id_hotel'=> $request->id_hotel
            ]);

            return redirect('/room/'.$request->id_hotel)->with('success', 'new room,'.$request->name_hotel.' has been created!😋');
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $room = Room::find($id);
        // dd($room);
        $hotel= Hotel::find($room->id_hotel);
        return view('rooms/editRooms', ['room' => $room, 'hotel'=>$hotel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    { 
    try {
        // dd($request);
        // Validasi input
        $request->validate([
            'name_room' => 'required|min:5',
            'image_room' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required',
            'id_hotel' => 'required|min:1'
        ]);

        // Temukan room berdasarkan ID
        $room = Room::find($request->id);

        // Lakukan perubahan pada atribut room
        $room->name_room = $request->name_room;
        $room->price = $request->price;
        $room->id_hotel = $request->id_hotel;

        // Periksa apakah file gambar baru diunggah
        if ($request->hasFile('image_room')) {
            // Hapus file gambar lama
            Storage::delete($room->image_room);
            // Simpan file gambar yang baru
            $room->image_room = $request->file('image_room')->store('images');
        }

        // Simpan perubahan pada room
        $room->save();

        // Redirect kembali ke halaman edit dengan pesan sukses
        return redirect('/room/'.$request->id_hotel)->with('success', 'Room updated successfully');
    } catch (\Throwable $th) {
        throw $th;
    }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
        
        // Mendekode string JSON menjadi objek PHP
    $hotelData = json_decode($request->hotel_id);

    // Mendapatkan nilai 'id' dari objek hotel
    $hotelId = $hotelData->id;

    // Hapus kamar dari database
    Room::destroy($id);

    // Redirect kembali ke halaman room dengan pesan sukses
    return redirect('/room/'.$hotelId)->with('success', 'Room deleted successfully');
    }
}
