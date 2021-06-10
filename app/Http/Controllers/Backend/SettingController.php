<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $setting = Setting::first();
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'copyright' => 'required',
        ]);

        $setting = Setting::first();

        if (isset($setting->site_logo)) {
            @unlink(public_path('storage/setting' . $setting->site_logo));
            $this->uploadPhoto($request, $setting);
        }else{
            $this->uploadPhoto($request, $setting);
        }

        $setting->update($request->all());

        Session::flash('success', 'Setting updated successfully');
        return redirect()->back();
    }

    // Image Function
    protected function uploadPhoto($request, $setting){

        $validation = $request->validate([
             'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image = $request->file('site_logo');
        $image_new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('storage/setting/', $image_new_name);
        $setting->site_logo = '/storage/setting/' . $image_new_name;
        $setting->save();
    }
    
}

