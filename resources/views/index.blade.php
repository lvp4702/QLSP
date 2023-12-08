@extends('layouts.app')
@section('content')
<div class="content">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add">
        Add new
    </button>
    <div id="list_product">

    </div>
</div>
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
        });
    </script>
@endsection
