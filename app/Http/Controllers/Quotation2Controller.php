<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\User;

// use App\CustomerModel;
// use App\DeliveryTypeModel;
// use App\DepartmentModel;
// use App\TaxTypeModel;
// use App\SalesStatusModel;
// use App\UserModel;
// use App\ZoneModel;
// use App\ProductModel;
// use App\Functions;
// use App\Models\Company;
// use PDF;

class Quotation2Controller extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $quotations = Quotation::get();
    return view('quotation/index', compact('quotations'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $customers = Customer::get();
    $products = Product::get();
    $users = User::get();

    return view('quotation/create', compact('customers', 'products','users'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    // //INSERT QUOTATION
    // $input = [
    //   'quotation_code' => $this->getNewCode(),
    //   'customer_id' => $request->input('customer_id'),
    //   'contact_name' => $request->input('contact_name'),
    //   'debt_duration' => $request->input('debt_duration'),
    //   'billing_duration' => $request->input('billing_duration'),
    //   'payment_condition' => $request->input('payment_condition', ""),
    //   'reason' => $request->input('reason'),
    //   'delivery_type_id' => $request->input('delivery_type_id'),
    //   'tax_type_id' => $request->input('tax_type_id'),
    //   'delivery_time' => $request->input('delivery_time'),
    //   'department_id' => $request->input('department_id'),
    //   'sales_status_id' => $request->input('sales_status_id'),
    //   'user_id' => $request->input('user_id'),
    //   'staff_id' => $request->input('staff_id'),
    //   'zone_id' => $request->input('zone_id'),
    //   'remark' => $request->input('remark'),
    //   'vat_percent' => $request->input('vat_percent', 7),
    //   'vat' => $request->input('vat', 0),
    //   'total_before_vat' => $request->input('total_before_vat', 0),
    //   'total' => $request->input('total_after_vat', 0),
    // ];
    // //VOID IF HAS CODE (Revision)
    // if (!empty($request->input('quotation_code'))) {
    //   switch ($request->input('quotation_code')) {
    //     case "M-QTDRAFT":
    //       $id =   $request->input('quotation_id');
    //       QuotationModel::destroy($id);
    //       QuotationDetailModel::where('quotation_id', $id)->delete();
    //       break;
    //     default:
    //       $q = QuotationModel::where('quotation_code', $request->input('quotation_code'))
    //         ->orderBy('datetime', 'desc')->first();
    //       $input['revision'] = $q->revision + 1;
    //       $q->sales_status_id = -1; //-1 means void
    //       $q->save();

    //       $segments = explode("-", $request->input('quotation_code'));
    //       $input['quotation_code'] = $segments[0] . "-" . $segments[1] . "-R" . $input['revision'];
    //   }
    // }

    // //DRAFT
    // if ($input['sales_status_id'] == 0) {
    //   //0 means DRART -> do not set quotation_code / date
    //   $input['quotation_code'] = "M-QTDRAFT";
    //   $input['datetime'] = "";
    // }
    // $id = QuotationModel::insert($input);

    // //INSERT ALL NEW QUOTATION DETAIL
    // $list = [];
    // //print_r($request->input('product_id_edit'));
    // //print_r($request->input('amount_edit'));
    // //print_r($request->input('discount_price_edit'));
    // //echo $id;
    // if (is_array($request->input('product_id_edit'))) {
    //   for ($i = 0; $i < count($request->input('product_id_edit')); $i++) {
    //     $list[] = [
    //       "product_id" => $request->input('product_id_edit')[$i],
    //       "amount" => $request->input('amount_edit')[$i],
    //       "discount_price" => $request->input('discount_price_edit')[$i],
    //       "quotation_id" => $id,
    //       "delivery_duration" => $request->input('delivery_duration')[$i],
    //     ];
    //   }
    // }
    // QuotationDetailModel::insert($list);

    // return redirect("sales/quotation/{$id}")->with('flash_message', 'popup');
  }

  public function getNewCode()
  {
    // $number = QuotationModel::select_count_by_current_month();
    // $count =  $number + 1;
    // //$year = (date("Y") + 543) % 100;
    // $year = date("y");
    // $month = date("m");
    // $number = sprintf('%05d', $count);
    // $quotation_code = "M-QT{$year}{$month}-{$number}";

    // return $quotation_code;
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    // QuotationModel::findOrFail($id);
    // $data = [
    //   //QUOTATION
    //   'quotation' => QuotationModel::findOrFail($id),
    //   'table_quotation' => QuotationModel::select_by_id($id),
    //   'table_customer' => CustomerModel::select_all(),
    //   'table_delivery_type' => DeliveryTypeModel::select_all(),
    //   'table_department' => DepartmentModel::select_all(),
    //   'table_tax_type' => TaxTypeModel::select_all(),
    //   'table_sales_status' => SalesStatusModel::select_by_category('quotation'),
    //   //'table_sales_user' => UserModel::select_by_role('sales'),
    //   'table_sales_user' => UserModel::select_all(),
    //   'table_zone' => ZoneModel::select_all(),
    //   'quotation_id' => $id,
    //   //QUOTATION Detail
    //   'table_quotation_detail' => QuotationDetailModel::select_by_quotation_id($id),
    //   'table_product' => ProductModel::select_all(),
    //   'customer' =>  CustomerModel::where('customer_id', QuotationModel::findOrFail($id)->customer_id)->first(),
    //   'customer_json' =>  CustomerModel::where('customer_id', QuotationModel::findOrFail($id)->customer_id)->first(),

    //   'mode' => 'show'
    // ];
    // return view('sales/quotation/edit', $data);
  }

  public function pdf($id)
  {
    // QuotationModel::findOrFail($id);

    // $data = [
    //   //QUOTATION
    //   'table_quotation' => QuotationModel::select_by_id($id),
    //   'table_company' => Company::select_all(),
    //   //QUOTATION Detail
    //   'table_quotation_detail' => QuotationDetailModel::select_by_quotation_id($id),
    //   'total_text' => count(QuotationModel::select_by_id($id)) > 0 ?  Functions::baht_text(QuotationModel::select_by_id($id)[0]->total) : "-",
    // ];

    // $pdf = PDF::loadView('sales/quotation/show', $data);

    // return $pdf->stream('test.pdf'); //แบบนี้จะ stream มา preview
    // //return $pdf->download('test.pdf'); //แบบนี้จะดาวโหลดเลย
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    // QuotationModel::findOrFail($id);
    // $data = [
    //   //QUOTATION
    //   'quotation' => QuotationModel::findOrFail($id),
    //   'table_quotation' => QuotationModel::select_by_id($id),
    //   'table_customer' => CustomerModel::select_all(),
    //   'table_delivery_type' => DeliveryTypeModel::select_all(),
    //   'table_department' => DepartmentModel::select_all(),
    //   'table_tax_type' => TaxTypeModel::select_all(),
    //   'table_sales_status' => SalesStatusModel::select_by_category('quotation'),
    //   //'table_sales_user' => UserModel::select_by_role('sales'),
    //   'table_sales_user' => UserModel::select_all(),
    //   'table_zone' => ZoneModel::select_all(),
    //   'quotation_id' => $id,
    //   //QUOTATION Detail
    //   'table_quotation_detail' => QuotationDetailModel::select_by_quotation_id($id),
    //   'table_product' => ProductModel::select_all(),
    //   'mode' => 'edit',
    // ];
    // return view('sales/quotation/edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    // //1.INSERT QUOTATION
    // $input = [
    //   //'quotation_code' => $quotation_code,
    //   'customer_id' => $request->input('customer_id'),
    //   'contact_name' => $request->input('contact_name'),
    //   'debt_duration' => $request->input('debt_duration'),
    //   'billing_duration' => $request->input('billing_duration'),
    //   'reason' => $request->input('reason'),
    //   'payment_condition' => $request->input('payment_condition', ""),
    //   'delivery_type_id' => $request->input('delivery_type_id'),
    //   'tax_type_id' => $request->input('tax_type_id'),
    //   'delivery_time' => $request->input('delivery_time'),
    //   'department_id' => $request->input('department_id'),
    //   'sales_status_id' => $request->input('sales_status_id'),
    //   'user_id' => $request->input('user_id'),
    //   'zone_id' => $request->input('zone_id'),
    //   'remark' => $request->input('remark'),
    //   'vat_percent' => $request->input('vat_percent', 7),
    //   'vat' => $request->input('vat', 0),
    //   'total_before_vat' => $request->input('total_before_vat', 0),
    //   'total' => $request->input('total_after_vat', 0),
    // ];
    // QuotationModel::update_by_id($input, $id);

    // //2.INSERT UPDATE DELETE QUOTATION DETAIL
    // if (is_array($request->input('product_id_edit'))) {
    //   for ($i = 0; $i < count($request->input('product_id_edit')); $i++) {
    //     $id_edit = $request->input('id_edit')[$i];
    //     $a = [
    //       "product_id" => $request->input('product_id_edit')[$i],
    //       "amount" => $request->input('amount_edit')[$i],
    //       "discount_price" => $request->input('discount_price_edit')[$i],
    //       "quotation_id" => $id,
    //       "delivery_duration" => $request->input('delivery_duration')[$i],
    //     ];
    //     switch ($id_edit) {
    //       case "+":
    //         QuotationDetailModel::insert($a);
    //         echo "+";
    //         break;
    //       default:
    //         if ($id_edit < 0) {
    //           QuotationDetailModel::delete_by_id(abs($id_edit));
    //           echo "-";
    //         } else {
    //           QuotationDetailModel::update_by_id($a, $id_edit);
    //           echo "0";
    //         }
    //     }
    //   }
    // }

    // //3.REDIRECT
    // return redirect("sales/quotation/{$id}");
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    // QuotationModel::delete_by_id($id);
    // return redirect("sales/quotation");
  }
}
