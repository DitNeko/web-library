<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index() {
        $data = Book::with('category')->get();
        return view('tes3', compact('data'));
    }
}
