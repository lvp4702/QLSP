@extends('layouts.app')
@section('content')
    <div class="content">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add">
            Add new
        </button>
        <div id="list_product">

        </div>
    </div>

    @include('product.add')
    @include('product.edit')
@endsection

@section('JS')
    <script>
        $(document).ready(function() {

            load_product();

            //lấy dsach
            function load_product() {
                $.get('http://127.0.0.1:8000/api/listProduct', function(data) {
                    $('#list_product').html(data);
                });
            }

            //add
            $('#form-add').on('submit', function(e) {
                e.preventDefault();

                let data = new FormData(this);

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/v1/product/add',
                    data: data,
                    method: 'post',
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        $('#modal-add').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: res.message,
                        });
                        $('#form-add')[0].reset();
                        load_product();
                        $('#previewImage').hide();
                    },
                    error: function(xhr, status, error) {
                        var errors = JSON.parse(xhr.responseText).error;
                        Swal.fire({
                            icon: 'warning',
                            title: errors
                        })
                    }
                });
            });

            //close modal
            $(document).on('click', '#close', function() {
                $('#form-add')[0].reset();
                $('#form-edit')[0].reset();
                $('#previewImage').hide();
            });

            //delete
            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();
                let url = $(this).attr('data-url');
                Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa không?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'delete',
                            url: url,
                            success: function(res) {
                                Swal.fire(
                                    'Deleted!',
                                    res.message,
                                    'success'
                                )
                                load_product();
                            }
                        });
                    }
                });
            });

            //edit
            $(document).on('click', '.btn-edit', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                let name = $(this).data('name');
                let price = $(this).data('price');
                let describe = $(this).data('describe');
                let img = $(this).data('img')

                $('#up_id').val(id);
                $('#up_name').val(name);
                $('#up_price').val(price);
                $('#up_describe').val(describe);

                $('img#img_old').attr('src', "{{ asset('') }}" + img);
            });

            $('#form-edit').on('submit', function(e) {
                e.preventDefault();

                let data = new FormData(this);
                let id = $('#up_id').val();

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/v1/product/update/' + id,
                    data: data,
                    method: 'post',
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        $('#modal-edit').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: res.message,
                        });
                        $('#form-edit')[0].reset();
                        load_product();
                    },
                    error: function(xhr, status, error) {
                        var errors = JSON.parse(xhr.responseText).error;
                        Swal.fire({
                            icon: 'warning',
                            title: errors
                        })
                    }
                });
            });

            //pagination
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();

                let page = $(this).attr('href').split('page=')[1];
                product(page);
            });

            function product(page) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/listProduct?page=' + page,
                    method: 'get',
                    success: function(res) {
                        $('#list_product').html(res);
                    }
                });
            }

            //render img
            document.getElementById('img').addEventListener('change', function() {
                var file = this.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    var previewImage = document.getElementById('previewImage');
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                }

                reader.readAsDataURL(file);
            });
            document.getElementById('up_img').addEventListener('change', function() {
                var file = this.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    var previewImage = document.getElementById('previewImage_edit');
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                }

                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
