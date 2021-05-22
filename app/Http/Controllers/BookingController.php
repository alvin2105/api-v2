<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Parkir;
use App\Models\Booking;
use Illuminate\Http\Request;
use QrCode;

class BookingController extends Controller
{
   

// buat booking
    public function createBooking(Request $request )
    {
        $request->validate([
            'lahan_terpilih' => 'required',
            'tarif' => 'required',
            'jenis_pembayaran'=> 'required',
            'status_pembayaran',
            'email',
            'nama_parkir',
            'nomor_kendaraan'=> 'required',
            'kendaraan' => 'required',
            
        ]);
            
            $input = $request->all();
        
            Booking::create($input);
           $response = [
                'message'=>'Booking Succesfully',
                'booking' => $input,
                
                
            
            ];
            
            
            return response($response); 

        
        
    }
    // melihat riwayat booking
   public function riwayat($email){
        
        // return Booking::find($id);
        $riwayat = Booking::where('email', 'like', '%'.$email.'%')->get();
        $response = [
			$riwayat

        ];
        return response($response);
      
        
        
    }
// membatalkan booking
    public function cancelBooking($id)
    {
        return Booking::destroy($id);
        $response = [
			'message'=>'Booking canceled',
  
        ];
        return response($response);
    }
// accept pembyaran dengan mengupdate status pemyaran menjadi active
public function updateBooking(Request $request, $id)
{
    $booking = Booking::find($id);
    $booking->update($request->all());

    $response = [
        'message'=>'Update Succesfully',
        'booking' => $booking,
        
        
    ];

     return response($response); 
}

public function semuaRiwayat()
{
    return Booking::all();
}
    
}



    