<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSettingRequest;
use App\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->latest()->paginate();
        return view('admin.setting.index',compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(AddSettingRequest $request)
    {
        $dataInsert = [
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
        ];

        $this->setting->create($dataInsert);
        return redirect()->route('settings.index');
    }
}
