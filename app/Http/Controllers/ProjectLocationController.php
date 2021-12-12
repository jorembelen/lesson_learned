<?php

namespace App\Http\Controllers;

use App\Models\ProjectLocation;
use App\Http\Requests\StoreProjectLocationRequest;
use App\Http\Requests\UpdateProjectLocationRequest;

class ProjectLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectLocationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectLocation  $projectLocation
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectLocation $projectLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectLocation  $projectLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectLocation $projectLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectLocationRequest  $request
     * @param  \App\Models\ProjectLocation  $projectLocation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectLocationRequest $request, ProjectLocation $projectLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectLocation  $projectLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectLocation $projectLocation)
    {
        //
    }
}
