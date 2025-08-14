<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\HistoryChargeCard;
use App\UserClient;
use Auth;
use App\Common\common;

class ChargeCardController extends Controller
{
    private $SECRET_KEY = 'j9j9j9d3dj39!';
    private $CHARGE_CARD = '060715';

    private $REQUEST_ID = 000011;
    private $SECRET = 'dc6dm9ys0i9g408hynju';
    private $KEY = '09cbbdcf7b6b76063a0b1828570f0eec5831ea21630a165fda8cebfe8ec1a8a0';

    private $PARTNER_ID = '34764610834';
    private $PARTNER_KEY = 'a25d89ce88fd544b53e13c64113d52e1';

    public function getViewIndex() {
        if (Auth::guard('users_client')->check()) {
            $currentUser = Auth::guard('users_client')->user();
            $data['historyCharge'] = HistoryChargeCard::where('uid',$currentUser->uid)->orderBy('id', 'DESC')->get();
            return view('frontend_v2/utils/pages/card-recharge', $data);
        }
        return view('frontend_v2/utils/pages/card-recharge');
    }

    public function genRandomNumber($length = 20) {
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }
        return $result;
    }
    public function updateStatusCharging(Request $request) {
        $currentUser = Auth::guard('users_client')->user();
        $data['historyCharge'] = HistoryChargeCard::where('uid',$currentUser->uid)->orderBy('id', 'DESC')->get();
        return view('frontend_v2/utils/pages/response/update-card-recharge', $data);
    }
    public function postCardMemberTest(Request $req){
        if (Auth::guard('users_client')->guest()) {
            return  response()->json([
                    'error' => true,
                    'isLoggedIn' => false,
                    'msg' => 'Bạn chưa đăng nhập vào hệ thống'
                ]);
        }
        if ($req->has('type')) {
            $type = $req->get('type');
            $amount = $req->get('amount');
            $seri = $req->get('seri');
            $code = $req->get('code');
            $userSession = Auth::guard('users_client')->user();
            $request_id = $this->REQUEST_ID;
            if (HistoryChargeCard::where('seri_card', $seri)->exists()){
                return response()->json([
                    'error' => true,
                    'isLoggedIn' => true,
                    'msg' => 'Thẻ đã tồn tại trong hệ thống, Vui lòng chờ duyệt thẻ'
                ]);
            }


            $historyCard = new HistoryChargeCard();
            $historyCard->uid = $userSession->uid;
            $historyCard->type_card = $type;
            $historyCard->amount_card = $amount;
            $historyCard->seri_card = $seri;
            $historyCard->code_card = $code;
            $historyCard->status = 0;
            $historyCard->order_by = $request_id;
            $historyCard->save();
            $response = $this->apiToCardTest($type, $amount, $seri, $code);
                   /*
              +"rcode": 200
              +"rdata": {#327
                +"partner_id": "5629779851"
                +"telco": "VINAPHONE"
                +"serial": "23123212322123"
                +"code": "23123212322123"
                +"command": "charging"
                +"request_id": "2"
                +"amount": "10000"
                +"sign": "8f632b0a5f724b5e4305c8e61130e725"
              }
              +"rstatus": 99
              +"rmsg": "pending"
              Response
              */
            if ($response->rcode != 200 || $response->rstatus == 2) {
                $fine = HistoryChargeCard::find($historyCard->id);
                $fine->status = 2;
                $fine->save();
                return response()->json([
                    'isLoggedIn' => true,
                    'error' => true,
                    'status' => 'faild',
                    'msg' => 'Nạp thẻ Thất bại',
                    'type' => $type,
                    'amount' => $amount,
                    'seri' => $seri,
                    'code' => $code,
                ]);
            }
            if ($response->rstatus == 99) {
                // Da gui len Server Nap the vui long cho`
                $find = HistoryChargeCard::find($historyCard->id);
                $find->status = 99;
                $find->save();
                return response()->json([
                    'isLoggedIn' => true,
                    'error' => false,
                    'status' => 'success',
                    'msg' => 'Thẻ đã gửi lên Hệ thống thành công, Vui lòng chờ duyệt thẻ',
                    'type' => $type,
                    'amount' => $amount,
                    'seri' => $seri,
                    'code' => $code,
                ]);
            }

            if ($response->rstatus == 1) {
                //success
                $moneyNew = $userSession->money + $amount;
                //update money
                UserClient::where('uid', $userSession->uid)->update(array('money' => $moneyNew));

                $fine = HistoryChargeCard::find($historyCard->id);
                $fine->status = 1;
                $fine->save();

                return response()->json([
                    'isLoggedIn' => true,
                    'error' => false,
                    'status' => 'success',
                    'msg' => 'Nạp thẻ thành công',
                    'type' => $type,
                    'amount' => $amount,
                    'seri' => $seri,
                    'code' => $code,
                ]);
            }
        }
    }
    private function apiToCardTest($type, $amount, $seri, $code) {
        $params = array();
        $params['charge_card'] = $this->CHARGE_CARD;
        $params['authentication'] = md5($this->SECRET_KEY);
        $params['type'] = $type;
        $params['amount'] = $amount;
        $params['seri'] = $seri;
        $params['pin'] = $code;
        $params['order_id'] = $this->REQUEST_ID;
        $params['secret_id'] = $this->SECRET;
        $params['key_id'] = $this->KEY;
        $response = $this->curlPost('https://devthangtv.cf/api/charge-card/send-card', $params);

        return json_decode($response, false);

    }

    public function postCardMember(Request $req){
        if (Auth::guard('users_client')->guest()) {
            return  response()->json([
                    'error' => true,
                    'isLoggedIn' => false,
                    'msg' => 'Bạn chưa đăng nhập vào hệ thống'
                ]);
        }
        
        if ($req->ajax()) {
            $type = $req->get('type');
            $amount = $req->get('amount');
            $seri = $req->get('seri');
            $code = $req->get('code');
            $userSession = Auth::guard('users_client')->user();
            $request_id = $this->REQUEST_ID;
            if (HistoryChargeCard::where('seri_card', $seri)->exists()){
                return response()->json([
                    'error' => true,
                    'isLoggedIn' => true,
                    'msg' => 'Thẻ đã tồn tại trong hệ thống, Vui lòng chờ duyệt thẻ'
                ]);
            }

            $historyCard = new HistoryChargeCard();
            $historyCard->uid = $userSession->uid;
            $historyCard->type_card = $type;
            $historyCard->amount_card = $amount;
            $historyCard->seri_card = $seri;
            $historyCard->code_card = $code;
            $historyCard->status = 0;
            $historyCard->order_by = $request_id;
            $historyCard->save();
            $response = $this->apiToCardTheSieuRe($type, $amount, $seri, $code);
            if ($response->status == 99) {
                // Da gui len Server Nap the vui long cho`
                $find = HistoryChargeCard::find($historyCard->id);
                $find->status = 99;
                $find->save();
                return response()->json([
                    'isLoggedIn' => true,
                    'error' => false,
                    'status' => 'success',
                    'msg' => 'Thẻ đã gửi lên Hệ thống thành công, Vui lòng chờ duyệt thẻ',
                    'type' => $type,
                    'amount' => $amount,
                    'seri' => $seri,
                    'code' => $code,
                ]);
            }

            if ($response->status == 1) {
                //success
                $moneyNew = $userSession->money + $amount;
                //update money
                UserClient::where('uid', $userSession->uid)->update(array('money' => $moneyNew));

                $fine = HistoryChargeCard::find($historyCard->id);
                $fine->status = 1;
                $fine->save();

                return response()->json([
                    'isLoggedIn' => true,
                    'error' => false,
                    'status' => 'success',
                    'msg' => 'Nạp thẻ thành công',
                    'type' => $type,
                    'amount' => $amount,
                    'seri' => $seri,
                    'code' => $code,
                ]);
            } else if ($response->status == 2 || $response->status == 3) {
                $fine = HistoryChargeCard::find($historyCard->id);
                $fine->status = 2;
                $fine->save();

                return response()->json([
                    'isLoggedIn' => true,
                    'error' => true,
                    'status' => 'faild',
                    'msg' => 'Nạp thẻ Thất bại',
                    'type' => $type,
                    'amount' => $amount,
                    'seri' => $seri,
                    'code' => $code,
                ]);
            } else {

            }
        }
    }

    public function postCardMemberold(Request $req){
        if (Auth::guard('users_client')->guest()) {
            return  response()->json([
                    'error' => true,
                    'isLoggedIn' => false,
                    'msg' => 'Bạn chưa đăng nhập vào hệ thống'
                ]);
        }
        if ($req->ajax()) {
            $type = $req->get('type');
            $amount = $req->get('amount');
            $seri = $req->get('seri');
            $code = $req->get('code');
            $userSession = Auth::guard('users_client')->user();
            $request_id = $this->REQUEST_ID;
            if (HistoryChargeCard::where('seri_card', $seri)->exists()){
                return response()->json([
                    'error' => true,
                    'isLoggedIn' => true,
                    'msg' => 'Thẻ đã tồn tại trong hệ thống, Vui lòng chờ duyệt thẻ'
                ]);
            }

            $historyCard = new HistoryChargeCard();
            $historyCard->uid = $userSession->uid;
            $historyCard->type_card = $type;
            $historyCard->amount_card = $amount;
            $historyCard->seri_card = $seri;
            $historyCard->code_card = $code;
            $historyCard->status = 0;
            $historyCard->order_by = $request_id;
            $historyCard->save();
            $response = $this->apiToCard($type, $amount, $seri, $code);
            if ($response->rcode == 99 && $response->status == 99) {
                // Da gui len Server Nap the vui long cho`
                $find = HistoryChargeCard::find($historyCard->id);
                $find->status = 99;
                $find->save();
                return response()->json([
                    'isLoggedIn' => true,
                    'error' => false,
                    'status' => 'success',
                    'msg' => 'Thẻ đã gửi lên Hệ thống thành công, Vui lòng chờ duyệt thẻ',
                    'type' => $type,
                    'amount' => $amount,
                    'seri' => $seri,
                    'code' => $code,
                ]);
            }

            if ($response->rcode == 200 && $response->status == 1) {
                //success
                $moneyNew = $userSession->money + $amount;
                //update money
                UserClient::where('uid', $userSession->uid)->update(array('money' => $moneyNew));

                $fine = HistoryChargeCard::find($historyCard->id);
                $fine->status = 1;
                $fine->save();

                return response()->json([
                    'isLoggedIn' => true,
                    'error' => false,
                    'status' => 'success',
                    'msg' => 'Nạp thẻ thành công',
                    'type' => $type,
                    'amount' => $amount,
                    'seri' => $seri,
                    'code' => $code,
                ]);
            } else if ($response->rcode != 99 && $response->rcode != 200 && $response->status == 2){
                $fine = HistoryChargeCard::find($historyCard->id);
                $fine->status = 2;
                $fine->save();

                return response()->json([
                    'isLoggedIn' => true,
                    'error' => true,
                    'status' => 'faild',
                    'msg' => 'Nạp thẻ Thất bại',
                    'type' => $type,
                    'amount' => $amount,
                    'seri' => $seri,
                    'code' => $code,
                ]);
            }
        }
    }

    private function apiToCard($type, $amount, $seri, $code) {
        $params = array();
        $params['charge_card'] = $this->CHARGE_CARD;
        $params['authentication'] = md5($this->SECRET_KEY);
        $params['type_card'] = $type;
        $params['amount'] = $amount;
        $params['seri'] = $seri;
        $params['pin'] = $code;
        $response = $this->curlPost('https://shopacclmht69.com/core/api/open-api-shop.php', $params);

        return json_decode($response, false);
    }

    private function apiToCardTheSieuRe($type, $amount, $seri, $code) {
        $params = array();

        $params['telco'] = $type;
        $params['code'] = $code;
        $params['serial'] = $seri;
        $params['amount'] = $amount;
        $params['request_id'] = $this->genRandomNumber(20);
        $params['sign'] = md5($this->PARTNER_KEY.$code.$seri);

        $params['command'] = 'charging';


        $response = $this->curlPost('https://thesieure.com/chargingws/v2', $params);

        return json_decode($response, false);
    }
    private function curlPost($url, $dataPost) { //Hàm cURL POST dữ liệu.
		if(!is_array($dataPost))
			return false;

		$dataPost = http_build_query($dataPost);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPost);
		$ref = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; //Nếu kết quả cURL bị lỗi xác thực tên miền, thử thay thế $ref = tên miền của bạn. Ví dụ: $ref = 'https://trumthe247.com';
		curl_setopt($ch, CURLOPT_REFERER, $ref);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		$result = curl_exec($ch);

		if(curl_error($ch))
			$error_msg = curl_error($ch);

		curl_close($ch);

		if(isset($error_msg))
			return $error_msg;

		return $result;
	}
}
