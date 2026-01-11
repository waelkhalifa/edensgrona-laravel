<?php

namespace App\Http\Controllers;

use App\Models\AboutContent;
use App\Models\ContactInfo;
use App\Models\ContactSubmission;
use App\Models\HeroSection;
use App\Models\ProcessStep;
use App\Models\Service;
use App\Models\Setting;
use App\Settings\AboutSettings;
use App\Settings\HeroSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(HeroSettings $heroSettings)
    {
        $services = Service::where('is_active', true)
                           ->orderBy('order')
                           ->get();


        $steps = ProcessStep::where('is_active', true)->orderBy('step_number')->get();

        return view('home', [
            'services' => $services,
            'steps' => $steps,
            'heroSettings' => $heroSettings,
        ]);
    }

    public function about(AboutSettings $aboutSettings)
    {
        return view('about', [
            'aboutSettings' => $aboutSettings,
        ]);
    }

    public function contact()
    {
        $contactInfo = ContactInfo::first();
        $socialLinks = SocialLink::where('is_active', true)->orderBy('order')->get();
        $reviewsUrl = Setting::get('google_reviews_url', '#');

        return view('contact', compact('contactInfo', 'socialLinks', 'reviewsUrl'));
    }

    public function submitContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        ContactSubmission::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'status' => 'new',
        ]);

        return redirect()->back()->with('success', 'Tack för ditt meddelande! Vi hör av oss inom kort.');
    }
}
