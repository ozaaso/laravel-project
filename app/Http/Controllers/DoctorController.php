<?php

namespace App\Http\Controllers;

use App\Http\Services\DoctorService;
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


    public function __construct(private DoctorService $doctorService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index() : ViewView | JsonResource
    {
        // $dataDb = Doctor::latest()->limit(5)->get(['uuid', 'name','email', 'phone']);
        $dataDb = $this->doctorService->getWithPaginate();
        return view('doctor.index',[
            'doctorsku' => $dataDb
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

        $dataDb = $request->only('name', 'email', 'phone');
        try{
            $this->doctorService->create($dataDb);
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
        $dataDb = $this->doctorService->getById($id);

        return view('doctor.show',
        [
            //'doctor' nanti di halaman folder doctor/show,
            //bisa dipanggil valuenya dengan variable {{$doctor}}
            //jika ingin memanggil value didalamnya {{$doctor->nama}}
            'doctor' => $dataDb
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $dataDb = $this->doctorService->getById($id);
        return view('doctor.edit', ['doctor' => $dataDb]);
        // return $dataDb;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{

            $this->doctorService->updateDoctor($request, $id);

            return redirect('/doctor')->with('success', 'Data berhasil diupdate!');

        }catch(\Exception $error){
            return redirect('/doctor/'.$id.'/edit')->with('error', $error->getMessage());

        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        try{
            $this->doctorService->deleteDoctor( $id );
            return redirect('/doctor')->with('success', 'Data berhasil dihapus!');
        }catch(\Exception $error){
            return redirect('/doctor')->with('error', $error->getMessage());

        }
    }


    public function searchByName(string $query)
    {
        $doctors = $this->doctorService->searchByName($query);
        return view('doctor.search', [
            'doctorsku' => $doctors
        ]);
    }
}
