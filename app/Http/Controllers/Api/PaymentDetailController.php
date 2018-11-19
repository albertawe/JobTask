<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\PaymentDetail;
use DB;

class PaymentDetailController extends Controller
{

    public function getPaymentDetail($id){
        $payment_detail = PaymentDetail::where('payment_id', $id)->get();
        return $payment_detail;
    }

    public function addPaymentDetail(Request $request){
        $credentials = $request->only('payment_id', 'paid_status');

        $rules = [
            'payment_id' => 'requried|max:9',
            'paid_status' => 'required|max:255'
        ];
        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $raw_id = PaymentDetail::orderBy('payment_id', 'desc')->first()->payment_id;
        $payment_id_new_id = intval(substr($raw_id, -7)) + 1;
        $payment_id = sprintf('P-%07d', $payment_id_new_id);

        $payment_detail = new PaymentDetail;

        $payment_detail->payment_id = $payment_id;
        $payment_detail->paid_status = $request->paid_status;

        $payment_detail->save();

        return response()->json(['success'=> true, 'message'=> 'Payment detail successfully added.']);
    }

    public function updatePaymentDetail(Request $request, $id){
        $credentials = $request->only('paid_status');

        $rules = [
            'paid_status' => 'required|max:255'
        ];
        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

//        $payment_detail = PaymentDetail::where('payment_id', $id)->first();
//
//        $payment_detail->paid_status = $request->paid_status;
//
//        $payment_detail->save();

        DB::table('job_payment_detail')->where('payment_id', $id)->update(['paid_status' => $request->paid_status]);

        return response()->json(['success'=> true, 'message'=> 'Payment detail successfully updated.']);
    }

    public function deletePaymentDetail($id){
        $payment_detail = PaymentDetail::find($id);

        $payment_detail->delete();

        return response()->json(['success'=> true, 'message'=> 'Payment detail deleted successfully.']);
    }
}
