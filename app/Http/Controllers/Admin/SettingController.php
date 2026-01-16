<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name_en' => 'nullable|string|max:255',
            'site_name_ar' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'favicon' => 'nullable|image|max:512',
            'primary_color' => 'nullable|string|max:7',
            'secondary_color' => 'nullable|string|max:7',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address_en' => 'nullable|string',
            'address_ar' => 'nullable|string',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'cta_text_en' => 'nullable|string|max:255',
            'cta_text_ar' => 'nullable|string|max:255',
            'cta_link' => 'nullable|url|max:255',
            'google_map_url' => 'nullable|url|max:500',
        ]);

        foreach ($validated as $key => $value) {
            if ($key === 'logo' && $request->hasFile('logo')) {
                $oldLogo = Setting::get('logo');
                if ($oldLogo) {
                    Storage::disk('public')->delete($oldLogo);
                }
                $value = $request->file('logo')->store('settings', 'public');
                Setting::set($key, $value, 'image');
            } elseif ($key === 'favicon' && $request->hasFile('favicon')) {
                $oldFavicon = Setting::get('favicon');
                if ($oldFavicon) {
                    Storage::disk('public')->delete($oldFavicon);
                }
                $value = $request->file('favicon')->store('settings', 'public');
                Setting::set($key, $value, 'image');
            } elseif ($value !== null) {
                Setting::set($key, $value);
            }
        }

        return redirect()->route('admin.settings.index')
            ->with('success', __('Settings updated successfully.'));
    }
}
