<?php

use Carbon\Carbon;
use App\Models\Setting;

if (! function_exists('appName')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function appName()
    {
        return config('app.name', 'Laravel Boilerplate');
    }
}

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance from a time.
     *
     * @param $time
     * @return Carbon
     *
     * @throws Exception
     */
    function carbon($time)
    {
        return new Carbon($time);
    }
}

if (! function_exists('homeRoute')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function homeRoute()
    {
        if (auth()->check()) {
            if (auth()->user()->isAdmin()) {
                return 'admin.dashboard';
            }

            if (auth()->user()->isUser()) {
                return 'frontend.user.dashboard';
            }
        }

        return 'frontend.index';
    }
}

if (! function_exists('getPolicyInfo')) {
    function getPolicyInfo($policyType, $key) {
        $setting = Setting::where('key', $policyType)->first();
        // $array = ['title' => '7 ngay doi tra',
        // 'desc' => 'Cham soc khach hang cuc tot',
        // 'content' => 'Conten for doi tra',
                
        //         ];
        //Setting::find(2)->update(['values' => json_encode($array)]);
        //dd(json_decode($setting->values, true));
        return json_decode($setting->values, true)[$key] ?? null;
    }
}
