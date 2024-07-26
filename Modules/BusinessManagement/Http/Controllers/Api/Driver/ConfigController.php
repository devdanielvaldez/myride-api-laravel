<?php

namespace Modules\BusinessManagement\Http\Controllers\Api\Driver;

use DateTimeZone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\BusinessManagement\Repositories\BusinessSettingRepository;
use Modules\TripManagement\Interfaces\TripRequestInterfaces;

class ConfigController extends \App\Http\Controllers\Controller
{
    public function __construct(
        private BusinessSettingRepository $setting,
        private TripRequestInterfaces $trip
    )
    {
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function configuration(): JsonResponse
    {
        $info = $this->setting->get(limit: 999, offset: 1);
        $loyaltyPoints = $info
            ->where('key_name', 'loyalty_points')
            ->firstWhere('settings_type', 'driver_settings')?->value;

        return response()->json([
            'is_demo' => (bool)env('APP_MODE') != 'live'?  true : false,
            'maintenance_mode' => (bool) $info->firstWhere('key_name', 'maintenance_mode')?->value ?? false,
            'required_pin_to_start_trip' => (bool) $info->firstWhere('key_name', 'required_pin_to_start_trip')?->value ?? false,
            'add_intermediate_points' => (bool) $info->firstWhere('key_name', 'add_intermediate_points')?->value ?? false,
            'business_name' => $info->firstWhere('key_name', 'business_name')?->value ?? null,
            'logo' => $info->firstWhere('key_name', 'header_logo')?->value ?? null,
            'bid_on_fare' => (bool) $info->firstWhere('key_name', 'bid_on_fare')?->value ?? 0 ,
            'driver_completion_radius' => $info->firstWhere('key_name', 'driver_completion_radius')?->value ?? 10 ,
            'country_code' => $info->firstWhere('key_name', 'country_code')?->value ?? null,
            'business_address' => $info->firstWhere('key_name', 'business_address')->value ?? null,
            'business_contact_phone' => $info->firstWhere('key_name', 'business_contact_phone')?->value ?? null,
            'business_contact_email' => $info->firstWhere('key_name', 'business_contact_email')?->value ?? null,
            'business_support_phone' => $info->firstWhere('key_name', 'business_support_phone')?->value ?? null,
            'business_support_email' => $info->firstWhere('key_name', 'business_support_email')?->value ?? null,
            'conversion_status' =>  (bool) ($loyaltyPoints['status'] ?? false),
            'conversion_rate' => (double) ($loyaltyPoints['points'] ?? 0),
            'base_url' => url('/') . 'api/v1/',
            'websocket_url' => $info->firstWhere('key_name', 'websocket_url')?->value ?? null,
            'websocket_port' => (string) $info->firstWhere('key_name', 'websocket_port')?->value ?? 6001,
            'websocket_key' => env('PUSHER_APP_KEY'),
            'review_status' => (bool) $info->firstWhere('key_name', DRIVER_REVIEW)?->value ?? null,
            'level_status' => (bool) $info->firstWhere('key_name', DRIVER_LEVEL)?->value ?? null,
            'image_base_url' => [
                'profile_image_customer' => asset('storage/app/public/customer/profile'),
                'banner' => asset('storage/app/public/promotion/banner'),
                'vehicle_category' => asset('storage/app/public/vehicle/category'),
                'vehicle_model' => asset('storage/app/public/vehicle/model'),
                'vehicle_brand' => asset('storage/app/public/vehicle/brand'),
                'profile_image' => asset('storage/app/public/driver/profile'),
                'identity_image' => asset('storage/app/public/driver/identity'),
                'documents' => asset('storage/app/public/driver/document'),
                'pages' => asset('storage/app/public/business/pages'),
                'conversation' => asset('storage/app/public/conversation'),
                'parcel' => asset('storage/app/public/parcel/category'),
            ],
            'otp_resend_time' => (int) $info->firstWhere('key_name', 'otp_resend_time')?->value ?? 60,
            'currency_decimal_point' => $info->firstWhere('key_name', 'currency_decimal_point')?->value ?? null,
            'currency_code' => $info->firstWhere('key_name', 'currency_code')?->value ?? null,
            'currency_symbol' => $info->firstWhere('key_name', 'currency_symbol')->value ?? '$',
            'currency_symbol_position' => $info->firstWhere('key_name', 'currency_symbol_position')?->value ?? null,
            'about_us' => $info->firstWhere('key_name', 'about_us')?->value ?? null,
            'privacy_policy' => $info->firstWhere('key_name', 'privacy_policy')?->value ?? null,
            'terms_and_conditions' => $info->firstWhere('key_name', 'terms_and_conditions')?->value ?? null,
            'legal' => $info->firstWhere('key_name', 'legal')?->value,
            'verification' => (bool) $info->firstWhere('key_name', 'driver_verification')?->value ?? 0,
            'sms_verification' => (bool) $info->firstWhere('key_name', 'sms_verification')?->value ?? 0,
            'email_verification' => (bool) $info->firstWhere('key_name', 'email_verification')?->value ?? 0,
            'facebook_login' => (bool) $info->firstWhere('key_name', 'facebook_login')?->value['status'] ?? 0,
            'google_login' => (bool) $info->firstWhere('key_name', 'google_login')?->value['status'] ?? 0,
            'self_registration' => (bool) $info->firstWhere('key_name', 'driver_self_registration')?->value ?? 0,

        ]);


    }


    public function getRoutes(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trip_request_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(responseFormatter(constant: DEFAULT_400, errors: errorProcessor($validator)), 403);
        }
        $trip = $this->trip->getBy('id', $request->trip_request_id, ['relations' => 'coordinate', 'vehicleCategory']);
        if (!$trip) {

            return response()->json(responseFormatter(constant: TRIP_REQUEST_404, errors: errorProcessor($validator)), 403);
        }

        $pickupCoordinates = [
            auth()->user()->lastLocations->latitude,
            auth()->user()->lastLocations->longitude,
        ];

        $intermediateCoordinates = [];
        if ($trip->current_status == ONGOING) {
            $destinationCoordinates = [
                $trip->coordinate->destination_coordinates->latitude,
                $trip->coordinate->destination_coordinates->longitude,
            ];
            $intermediateCoordinates = $trip->coordinate->intermediate_coordinates ? json_decode($$trip->coordinate->intermediate_coordinates, true) : [] ;
        }
        else {
            $destinationCoordinates = [
                $trip->coordinate->pickup_coordinates->latitude,
                $trip->coordinate->pickup_coordinates->longitude,
            ];
        }

        $drivingMode = auth()->user()->vehicleCategory->category->type == 'motor_bike' ? 'TWO_WHEELER' : 'DRIVE';

        $getRoutes = getRoutes(
            originCoordinates:$pickupCoordinates,
            destinationCoordinates:$destinationCoordinates,
            intermediateCoordinates:$intermediateCoordinates,
        ); //["DRIVE", "TWO_WHEELER"]

        $result = [];
        foreach ($getRoutes as $route) {
            if ($route['drive_mode'] == $drivingMode) {
                if ($trip->current_status == 'completed' || $trip->current_status == 'cancelled') {
                    $result['is_dropped'] =  true;
                }
                else {
                    $result['is_dropped'] =  false;
                }
                if ($trip->current_status === PENDING || $trip->current_status === ACCEPTED) {
                    $result['is_picked'] =  false;
                }
                else {
                    $result['is_picked'] =  true;
                }
                return [array_merge($result, $route)];
            }
        }
    }

}
