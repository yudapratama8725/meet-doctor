<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

//use library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//Request
use App\Requests\Doctor\Backsite\StoreDoctorRequest;
use App\Requests\Doctor\Backsite\UpdateDoctorRequest;

//use everything
//use Gate;
use Auth;

//model here
use App\Models\Operational\Doctor;
use App\Models\MasterData\Specialist;

//thirdparty package

class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //for table grid
        $doctor = Doctor::orderBy('created_at', 'desc')->get();

        //for select2 = ascending a to z
        $specialist = Specialist::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.doctor.index', compact('doctor','specialist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        //Get all Request from frontsite
        $data = $request->all();

        //Store to database
        $doctor = Doctor::create($data);

        alert()->success('Success Message', 'Successfully added new doctor');
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('pages.backsite.operational.doctor.show', compact('doctor'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //for select2 = ascending a to z
        $specialist = Specialist::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.doctor.edit', compact('doctor', 'specialist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //get all request from frontsite
        $data = $request->all();

        //update to database
        $doctor->update($data);

        alert()->success('Success Message', 'Successfully updated doctor');
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->forceDelete();

        alert()->success('Success Message', 'Successfully deleted doctor');
        return back();   
    }
}
