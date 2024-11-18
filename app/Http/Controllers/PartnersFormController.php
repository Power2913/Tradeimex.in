<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PartnerFormMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PartnersFormController;
use App\Rules\NoUrls;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;
class PartnersFormController extends Controller
{
    //
    public function PartnerForm(Request $request)
    {
        // try {
        //   Faltu hai
            $validate = $request->validate([
                'fname'              => ['required', 'string'],
                'lname'              => ['required', 'string'],
                'email'              => ['required', 'email'],
                'number'              => ['required', 'numeric'],
                'msg' => ['required', 'string', new NoUrls],
                // 'msg'                => ['required'],
                'apply'              => ['required'],
                'recaptcha_response' => ['required']
            ]);
            $secretkey = env('RECAPTCHAV3_SECRET', '6LeMDa0pAAAAAESeA4jv7W45DgMhTAt6Ggk1QRxV');
            //  dd($secretkey);
            $baseUrl = 'https://www.google.com/recaptcha/api/siteverify';
            $secretKey = $secretkey; 
            $responseToken = $request->input('recaptcha_response');
            
            $url = $baseUrl . '?secret=' . urlencode($secretKey) . '&response=' . urlencode($responseToken);
            
            $response = Http::post($url);
    
            // Get the response data
            $responseData = $response->json();
            if ($validate && $responseData['success'] && $responseData['score'] >= 0.5) {  
                Mail::to('info@tradeimex.in')->send(new PartnerFormMail($validate));
                return redirect()->route('thankyou')->with('partner-success', 'Your message has been sent!');
            } else {
                return redirect()->back()->with('error', 'Your message has not been sent, please check the form and try again!');
            }
        // } catch (\Exception $e) {
        //     // Log the exception
        //     \Log::error('Error sending email: ' . $e->getMessage());
    
        //     // Redirect back with error message
        //     return redirect()->back()->with('error', 'An error occurred while sending your message. Please try again later.');
        // }
    }
}
