<?php

namespace App\Policies;

use App\Models\Banner;
use App\Models\TaiKhoan;
use Illuminate\Auth\Access\Response;

class BannerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(TaiKhoan $taiKhoan): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(TaiKhoan $taiKhoan, Banner $banner): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(TaiKhoan $taiKhoan): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(TaiKhoan $taiKhoan, Banner $banner): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(TaiKhoan $taiKhoan, Banner $banner): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(TaiKhoan $taiKhoan, Banner $banner): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(TaiKhoan $taiKhoan, Banner $banner): bool
    {
        //
    }
}
