<div>
    
    <div class="row g-4">
        <div class="col-lg-3">
            <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
        </div>
        <div class="col-lg-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary w-100" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="fa fa-filter"></i> Filter
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <select class="form-select" aria-label="Default select example">
                <option value="best-seller">Best Seller</option>
                <option value="price-asc" selected>Price : Low - High</option>
                <option value="price-desc">Price : High - Low</option>
            </select>
        </div>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="search" placeholder="Search..." wire:model="keyword" />

            {{-- <form method="GET" action="{{ route('product.index') }}" class="form-inline">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search..." wire:model="keyword"/>
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </span>
                </div>
            </form> --}}
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table my-4">
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
                    <td>{{ $item->id }}</td>
                    <td>
                        <img src="{{ $item->photo }}" height="100" />
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        <div class="d-flex justify-content-around px-4">
                            <a class="btn btn-info" href="{{ route('product.show', $item->id) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('product.edit', $item->id) }}">Edit</a>

                            <form action="{{ route('product.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Confirm delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="mt-4">{{ $products->appends(['search' => request('search')])->links() }}</div>
</div>
