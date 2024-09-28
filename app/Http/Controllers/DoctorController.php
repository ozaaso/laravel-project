<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illumiante\Contracts\View\View;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Resources\Json\JsonResource;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : ViewView | JsonResource
    {
        $data = Doctor::latest()->limit(5)->get(['uuid', 'name','email', 'phone']);
        return view('doctor.index',[
            'doctorsku' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : ViewView
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->only('name', 'email', 'phone');
        try{
            $data['uuid']= Str::uuid();
            Doctor::create($data);
            return redirect('/doctor')->with('success', 'Data berhasil ditambahkan!');

        }catch(\Exception $error){
            return redirect('/doctor/create')->with('error', $error->getMessage());

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Doctor::where('uuid', $id)->firstOrFail();

        return view('doctor.show',
        [
            //'doctor' nanti di halaman folder doctor/show,
            //bisa dipanggil valuenya dengan variable {{$doctor}}
            //jika ingin memanggil value didalamnya {{$doctor->nama}}
            'doctor' => $data
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
