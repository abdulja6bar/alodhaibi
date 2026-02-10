<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Complaint;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $ratings = Rating::where('is_approved', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
            
        $averageRating = Rating::where('is_approved', true)->avg('rating');
        $totalRatings = Rating::where('is_approved', true)->count();
        
        return view('home', compact('ratings', 'averageRating', 'totalRatings'));
    }
    
    public function about()
    {
        return view('about');
    }
    
    public function ratings()
    {
        $ratings = Rating::where('is_approved', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('ratings.index', compact('ratings'));
    }
}