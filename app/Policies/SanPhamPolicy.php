<?php

namespace App\Policies;

use App\Models\SanPham;
use App\Models\TaiKhoan;
use Illuminate\Auth\Access\Response;

class SanPhamPolicy
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
    public function view(TaiKhoan $taiKhoan, SanPham $sanPham): bool
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
    public function update(TaiKhoan $taiKhoan, SanPham $sanPham): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(TaiKhoan $taiKhoan, SanPham $sanPham): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(TaiKhoan $taiKhoan, SanPham $sanPham): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(TaiKhoan $taiKhoan, SanPham $sanPham): bool
    {
        //
    }
}
