<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Sample;
use Illuminate\Http\Request;


class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

         return view(config('system.paths.backend.page') . 'page2.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(config('system.paths.backend.page') . 'page2.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SampleRequest $request)
    {

        return redirect()->route('page2.index')->withSuccess(__('Sample created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Sample $sample)
    {
        return view(config('system.paths.backend.page') . 'page2.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sample $sample)
    {

        return view(config('system.paths.backend.page') . 'page2.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SampleRequest $request, Sample $sample)
    {
        return redirect()->route('page2.index')->withSuccess(__('Sample updated successfully.'));        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sample $sample)
    {
        $sample->delete();

        return redirect()->route('page2.index')->withSuccess(__('Sample deleted successfully.'));
    }

    /**
     * Remove the specified resource from the database permanently.
    */
    public function forceDelete(Sample $sample)
    {
        $sample->forceDelete();
    
        return redirect()->route('page2.index')->withSuccess(__('Sample permanently deleted.'));
    }
}
