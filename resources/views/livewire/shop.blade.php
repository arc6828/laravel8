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
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Id</th>
                    <th>Title</th>
                    <th>Actor</th>
                    <th>Price</th>
                    <th>Special</th>
                    <th>Common Id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->category_id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->actor }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->special }}</td>
                        <td>{{ $item->common_id }}</td>
                        <td>
                            <a href="{{ url('/movie/' . $item->id) }}" title="View Movie"><button
                                    class="btn btn-info btn-sm"><i class="fa fa-eye"
                                        aria-hidden="true"></i> View</button></a>
                            <a href="{{ url('/movie/' . $item->id . '/edit') }}"
                                title="Edit Movie"><button class="btn btn-primary btn-sm"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    Edit</button></a>

                            <form method="POST" action="{{ url('/movie' . '/' . $item->id) }}"
                                accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm"
                                    title="Delete Movie"
                                    onclick="return confirm('Confirm delete?')"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i>
                                    Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $movie->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>
</div>
