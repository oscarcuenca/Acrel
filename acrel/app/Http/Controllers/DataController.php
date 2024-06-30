<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeterData;
use GuzzleHttp\Client;
use Carbon\Carbon;
use phpseclib3\Crypt\AES;
use Illuminate\Support\Facades\Log;

class DataController extends Controller
{
    public function uploadMeterRealTimeData(Request $request)
    {
        $validatedData = $request->validate([
            'TempC' => 'required|numeric',
            'TempB' => 'required|numeric',
            'TempA' => 'required|numeric',
            'PT' => 'required|integer',
            'DO2' => 'required|numeric',
            'DO1' => 'required|numeric',
            'source' => 'required|string',
            'UpInterval' => 'required|integer',
            'Pa' => 'required|numeric',
            'Pb' => 'required|numeric',
            'Pc' => 'required|numeric',
            'EQC' => 'required|numeric',
            'meter_id' => 'required|integer',
            'Lg' => 'required|numeric',
            'state' => 'required|string',
            'EQL' => 'required|numeric',
            'IN' => 'required|numeric',
            'EPID' => 'required|numeric',
            'EPIF' => 'required|numeric',
            'EPIG' => 'required|numeric',
            'PFa' => 'required|numeric',
            'EP' => 'required|numeric',
            'Ua' => 'required|numeric',
            'PFc' => 'required|numeric',
            'EPIJ' => 'required|numeric',
            'Ub' => 'required|numeric',
            'PFb' => 'required|numeric',
            'Uc' => 'required|numeric',
            'Qa' => 'required|numeric',
            'Qb' => 'required|numeric',
            'Qc' => 'required|numeric',
            'EPIP' => 'required|numeric',
            'meterSn' => 'required|string',
            'Uab' => 'required|numeric',
            'Ia' => 'required|numeric',
            'Ib' => 'required|numeric',
            'Ic' => 'required|numeric',
            'MEPIMD' => 'required|numeric',
            'timezone' => 'required|integer',
            'DI0' => 'required|numeric',
            'DI2' => 'required|numeric',
            'DI1' => 'required|numeric',
            'DI3' => 'required|numeric',
            'P' => 'required|numeric',
            'Q' => 'required|numeric',
            'S' => 'required|numeric',
            'Ubc' => 'required|numeric',
            'meterNo' => 'required|string',
            'timestamp' => 'required|integer',
            'CreateTime' => 'required|date_format:Y-m-d H:i:s',
            'msgid' => 'required|numeric',
            'MEPIMDT' => 'required|date_format:Y-m-d H:i',
            'Fr' => 'required|numeric',
            'Sa' => 'required|numeric',
            'Sb' => 'required|numeric',
            'Sc' => 'required|numeric',
            'CT' => 'required|integer',
            'Uca' => 'required|numeric',
            'PF' => 'required|numeric',
            'EPE' => 'required|numeric',
            'gatewaySn' => 'required|string',
            'EPI' => 'required|numeric'
        ]);

        MeterData::create($validatedData);

        return response()->json($validatedData, 201);
    }

    public function authenticateAndGetToken()
    {
        try {
            $client = new Client();
            $url = 'https://iot.acrel-eem.com/basic/prepayment//auth_user/login';

            $loginName = 'Tim';
            $password = '123456';
            $aesParams = $this->encryptAES(json_encode(['LoginName' => $loginName, 'PassWord' => $password]));

            $response = $client->post($url, [
                'form_params' => [
                    'params' => $aesParams,
                ],
            ]);

            $responseData = json_decode($response->getBody(), true);

            if ($responseData['success'] == "1") {
                return [
                    'success' => true,
                    'token' => $responseData['data']['token']
                ];
            } else {
                Log::error("Authentication failed: " . $responseData['errorMsg']);
                return [
                    'success' => false,
                    'message' => "Authentication failed: " . $responseData['errorMsg']
                ];
            }
        } catch (\Exception $e) {
            Log::error("Authentication request failed: " . $e->getMessage());
            return [
                'success' => false,
                'message' => "Authentication request failed: " . $e->getMessage()
            ];
        }
    }

    private function encryptAES($data)
    {
        $key = '1234567890123456';
        $iv = '1234567890123456';

        $aes = new AES('cbc');
        $aes->setKey($key);
        $aes->setIV($iv);

        // Añadir padding Zero manualmente
        $blockSize = 16;
        $pad = $blockSize - (strlen($data) % $blockSize);
        $data .= str_repeat("\0", $pad); // Zero padding

        $ciphertext = $aes->encrypt($data);
        return base64_encode($ciphertext);
    }

    public function sendControlCommand($token, $gatewaySn, $meterSn, $forceSwitch)
    {
        $client = new Client();
        $url = 'https://iot.acrel-eem.com/basic/currency/entry/home/control';

        $body = [
            'gatewaySn' => $gatewaySn,
            'meterSn' => $meterSn,
            'method' => 'FORCESWITCH',
            'value' => ['ForceSwitch' => $forceSwitch],
        ];

        $response = $client->post($url, [
            'headers' => [
                'token' => $token,
                'Content-Type' => 'application/json',
            ],
            'json' => $body,
        ]);

        return json_decode($response->getBody(), true);
    }

    public function receiveAndControl(Request $request)
    {
        $validatedData = $request->validate([
            'TempC' => 'required|numeric',
            'TempB' => 'required|numeric',
            'TempA' => 'required|numeric',
            'PT' => 'required|integer',
            'DO2' => 'required|numeric',
            'DO1' => 'required|numeric',
            'source' => 'required|string',
            'UpInterval' => 'required|integer',
            'Pa' => 'required|numeric',
            'Pb' => 'required|numeric',
            'Pc' => 'required|numeric',
            'EQC' => 'required|numeric',
            'meter_id' => 'required|integer',
            'Lg' => 'required|numeric',
            'state' => 'required|string',
            'EQL' => 'required|numeric',
            'IN' => 'required|numeric',
            'EPID' => 'required|numeric',
            'EPIF' => 'required|numeric',
            'EPIG' => 'required|numeric',
            'PFa' => 'required|numeric',
            'EP' => 'required|numeric',
            'Ua' => 'required|numeric',
            'PFc' => 'required|numeric',
            'EPIJ' => 'required|numeric',
            'Ub' => 'required|numeric',
            'PFb' => 'required|numeric',
            'Uc' => 'required|numeric',
            'Qa' => 'required|numeric',
            'Qb' => 'required|numeric',
            'Qc' => 'required|numeric',
            'EPIP' => 'required|numeric',
            'meterSn' => 'required|string',
            'Uab' => 'required|numeric',
            'Ia' => 'required|numeric',
            'Ib' => 'required|numeric',
            'Ic' => 'required|numeric',
            'MEPIMD' => 'required|numeric',
            'timezone' => 'required|integer',
            'DI0' => 'required|numeric',
            'DI2' => 'required|numeric',
            'DI1' => 'required|numeric',
            'DI3' => 'required|numeric',
            'P' => 'required|numeric',
            'Q' => 'required|numeric',
            'S' => 'required|numeric',
            'Ubc' => 'required|numeric',
            'meterNo' => 'required|string',
            'timestamp' => 'required|integer',
            'CreateTime' => 'required|date_format:Y-m-d H:i:s',
            'msgid' => 'required|numeric',
            'MEPIMDT' => 'required|date_format:Y-m-d H:i',
            'Fr' => 'required|numeric',
            'Sa' => 'required|numeric',
            'Sb' => 'required|numeric',
            'Sc' => 'required|numeric',
            'CT' => 'required|integer',
            'Uca' => 'required|numeric',
            'PF' => 'required|numeric',
            'EPE' => 'required|numeric',
            'gatewaySn' => 'required|string',
            'EPI' => 'required|numeric'
        ]);

        // Convertir el timestamp a un formato compatible con MySQL
        if (isset($validatedData['timestamp'])) {
            $validatedData['timestamp'] = Carbon::createFromTimestampMs($validatedData['timestamp'])->toDateTimeString();
        } else {
            Log::error("Validation error: Timestamp field is missing.");
            return response()->json([
                'success' => false,
                'message' => "Validation error: Timestamp field is missing."
            ], 400);
        }

        $authResult = $this->authenticateAndGetToken();

        if (!$authResult['success']) {
            return response()->json([
                'success' => false,
                'message' => $authResult['message'],
            ], 401);
        }

        $token = $authResult['token'];

        $gatewaySn = '11122233341'; // Cambia este valor según corresponda
        $meterSn = '1112223334441'; // Cambia este valor según corresponda
        $forceSwitch = 1; // 1 para encender, 0 para apagar
        $controlResponse = $this->sendControlCommand($token, $gatewaySn, $meterSn, $forceSwitch);

        // Almacenar los datos en la base de datos incluso si el control falla
        MeterData::create($validatedData);

        if ($controlResponse['success'] != "1") {
            Log::error("Control command failed: " . $controlResponse['errorMsg']);
            return response()->json([
                'success' => false,
                'message' => "Control command failed: " . $controlResponse['errorMsg'],
                'web_token' => $token
            ], 400);
        }

        return response()->json([
            'sensor_data' => $validatedData,
            'control_response' => $controlResponse,
            'web_token' => $token,
            'login_status' => "Authenticated successfully"
        ], 201);
    }
}
