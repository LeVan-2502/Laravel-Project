<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Http\Requests\StoreDanhMucRequest;
use App\Http\Requests\UpdateDanhMucRequest;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.danh_mucs.';
    public function index()
    {
        $data = DanhMuc::query()->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDanhMucRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DanhMuc $danhMuc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DanhMuc $danhMuc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDanhMucRequest $request, DanhMuc $danhMuc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DanhMuc $danhMuc)
    {
        //
    }
}
