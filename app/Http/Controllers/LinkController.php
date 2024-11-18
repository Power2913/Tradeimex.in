<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    //About US
    function index() {
        return view('frontend.index');
    }
    function aboutus() {
        return view('frontend.about-us');
    }
    function whychooseus() {
        return view('frontend.why-choose-us');
    }
    function fbs() {
        return view('frontend.find-buyer-supplier');
    }
    function carrers() {
        return view('frontend.careers');
    }
    function clients()  {
        return view('frontend.our-clients');
    }
    function partners() {
        return view('frontend.partners');
    }
    function FAQ() {
        return view('frontend.faqs');
    }
    // Contact US
    function contactus() {
        return view('frontend.contact-us');
    }                                                                                 
    // Products
    function products() {
        return view('frontend.products');
    }
    function customsdata() {
        return view('frontend.customs-data');
    }


    function customizedanalyticaldata() {
        return view('frontend.analytical-custom-report');
    }

    function disclaimer()  {
        return view('frontend.disclaimer');
    }
    function tou()  {
        return view('frontend.terms-of-use');
    }
    function privacy()  {
        return view('frontend.privacy-policy');
    }
    function thankyou()  {
        return view('frontend.thankyou');
    }
    function searchlivedata() {
        return view('frontend.searchlivedata');
    }
    function searchresult() {
        return view('frontend.livedata.search');
    }

}
