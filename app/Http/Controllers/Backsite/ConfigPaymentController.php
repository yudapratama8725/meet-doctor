<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

//use library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//Request
use App\Requests\ConfigPayment\UpdateConfigPaymentRequest;

//use everything
//use Gate;
use Auth;

//model here
use App\Models\MasterData\ConfigPayment;

//thirdparty package

class ConfigPaymentController extends Controller
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
        $config_payment = ConfigPayment::all();

        return view('pages.backsite.master-data.config-payment.index', compact('config_payment'));
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
    public function edit(ConfigPayment $config_payment)
    {
        return view('pages.backsite.master-data.config-payment.edit', compact('config_payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConfigPaymentRequest $request, ConfigPayment $config_payment)
    {
        //get all request from frontsite
        $data = request->all();

        //update to database
        $config_payment->update($data);

        alert()->success('Success Message', 'Successfully updated config payment');
        return redirect()->route('backsite.config_payment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }
}
