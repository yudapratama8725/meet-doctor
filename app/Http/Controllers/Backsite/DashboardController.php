<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use library here
use Symfony\Component\HttpFoundation\Response;

// use everything here
use Gate;
use Auth;

class DashboardController extends Controller
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
        abort_if(Gate::denies('dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('pages.backsite.dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return abort();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return abort();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return abort();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return abort();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort();
    }
}
