<x-themecrud title="Products">
    <div class="row">
        <div class="col-lg-12">
            <div class="my-4">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table">
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Content</th>
            <th>Price</th>
            <th>Stock</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ $item->photo }}" height="100" />

                </td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->content }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->stock }}</td>
                <td>
                    <form action="{{ route('product.destroy', $item->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('product.show', $item->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('product.edit', $item->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="mt-4">{{ $products->appends(['search' => request('search')])->links() }}</div>
</x-themecrud>
