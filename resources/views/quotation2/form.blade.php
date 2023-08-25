<div class="card">
  <div class="card-body">
    <div class="row mb-4">
      <div class="col-lg-12">
        <a href="{{ url('/sales/quotation') }}" title="Back" class="btn btn-warning btn-sm" >
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
        </a>
        @if(isset($quotation))
        <a class="px-2 btn btn-sm btn-primary" href="{{ route('quotation.pdf', $quotation->id) }}" target="_blank">              
          <i class="fas fa-print"></i> พิมพ์
        </a>
        <a class="px-2 btn btn-sm btn-primary" href="{{ route('quotation.edit', $quotation->id) }}">
          <i class="fas fa-edit"></i> แก้ไข
        </a>
        @endif
      </div>
    </div>
    
    <div class="form-group form-inline">
      <label class="col-lg-2">รหัสเอกสาร</label>
      <div class="col-lg-3">
        <input name="quotation_id"	id="quotation_id" class="form-control form-control-sm"	readonly> 
      </div>
      <label class="col-lg-2 offset-lg-1">วันที่เวลา</label>
      <div class="col-lg-3">
        <input name="created_at" id="created_at" class="form-control form-control-sm form-control-line"	readonly>
      </div>
    </div>

    <div class="form-group form-inline">
      <label class="col-lg-2">รหัสลูกหนี้</label>
      <div class="col-lg-4">
        <select class="form-control">
          @foreach ($customers as $c )
            <option value="{{$c->id}}">{{$c->name}}</option>
          @endforeach
        </select>        
      </div>

    </div>

    

    <div class="form-group form-inline">
      
      <label class="col-lg-2  offset-lg-1">พนักงานขาย</label>
      <div class="col-lg-3">
        <select name="user_id" id="user_id" class="form-control form-control-sm" required readonly>

          @foreach($users as $item)
          <option value="{{ $item->id }}" >
            {{	$item->name }}
          </option>
          @endforeach
        </select>
      </div>  

      
    </div>
  </div>
</div>


@include('quotation/detail')

<div class="card mt-3">
	<div class="card-block">
		<div class="row">
			<div class="col-lg-3">
				<div class="form-group">
					<div class="col-lg-12">
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group form-inline">
					<input type="hidden" name="total" id="total"	class="form-control form-control-sm form-control-line"  >
					<label class="col-lg-6">หมายเหตุ</label>
					<label class="col-lg-3">ยอดรวมก่อนภาษี</label>
					<div class="col-lg-3">
						<input type="number" name="total_before_vat" id="total_before_vat"	class="form-control form-control-sm form-control-line roundnum"  readonly>
					</div>
				</div>
				<div class="form-group form-inline">
					<label class="col-lg-6">
            <textarea name="remark" id="remark" class="form-control" style="width:100%"></textarea>
            
					</label>
					<label class="col-lg-3">
						ภาษีมูลค่าเพิ่ม
						<input type="number"
							name="vat_percent" id="vat_percent"
							onkeyup="onChange(this)"
							onChange="onChange(this)"
							class="form-control form-control-sm form-control-line roundnum"
							style="width: 50px; margin: 10px;"> %
					</label>
					<div class="col-lg-3">
						<input type="number" step="0.01" name="vat" id="vat" onkeyup="onChange(this)" onChange="onChange(this)" class="form-control form-control-sm form-control-line  roundnum" readonly >
					</div>
				</div>
				<div class="form-group form-inline">
	   				<label class="col-lg-6">
              <div>
                @if( isset($customer) )
                  @if(isset($customer->contacts))
                    @foreach ($customer->contacts as $contact)
                        @if(isset($contact->ref_qt))

                          ติดต่อ : {{ $contact->name}} / Email : {{ $contact->email}}
                        @endif
                    @endforeach
                    @if (session('flash_message'))
                    <script>
                      @if($quotation->quotation_code != "QTDRAFT")
                      alert(""
                        @foreach ($customer->contacts as $contact)
                            @if(isset($contact->ref_qt))
                              +"ติดต่อ : {{ $contact->name}} / Email : {{ $contact->email}}"
                            @endif
                        @endforeach
                      
                      );
                      @endif
                    </script>
                    @endif
                  @endif
                @endif
              </div>
					</label>
					<label class="col-lg-3">ยอดสุทธิ</label>
					<div class="col-lg-3">
						<input type="number"  name="total_after_vat" id="total_after_vat"	class="form-control form-control-sm form-control-line roundnum"  readonly >
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<script>
function refreshTotal(){
  var total = 0;
  document.querySelectorAll(".total_edit").forEach(function(element,index){
    total += parseFloat(element.value);
  }); //END foreach\
  //console.log("Total : " + total);
  document.getElementById("total").value = total;
}

function onChange(obj){
  //RECALCULATE TOTAL FIRST
  refreshTotal();
  //MAIN
	var vat = document.getElementById("vat");
	var vat_percent = document.getElementById("vat_percent");
	var total = document.getElementById("total");
	var total_before_vat = document.getElementById("total_before_vat");
	var total_after_vat = document.getElementById("total_after_vat");
	var tax_type_id = document.getElementById("tax_type_id");
	//console.log("print",vat,vat_percent,total_before_vat);

	//INPUT DETECTOR
	switch (obj.id) {
		case "vat_percent":
			//EFFECT TO #vat
			vat.value = total.value * (vat_percent.value) / 100;
			break;
		case "vat":
			//EFFECT TO #vat_percent
			vat_percent.value = vat.value / total.value * 100;
			break;
	}

	//DISPLAY ON TOTAL
	vat_percent.disabled = false;
	vat_percent.readonly = false;
	switch (tax_type_id.value) {
		case "1":
			//EFFECT TO #vat
			//console.log("CASE 1");
			total_before_vat.value = total.value -  vat.value*1;
			total_after_vat.value = total.value ;
			break;
		case "2":
			//EFFECT TO #vat_percent
			//console.log("CASE 2");
			total_before_vat.value = total.value;
			total_after_vat.value = total.value*1 + vat.value*1;
			break;
		default:
			vat_percent.disabled = true;
			vat_percent.readonly = true;
			vat_percent.value = 0;
			vat.value = 0;
			//console.log("CASE OTHERS");
			total_before_vat.value = total.value;
			total_after_vat.value = total.value;
			break;
	}

  total.value = parseFloat(total.value).toFixed(2);
  total_before_vat.value = parseFloat(total_before_vat.value).toFixed(2);
  total_after_vat.value = parseFloat(total_after_vat.value).toFixed(2);
  vat.value = parseFloat(vat.value).toFixed(2);
  //roundnum
  document.querySelectorAll(".roundnum").forEach(function(element) {
    //console.log(element);
    //element.value = parseFloat(element.value).toFixed(2)
  });



}

function onChangeCustomer(){

}



</script>
