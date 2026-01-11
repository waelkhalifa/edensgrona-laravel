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
use App\Settings\ContactSettings;
use App\Settings\GeneralSettings;
use App\Settings\HeroSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    public function contact(ContactSettings $contactSettings, GeneralSettings $generalSettings)
    {

        return view('contact', compact('contactSettings', 'generalSettings'));
    }

    public function submitContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'customer_type' => 'required|in:private,company',
            'help_needed' => 'required|string',
            'measurements' => 'nullable|string',
            'message' => 'nullable|string',
            'attachments' => 'nullable|array',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
        ], [
            'first_name.required' => 'Förnamn är obligatoriskt',
            'last_name.required' => 'Efternamn är obligatoriskt',
            'email.required' => 'E-post är obligatoriskt',
            'email.email' => 'Ogiltig e-postadress',
            'phone.required' => 'Telefonnummer är obligatoriskt',
            'address.required' => 'Adress är obligatoriskt',
            'city.required' => 'Stad/tätort är obligatoriskt',
            'postal_code.required' => 'Postnummer är obligatoriskt',
            'customer_type.required' => 'Vänligen välj kundtyp',
            'help_needed.required' => 'Vänligen berätta vad du behöver hjälp med',
            'attachments.*.mimes' => 'Endast JPG, PNG och PDF filer är tillåtna',
            'attachments.*.max' => 'Filen får inte vara större än 10MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

//        try {
            $submission = ContactSubmission::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'customer_type' => $request->customer_type,
                'help_needed' => $request->help_needed,
                'measurements' => $request->measurements,
                'message' => $request->message,
                'status' => 'new',
            ]);

            // Handle file attachments
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    try {
                        $submission->addMedia($file)
                                   ->preservingOriginal()
                                   ->toMediaCollection('attachments');

                        Log::info('File uploaded successfully', [
                            'submission_id' => $submission->id,
                            'file_name' => $file->getClientOriginalName(),
                        ]);
                    } catch (\Exception $e) {
                        Log::error('Failed to upload attachment', [
                            'error' => $e->getMessage(),
                            'file' => $file->getClientOriginalName(),
                        ]);
                    }
                }
            }

            return redirect()->back()->with('success', 'Tack för ditt meddelande! Vi hör av oss inom kort.');

        } /*catch (\Exception $e) {
            Log::error('Failed to save contact submission', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()
                             ->with('error', 'Ett fel uppstod. Vänligen försök igen.')
                             ->withInput();
        }*/
//    }
}
