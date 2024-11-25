<div class="col-sm-auto">
    <button data-don-hang-id="{{$don_hang->id}}"
            data-van-chuyen-id="{{$don_hang->van_chuyen_id}}"
            data-trang-thai="{{$don_hang->trang_thai_don_hang_id}}"
            type="button" 
            class="btn btn-soft-danger btn-sm mt-2 mt-sm-0"
            data-bs-toggle="modal" 
            data-bs-target="#showModal">
            <i class="mdi mdi-archive-remove-outline fs-16 align-middle me-1"></i>
    </button>

    <!-- Modal -->
    <div class="modal" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div style="border-bottom: 1px solid gray" class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Lý do hủy đơn</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-header bg-light p-3">

                    <ul id="product-list" class="d-flex flex-wrap">
                    </ul>

                </div>
                <form class="tablelist-form" autocomplete="off">
                    <div class="modal-body">
                        <div class="table-wrapper" style="max-height: 500px; overflow-y: auto;">
                            <textarea class="form-control" name="ghi_chu" id=""></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0);" id="cancel-order" type="a" class="btn btn-success">Submit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>