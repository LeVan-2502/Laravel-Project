@php
$currentIndex = 1; // Bắt đầu từ 1
$color = ['success', 'info', 'warning', 'danger'];
$i=0
@endphp
@if($binh_luan->isNotEmpty())
@foreach($binh_luan as $binh_luan_item)
<div class="accordion-item border-0">
    <div class="accordion-header" id="heading{{$binh_luan_item->id}}">
        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse{{$binh_luan_item->id}}" aria-expanded="true" aria-controls="collapse{{$binh_luan_item->id}}">
            <div class="d-flex justify-content-between align-items-start w-100">
                <div class="flex-shrink-0 avatar-xs me-2">
                    <div class="avatar-title bg-{{ $color[$i] }} rounded-circle">
                        <i class="ri-add-circle-fill fs-16"></i>
                    </div>
                </div>
                <div class="comment-header d-flex flex-column flex-grow-1 ms-3">
                    <div>
                        <strong class="text-primary">ID {{ $binh_luan_item->id ?? 'N/A' }}</strong>
                        | <span class="text-danger"><strong>{{ $binh_luan_item->taiKhoan->ten_tai_khoan ?? 'N/A' }}</strong></span>
                        <small class="text-muted">| {{ $binh_luan_item->created_at->format('d/m/Y H:i') }} | </small>

                        @if($binh_luan_item->trang_thai === 'active')
                        <span class="badge bg-warning">{{$binh_luan_item->trang_thai}}</span>
                        @elseif($binh_luan_item->trang_thai === 'inactive')
                        <span class="badge bg-success">Inactive</span>
                        @elseif($binh_luan_item->trang_thai === 'deleted')
                        <span class="badge bg-danger">Deleted</span>
                        @else
                        <span class="badge bg-secondary">Unknown</span>
                        @endif
                    </div>

                    <div class="comment-content mt-2">
                        <p>{{ $binh_luan_item->noi_dung }}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button
                        data-id="{{ $binh_luan_item->id }}"
                        data-noi-dung="{{ $binh_luan_item->noi_dung }}"
                        data-trang-thai="{{ $binh_luan_item->trang_thai }}"
                        data-bs-toggle="modal"
                        data-bs-target="#showPhanhoi"
                        type="button" class="btn btn-info btn-sm me-1 btn-binhluan">Sửa
                    </button>
                    <a
                        data-id="{{ $binh_luan_item->id }}"
                        data-type="binhluan"
                        href="javascript:void(0);"
                        id="delete"
                        class="btn btn-danger btn-sm delete">Xóa
                    </a>
                  
                </div>

            </div>
        </a>
    </div>
    <div id="collapse{{$binh_luan_item->id}}" class="" aria-labelledby="heading{{$binh_luan_item->id}}" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body ms-2 ps-5 pt-0">
            @if($binh_luan_item->binhLuans->isNotEmpty())

            <div class="nested-comments ms-4 mt-3">
                @include('admin.binh_luans.partial.comment', ['binh_luan' => $binh_luan_item->binhLuans])
            </div>
            @elseif($binh_luan_item->phanHois->isNotEmpty())

            <div class="phan-hois ms-4 mt-2">
                @foreach($binh_luan_item->phanHois as $phan_hoi_item)
                <div class="d-flex justify-content-between align-items-start w-100">
                    <div class="flex-shrink-0 avatar-xs me-2">
                        <div class="avatar-title bg-secondary rounded-circle">
                            <i class="ri-add-circle-fill fs-16"></i>
                        </div>
                    </div>
                    <div class="comment-header d-flex flex-column flex-grow-1 ms-3">
                        <div>
                            <strong class="text-primary">ID {{ $phan_hoi_item->id ?? 'N/A' }}</strong>
                            | <span class="text-danger"><strong>{{ $phan_hoi_item->taiKhoan->ten_tai_khoan ?? 'N/A' }}</strong></span>
                            <small class="text-muted">| {{ $phan_hoi_item->created_at->format('d/m/Y H:i') }}</small>
                        </div>
                        <div class="comment-content mt-2">
                            <p>{{ $phan_hoi_item->noi_dung }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center p-2">
                        <!-- Các nút hành động -->
                        <button
                            data-id="{{ $phan_hoi_item->id }}"
                            data-noi-dung="{{ $phan_hoi_item->noi_dung }}"
                            data-trang-thai="{{ $phan_hoi_item->trang_thai }}"
                            data-bs-toggle="modal"
                            data-bs-target="#showPhanhoi"
                            type="button" class="btn btn-info btn-sm me-1 btn-phanhoi">Sửa
                        </button>
                        <a
                            data-id="{{ $phan_hoi_item->id }}"
                            data-type="phanhoi"
                            href="javascript:void(0);"
                            id="delete"
                            class="btn btn-danger btn-sm delete">Xóa
                        </a>

                    </div>
                    <div class="modal fade" id="showPhanhoi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header  bg-info p-3">
                                    <h5 class="modal-title text-white" id="exampleModalLabel">Sửa thông tin bình luận</h5>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form class="tablelist-form" autocomplete="off">
                                    <input type="hidden" name="type" id="type">
                                    <input type="hidden" name="id" id="id">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="">Nội dung</label>
                                            <div class="table-wrapper" style="max-height: 500px; overflow-y: auto;">
                                                <textarea style="height:120px" class="form-control" name="noi_dung" id="noi_dung"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 ">
                                            <label for="trang_thai" class="form-label">Trạng thái</label>
                                            <select name="trang_thai" id="trang_thai" class="form-control">
                                                <option value="">-- Chọn trạng thái --</option>
                                                <option value="inactive">inactive</option>
                                                <option value="active">active</option>
                                                <option value="deleted">deleted</option>
                                            </select>
                                            @error('trang_thai')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a
                                            href="javascript:void(0);"
                                            id="update"
                                            class="btn btn-danger update">Submit
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endforeach
@endif