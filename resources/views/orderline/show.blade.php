<x-bootstrap title="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Orderline {{ $orderline->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/orderline') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/orderline/' . $orderline->id . '/edit') }}" title="Edit Orderline"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('orderline' . '/' . $orderline->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Orderline" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $orderline->id }}</td>
                                    </tr>
                                    <tr><th> Line </th><td> {{ $orderline->line }} </td></tr><tr><th> Order Id </th><td> {{ $orderline->order_id }} </td></tr><tr><th> Movie Id </th><td> {{ $orderline->movie_id }} </td></tr><tr><th> Quantity </th><td> {{ $orderline->quantity }} </td></tr><tr><th> Order Date </th><td> {{ $orderline->order_date }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap>
