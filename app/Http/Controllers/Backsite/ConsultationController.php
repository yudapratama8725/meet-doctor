<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

//use library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//Request
use App\Requests\Consultation\StoreConsultationRequest;
use App\Requests\Consultation\UpdateConsultationRequest;

//use everything
//use Gate;
use Auth;

//model here
use App\Models\MasterData\Consultation;

//thirdparty package

class ConsultationController extends Controller
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
        $consultation = Consultation::orderBy('created_at', 'desc')->get();

        return view ('pages.backsite.master-data.consultation.index', compact('consultation'));
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
    public function store(StoreConsultationRequest $request)
    {
        //get all request from frontsite
        $data = $request->all();

        //Store to database
        $consultation = Consultation::create($data);

        alert()->success('Success Message', 'Successfully added new consultation');
        return redirect()->route('backsite.consultation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        return view('pages.backsite.master-data.consultation.show', compact('consultation'));
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
    public function update(UpdateConsultationRequest $request, Consultation $consultation)
    {
        //get all request from frontsite
        $data = request->all();

        //update to database
        $consultation->update($data);

        alert()->success('Success Message', 'Successfully updated consultation');
        return redirect()->route('backsite.consultation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->forceDelete();

        alert()->success('Success Message', 'Successfully deleted consultation');
        return back();
    }
}
