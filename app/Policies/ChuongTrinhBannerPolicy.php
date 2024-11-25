<?php

namespace App\Policies;

use App\Models\ChuongTrinhBanner;
use App\Models\TaiKhoan;
use Illuminate\Auth\Access\Response;

class ChuongTrinhBannerPolicy
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
    public function view(TaiKhoan $taiKhoan, ChuongTrinhBanner $chuongTrinhBanner): bool
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
    public function update(TaiKhoan $taiKhoan, ChuongTrinhBanner $chuongTrinhBanner): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(TaiKhoan $taiKhoan, ChuongTrinhBanner $chuongTrinhBanner): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(TaiKhoan $taiKhoan, ChuongTrinhBanner $chuongTrinhBanner): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(TaiKhoan $taiKhoan, ChuongTrinhBanner $chuongTrinhBanner): bool
    {
        //
    }
}
