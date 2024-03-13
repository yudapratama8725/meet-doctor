<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
// use library here
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// use everything here
// use Gate;
use Auth;

// use model here
use App\Models\User;
use App\Models\Operational\Appointment;
use App\Models\Operational\Transaction;
use App\Models\Operational\Doctor;
use App\Models\MasterData\Specialist;
use App\Models\MasterData\Consultation;
use App\Models\MasterData\ConfigPayment;

class HospitalPatientController extends Controller
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
        $hospital_patient = User::whereHas('detail_user', function ($query) {
                                    return $query->where('type_user_id', 3);
                                })->orderBy('created_at', 'desc')->get();

        return view('pages.backsite.operational.hospital-patient.index', compact('hospital_patient'));
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
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }
}
