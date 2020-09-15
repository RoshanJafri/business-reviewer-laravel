<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;

class BusinessImageController extends Controller
{
    public function store(Business $business)
    {
        request()->validate([
            'image' => ['required', 'file']
        ]);

        $business->addImage(request('image'));

        return redirect($business->path());
    }

    public function create(Business $business)
    {
        return view('business.images.create', compact('business'));
    }
}