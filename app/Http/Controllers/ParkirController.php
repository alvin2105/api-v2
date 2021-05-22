<?php

namespace App\Http\Controllers;
use App\Models\Parkir;
use Illuminate\Http\Request;

class ParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Parkir::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_parkir' => 'required',
            'lokasi_parkir' => 'required',
            'harga' => 'required',
            'jarak' => 'required',
            'jam' => 'required',
            'rating' => 'required',
            'status_lahan' => 'required',
            'total_lahan' => 'required',
            'lahan_tersedia' => 'required',
            'lahan_tidak_tersedia' => 'required',
            'link_map' => 'required',
            'link_image' => 'required',
           'image_parkir' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            

        ]);

            // $file_name = time().'.'.$request->image_parkir->extension();
            // $request->image_parkir->move(public_path('images'),$file_name);

            // return Parkir::create($request->all());

          
    
      
    
            $input = $request->all();
            if ($image_parkir = $request->file('image_parkir')) {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image_parkir->getClientOriginalExtension();
                $image_parkir->move($destinationPath, $profileImage);
                $input['image_parkir'] = "$profileImage";
    
            }
    
        
    
            Parkir::create($input);
            $response = [
                'message'=>'Added Succesfully',
                'parkir' => $input,
                
                
            ];
    
             return response($response); 
            
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Parkir::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Parkir  $parkir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parkir = Parkir::find($id);
        $parkir->update($request->all());
   
        $response = [
			'message'=>'Update Succesfully',
            'parkir' => $parkir,
            
			
        ];

         return response($response); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_parkir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Parkir::destroy($id);
        $response = [
			'message'=>'Delete Succesfully',
            
            
		
        ];
        return response($response);
    }

     /**
     * Search for a name
     *
     * @param  str  $nama_parkir
     * @return \Illuminate\Http\Response
     */
    public function search($nama_parkir)
    {
        $search = Parkir::where('nama_parkir', 'like', '%'.$nama_parkir.'%')->get();
        $response = [
			$search
            
		
        ];
        return response($response);

    }
}
