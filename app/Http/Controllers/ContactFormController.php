<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Rules\NoUrls;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;


class ContactFormController extends Controller
{
    public function sendContactForm(Request $request)
    {
        $user_ip = $request->ip();
        $recaptcha_response = $request->get('g-recaptcha-response');

        $validatedData = $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'country_region' => 'required',
            'number'  => 'required',
            'company' => 'required',
            'role'    => 'required',
            'message' => ['required', 'string', new NoUrls],
            'user_ip' => 'required|ip',
            'recaptcha_response'=>'required'
        ]);

        $secretkey = env('RECAPTCHAV3_SECRET', '6LeMDa0pAAAAAESeA4jv7W45DgMhTAt6Ggk1QRxV');
        $baseUrl = 'https://www.google.com/recaptcha/api/siteverify';
        $secretKey = $secretkey;
        $responseToken = $request->input('recaptcha_response');

        $url = $baseUrl . '?secret=' . urlencode($secretKey) . '&response=' . urlencode($responseToken);

        $response = Http::post($url);
        $responseData = $response->json();

        if ($responseData['success'] == true && $responseData['score'] >= 0.9) {
            // Dispatch the job to the queue
            ContactFormMail::dispatch($validatedData);
            return redirect()->route('thankyou')->with('success', 'Your message has been sent!');
        } else {
            return redirect()->back()->withErrors(['error' => 'Your message could not be sent. Please check the reCAPTCHA checkbox and try again.']);
        }
    }
    //
    // public function sendContactForm(Request $request)
    // {
    //     $user_ip = $request->ip();
    //     // dd($request);
    //     $recaptcha_response = $request->get('g-recaptcha-response');

    //     $validatedData = $request->validate([
    //         'name'    => 'required',
    //         'email'   => 'required|email',
    //         'country_region' => 'required',
    //         'number'  => 'required',
    //         'company' => 'required',
    //         'role'    => 'required',
    //         'message' => ['required', 'string', new NoUrls],
    //         'user_ip' => 'required|ip',
    //         // 'recaptcha_response'=>'required'
    //     ]);


    //     $secretkey = env('RECAPTCHAV3_SECRET', '6LeMDa0pAAAAAESeA4jv7W45DgMhTAt6Ggk1QRxV');
    //     // dd($secretkey);
    //     $baseUrl = 'https://www.google.com/recaptcha/api/siteverify';
    //     $secretKey = $secretkey;
    //     // $responseToken = $request->get('g-recaptcha-response');
    //     $responseToken = $request->input('recaptcha_response');

    //     $url = $baseUrl . '?secret=' . urlencode($secretKey) . '&response=' . urlencode($responseToken);

    //     $response = Http::post($url);

    //     // Get the response data
    //     $responseData = $response->json();


    //     // dd('response',$responseData);
    //     if ($responseData['success'] == true && $responseData['score'] >= 0.9) {
    //         // Token is valid and has a score above the threshold
    //         // Proceed with form submission and sending email
    //         Mail::to('info@tradeimex.in')->send(new ContactFormMail($validatedData));
    //         return redirect()->route('thankyou')->with('success', 'Your message has been sent!');
    //     } else {
    //         // Token is invalid or score is too low
    //         // Reject the form submission and display an error message
    //         return redirect()->back()->withErrors(['error' => 'Your message could not be sent. Please check the reCAPTCHA checkbox and try again.']);
    //     }

    // }
}
