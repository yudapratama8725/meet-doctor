<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

//use library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//Request
use App\Requests\Specialist\Backsite\StoreSpecialistRequest;
use App\Requests\Specialist\Backsite\UpdateSpecialistRequest;

//use everything
//use Gate;
use Auth;

//model here
use App\Models\MasterData\Specialist;

//thirdparty package

class SpecialistController extends Controller
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
        $specialist = Specialist::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.master-data.specialist.index', compact('specialist'));
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
    public function store(StoreSpecialistRequest $request)
    {
        //Get all Request from frontsite
        $data = $request->all();

        //Store to database
        $specialist = Specialist::create($data);

        alert()->success('Success Message', 'Successfully added new specialist');
        return redirect()->route('backsite.specialist.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialist $specialist)
    {
        return view('pages.backsite.master-data.specialist.show', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialist $specialist)
    {
        return view('pages.backsite.master-data.specialist.edit', compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
        //get all request from frontsite
        $data = $request->all();

        //update to database
        $specialist->update($data);

        alert()->success('Success Message', 'Successfully updated specialist');
        return redirect()->route('backsite.specialist.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialist $specialist)
    {
        $specialist->forceDelete();

        alert()->success('Success Message', 'Successfully deleted specialist');
        return back();   
    }
}
