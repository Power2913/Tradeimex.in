<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CareerFormMail;
use Illuminate\Support\Facades\Http;
class CareerFormController extends Controller
{
    //
    public function sendCareerApplication(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'number' => 'required',
                'dob' => 'required|date',
                'position' => 'required',
                'cv' => 'required|file|mimes:pdf',
                'recaptcha_response'=>'required',
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
         
            if ($validatedData && $responseData['success'] && $responseData['score'] >= 0.5) {
                 // Get the CV file content
                $cvContent = $request->file('cv')->get();
          
                // Send email with career application data and CV attachment
                Mail::to('info@tradeimex.in')->send(new CareerFormMail($validatedData, $cvContent));
           
                // Redirect back with success message
                return redirect()->route('thankyou')->with('success', 'Your application has been submitted.');
            }
            else {
                # code...
                return redirect()->back()->with('carrererror', 'Sorry, your application could not be submitted. Please try again.');
            }
            
        } catch (\Exception $e) {
            // Log the error
          
    
            // Redirect back with error message
            return redirect()->back()->with('error', 'There was an error submitting your application. Please try again later.');
        }
    }
}
