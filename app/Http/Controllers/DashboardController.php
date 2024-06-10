<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Subject;

class DashboardController extends Controller
{
    public function index() {
        return Inertia::render('Dashboard', [
            'subjects' => Subject::withCount('books')->get(),
        ]);
    }
    public function about() {
        $bookCount = Book::all()->count();
        return Inertia::render('About', [
            'bookCount' => $bookCount,
        ]);
    }
    public function contacts() {
        return Inertia::render('Contacts', [
            'contacts' => Contact::all(),
        ]);
    }
}
