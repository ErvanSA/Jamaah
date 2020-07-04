<?php

namespace App\Http\Controllers;
use App\Models\Jamaah;
use Illuminate\Http\Request;

class JamaahController extends Controller
{
    public function create(Request $request)
    {
       $this->validate($request, [
            'namaJamaah' => 'required||max:50',
            'gender' => 'required|in:L,P',
            'telpJamaah' => 'required|max:15'
       ]);
    
       $jamaah = new Jamaah;
       $jamaah->namaJamaah = $request->namaJamaah;
       $jamaah->gender = $request->gender;
       $jamaah->telpJamaah = $request->telpJamaah;
       $jamaah->save();

       return response()->json($jamaah,201);
    }

    public function index(Request $request)
    {
        $jamaah = Jamaah::paginate(10);
        return response()->json($jamaah,200);
    }

    public function update(Request $request,$idJamaah)
    {
        $this->validate($request, [
            'namaJamaah' => 'required||max:50',
            'gender' => 'required|in:L,P',
            'telpJamaah' => 'required|max:15'
        ]);

        $jamaah = Jamaah::findOrFail($idJamaah);
        $jamaah->namaJamaah = $request->namaJamaah;
        $jamaah->gender = $request->gender;
        $jamaah->telpJamaah = $request->telpJamaah;
        $jamaah->save();

        return response()->json($jamaah,200);
    }

    public function delete($idJamaah)
    {
        $jamaah = Jamaah::findOrFail($idJamaah);
        $jamaah->delete();

        return response()->json($jamaah,200);
    }

    public function show($idJamaah)
    {
        $jamaah = Jamaah::findOrFail($idJamaah);

        return response()->json($jamaah,200);
    }
}