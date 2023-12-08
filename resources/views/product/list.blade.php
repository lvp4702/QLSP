
<table class="tbl">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Describe</th>
        <th>Date created</th>
        <th>Date updated</th>
        <th>Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td><img src="{{ asset($product->img) }}" alt=""></td>
        <td>{{ $product->price }}</td>
        <td><textarea disabled rows="4" cols="40">{{ $product->describe }}</textarea></td>
        <td>{{ ($product->created_at)->format('d/m/Y - h:i:s') }}</td>
        <td>{{ ($product->updated_at)->format('d/m/Y - h:i:s') }}</td>
        <td>
            <button data-bs-toggle="modal" data-bs-target="#modal-edit"
                data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                data-describe="{{ $product->describe }}" data-img="{{ $product->img }}"
                class="btn btn-success btn-edit">
                Sửa
            </button>
            <button data-url="{{ route('product.destroy', $product->id) }}" class="btn btn-danger btn-delete">Xóa</button>
        </td>
    </tr>
    @endforeach
</table>

{{ $products->links() }}
