<x-themepdf title="">
    <style>
        table,
        td,
        th {
            border: 1px solid;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>

    <div class="card">
        <div class="card-body">
            <div>
                <div>มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ในพระบรมราชูปถัมภ์</div>
                <div>เลขที่ 1 หมู่ 20 ถนนพหลโยธิน ต.คลองหนึ่ง อ.คลองหลวง จ.ปทุมธานี 13180</div>
                <div>Tel : 0-2529-0674-7</div>
                <div>Email : saraban@vru.ac.th</div>
            </div>
            <br />
            <hr />
            <br />
            <div style="text-align: center;">
                <div>ใบเสนอราคา</div>
                <div>Quotation</div>
            </div>
            <br />
            <hr />
            <br />
            @php
                // CALCULATE
                $net_total = $quotation->quotationDetails()->sum('total');
                $vat = ($quotation->vat_percent / 100) * $net_total;
                $sub_total = $net_total - $vat;
                // FORMAT
                $net_total = number_format($net_total, 2);
                $vat = number_format($vat, 2);
                $sub_total = number_format($sub_total, 2);
            @endphp

            <table>
                <tbody>
                    <tr>
                        <td>
                            <div>
                                <span> รหัสลูกค้า : </span>
                                <span> {{ $quotation->customer->id }} </span>
                            </div>
                            <div>
                                <span> ชื่อลูกค้า : </span>
                                <span> {{ $quotation->customer->name }} </span>
                            </div>
                            <div>
                                <span> ที่อยู่ : </span>
                                <span> {{ $quotation->customer->address }} </span>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span>วันที่ : </span>
                                <span> {{ $quotation->created_at }} </span>
                            </div>
                            <div>
                                <span>ใบเสนอราคา : </span>
                                <span> {{ sprintf('Q%03d', $quotation->id) }} </span>
                            </div>
                            <div>
                                <span>พนักงานขาย : </span>
                                <span> {{ $quotation->user->name }} </span>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <br />
            <hr />
            <br />

            @php
                $quotationdetail = $quotation->quotationDetails()->get();
            @endphp

            <div>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            {{-- <th>Quotation Id</th> --}}
                            <th>Product Id</th>
                            <th>Amount</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotationdetail as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $item->quotation_id }}</td> --}}
                                {{-- <td>{{ $item->product_id }}</td> --}}
                                <td>{{ $item->product->title }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->total }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br />
            <hr />
            <br />

            <div>
                <div style="width:50%; float:left;">
                    <div>Remark : </div>
                    <div>{{ $quotation->remark }} </div>
                </div>
                <table style="width:50%; float:right;">
                    <tbody>

                        <tr>
                            <th> Vat Percent </th>
                            <td> {{ $quotation->vat_percent }}% </td>
                        </tr>
                        <tr>
                            <th> Vat </th>
                            {{-- <td> {{ $quotation->vat }} </td> --}}
                            <td> {{ $vat }} </td>
                        </tr>
                        <tr>
                            <th> Sub Total </th>
                            {{-- <td> {{ $quotation->sub_total }} </td> --}}
                            <td> {{ $sub_total }} </td>
                        </tr>
                        <tr>
                            <th> Net Total </th>
                            {{-- <td> {{ $quotation->net_total }} </td> --}}
                            <td> {{ $net_total }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-themepdf>
