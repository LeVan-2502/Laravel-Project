<table id="comments-table" class="table table-bordered table-hover">
    <thead class="table-light text-muted">
        <tr>
            <th scope="col" style="width: 50px;">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                </div>
            </th>

            <th class="sort" data-sort="customer_name">Customer</th>
            <th class="sort" data-sort="email">Email</th>
            <th class="sort" data-sort="phone">Phone</th>
            <th class="sort" data-sort="date">Joining Date</th>
            <th class="sort" data-sort="status">Status</th>
            <th class="sort" data-sort="action">Action</th>
        </tr>
    </thead>
    <tbody class="list form-check-all">
        <tr>
            <th scope="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                </div>
            </th>
            <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ10</a></td>
            <td class="customer_name">Timothy Smith</td>
            <td class="email">timothysmith@velzon.com</td>
            <td class="phone">973-277-6950</td>
            <td class="date">13 Dec, 2021</td>
            <td class="status"><span class="badge bg-success-subtle text-success text-uppercase">Active</span></td>
            <td>
                <ul class="list-inline hstack gap-2 mb-0">
                    <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                        <a href="#showModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
                            <i class="ri-pencil-fill fs-16"></i>
                        </a>
                    </li>
                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                        <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteRecordModal">
                            <i class="ri-delete-bin-5-fill fs-16"></i>
                        </a>
                    </li>
                </ul>
            </td>
        </tr>


    </tbody>
</table>
<table id="comments-table" class="table table-bordered table-hover">
    <thead class="table-light text-muted">
        <tr>
            <th scope="col" style="width: 50px;">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                </div>
            </th>
            <th>ID</th>
            <th>Người dùng</th>
            <th>Sản phẩm</th>
            <th>Bài viết</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody class="list form-check-all">
        @foreach($binh_luans as $binh_luan)
        <tr>
            <th scope="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="ids[]" value="{{ $binh_luan->id }}">
                </div>
            </th>
            <td>{{ $binh_luan->id }}</td>
            <td>{{ $binh_luan->taiKhoan->ten_tai_khoan ?? 'N/A' }}</td>
            <td>{{ $binh_luan->sanPham->ten_san_pham ?? 'N/A' }}</td>
            <td>{{ $binh_luan->noi_dung }}</td>
            <td>{{ $binh_luan->trang_thai }}</td>
            <td>
                <button type="button" class="detail-btn btn btn-secondary btn-icon waves-effect waves-light btn-sm">
                    <i class="ri-menu-add-line fs-16"></i>
                </button>
                <a onclick="return confirm('Khi bạn xác nhận mọi thông tin về đơn hàng sẽ bị xóa')"
                    href="{{ route('admin.binh_luans.destroy', $binh_luan->id) }}"
                    class="btn btn-danger btn-icon waves-effect waves-light btn-sm">
                    <i class="ri-delete-bin-7-line fs-16"></i>
                </a>
            </td>
        </tr>
        @if($binh_luan->phanHois->isNotEmpty() || $binh_luan->binhLuans->isNotEmpty())
        <tr class="comment-detail" style="display: none;">
            <td colspan="7">
                <div class="binh_luan">
                    @if($binh_luan->binhLuans->count() > 0)
                    <div class="replies">
                        @include('admin.binh_luans.partial.comment', ['binh_luan' => $binh_luan->binhLuans])
                    </div>
                    @else
                    <div class="phan-hois">
                        @foreach($binh_luan->phanHois as $item)
                        <p>{{ $item->noi_dung }}</p>
                        @endforeach
                    </div>
                    @endif
                </div>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
<table id="comments-table" class="table table-bordered table-hover">
    <thead class="table-light text-muted">
        <tr>
            <th scope="col" style="width: 50px;">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                </div>
            </th>
            <th>ID</th>
            <th>Người dùng</th>
            <th>Sản phẩm</th>
            <th>Bài viết</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody class="list form-check-all">
        @foreach($binh_luans as $binh_luan)
        <tr>
            <th scope="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="ids[]" value="{{ $binh_luan->id }}">
                </div>
            </th>
            <td>{{ $binh_luan->id }}</td>
            <td>{{ $binh_luan->taiKhoan->ten_tai_khoan ?? 'N/A' }}</td>
            <td>{{ $binh_luan->sanPham->ten_san_pham ?? 'N/A' }}</td>
            <td>{{ $binh_luan->noi_dung }}</td>
            <td>{{ $binh_luan->trang_thai }}</td>
            <td>
                <button type="button" class="detail-btn btn btn-secondary btn-icon waves-effect waves-light btn-sm">
                    <i class="ri-menu-add-line fs-16"></i>
                </button>
                <a onclick="return confirm('Khi bạn xác nhận mọi thông tin về đơn hàng sẽ bị xóa')"
                    href="{{ route('admin.binh_luans.destroy', $binh_luan->id) }}"
                    class="btn btn-danger btn-icon waves-effect waves-light btn-sm">
                    <i class="ri-delete-bin-7-line fs-16"></i>
                </a>
            </td>
        </tr>
        @if($binh_luan->phanHois->isNotEmpty() || $binh_luan->binhLuans->isNotEmpty())
        <tr class="comment-detail" style="display: none;">
            <td colspan="7">
                <div class="binh_luan">
                    @if($binh_luan->binhLuans->count() > 0)
                    <div class="replies">
                        @include('admin.binh_luans.partial.comment', ['binh_luan' => $binh_luan->binhLuans])
                    </div>
                    @else
                    <div class="phan-hois">
                        @foreach($binh_luan->phanHois as $item)
                        <p>{{ $item->noi_dung }}</p>
                        @endforeach
                    </div>
                    @endif
                </div>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>