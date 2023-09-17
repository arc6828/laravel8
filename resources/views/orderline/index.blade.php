<x-bootstrap title="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Orderline</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">
                                <a href="{{ url('/orderline/create') }}" class="btn btn-success btn-sm" title="Add New Orderline">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <form method="GET" action="{{ url('/orderline') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                        <span class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Line</th><th>Order Id</th><th>Movie Id</th><th>Quantity</th><th>Order Date</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orderline as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->line }}</td><td>{{ $item->order_id }}</td><td>{{ $item->movie_id }}</td><td>{{ $item->quantity }}</td><td>{{ $item->order_date }}</td>
                                        <td>
                                            <a href="{{ url('/orderline/' . $item->id) }}" title="View Orderline"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/orderline/' . $item->id . '/edit') }}" title="Edit Orderline"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/orderline' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Orderline" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $orderline->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap>
