<?php

namespace App\Http\Services;

use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DoctorService
{
    public function getById(String $id)

    {
        return Doctor::where('uuid',$id)->firstOrFail();
    }

    public function getWithPaginate(int $paginate = 5)
    {
        return Doctor::latest()->select(['uuid', 'name','email', 'phone'])->paginate($paginate);
    }

    public function create(array $dataDb)
    {
        $dataDb['uuid']= Str::uuid();
        return Doctor::create($dataDb);
    }

    public function update(array $dataDb, String $id)
    {

        $dataDb = $this->getById($id);

        return $dataDb->update($dataDb);
    }


    public function updateDoctor(Request $request, string $id)
    {
        // Ambil data dari database menggunakan metode getById
        $dataDb = $this->getById($id);

        // Data yang akan diperbarui dari request
        $dataUpdate = $request->only(['name', 'email', 'phone', 'gender']);

        // Melakukan update data di database
        $dataDb->update($dataUpdate);

        return $dataDb;
    }


    public function deleteDoctor(String $id)

    {
        // Ambil data dari database menggunakan metode getById
        $dataDb = $this->getById($id);
        return $dataDb->delete();
    }
}

