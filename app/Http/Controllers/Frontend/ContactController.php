<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simple spam protection - check for common spam keywords
        $spamKeywords = ['http://', 'https://', 'www.', 'buy now', 'click here'];
        $message = strtolower($request->message);
        
        foreach ($spamKeywords as $keyword) {
            if (str_contains($message, $keyword)) {
                return redirect()->back()
                    ->with('error', __('Your message contains spam content. Please try again.'));
            }
        }

        Contact::create($request->all());

        return redirect()->back()
            ->with('success', __('Thank you for your message. We will get back to you soon.'));
    }
}
