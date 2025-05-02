<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CollectionRequest;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $collectionRequests = CollectionRequest::where('user_id', Auth::id())->get();
        return view('report.index', compact('collectionRequests'));
    }
}
