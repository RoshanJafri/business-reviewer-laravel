<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Review;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(ReplyRequest $request, Review $review)
    {
        $this->authorize('reply', $review);

        $review->addReply($request['body']);
        return back();
    }
}