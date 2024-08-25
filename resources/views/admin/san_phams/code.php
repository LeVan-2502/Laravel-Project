$.ajax({
                url: 'example.php',
                type: 'POST',
                data: {
                    param1: $('#param1').val(),
                    param2: $('#param2').val()
                },
                success: function(response) {
                    $('#response').html(response);
                },
                error: function(xhr, status, error) {
                    $('#response').html('Có lỗi xảy ra: ' + error);
                }
            });




            Hiển thị các biến thể mới có thể thêm
                                <?php
                                // Tạo một mảng để theo dõi các biến thể đã tồn tại
                                $existingVariants = [];
                                foreach ($san_pham_bien_thes as $bienThe) {
                                    $existingVariants[$bienThe->san_pham_size_id][$bienThe->san_pham_color_id] = true;
                                }
                                ?>

                                @foreach($sizes as $sizeID => $tenSize)
                                @foreach($colors as $colorID => $maMau)
                                <?php
                                // Kiểm tra nếu biến thể đã tồn tại thì không hiển thị biến thể mới
                                $isExisting = isset($existingVariants[$sizeID][$colorID]);
                                ?>
                                @if(!$isExisting)
                                <tr>
                                    <?php $i++; ?>
                                    <input type="hidden" value="{{$colorID}}" name="san_pham_bien_the[{{$i}}][san_pham_color_id]">
                                    <input type="hidden" value="{{$sizeID}}" name="san_pham_bien_the[{{$i}}][san_pham_size_id]">
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="san_pham_bien_the[{{$i}}][selected]" value="1">
                                        </div>
                                    </th>
                                    <td><strong>{{$tenSize}}</strong></td>
                                    <td>
                                        <div style="width:36px;height:36px; background-color:{{$maMau}};"></div>
                                    </td>
                                    <td>
                                        <input type="text" name="san_pham_bien_the[{{$i}}][gia]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="san_pham_bien_the[{{$i}}][so_luong]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="file" name="san_pham_bien_the[{{$i}}][hinh_anh]" class="form-control">
                                    </td>
                                    <td><a href="javascript:void(0);"><i class="ri-download-2-line"></i></a></td>
                                </tr>
                                @endif
                                @endforeach
                                @endforeach