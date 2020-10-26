<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;

class BusinessImageController extends Controller
{

    public function index(Business $business)
    {
      return view('business.images.view', compact('business'));
    }

    public function store(Business $business)
    {
        request()->validate([
            'image' => ['required', 'file']
        ]);


        if (explode('/', request('image')->getMimeType())[0] !== 'image') {
            return response('Invalid file type', 400);
        }

        $business->addImage(request('image'));

        return response(null, 200);
    }

    public function create(Business $business)
    {
        return view('business.images.create', compact('business'));
    }
}