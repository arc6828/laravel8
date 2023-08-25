<x-bootstrap title="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quotation {{ $quotation->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/quotation') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/quotation/' . $quotation->id . '/edit') }}" title="Edit Quotation"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('quotation' . '/' . $quotation->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Quotation" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $quotation->id }}</td>
                                    </tr>
                                    <tr><th> Remark </th><td> {{ $quotation->remark }} </td></tr><tr><th> Vat Percent </th><td> {{ $quotation->vat_percent }} </td></tr><tr><th> Vat </th><td> {{ $quotation->vat }} </td></tr><tr><th> Sub Total </th><td> {{ $quotation->sub_total }} </td></tr><tr><th> Net Total </th><td> {{ $quotation->net_total }} </td></tr><tr><th> Customer Id </th><td> {{ $quotation->customer_id }} </td></tr><tr><th> User Id </th><td> {{ $quotation->user_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap>
