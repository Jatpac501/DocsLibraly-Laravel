<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use Laravel\Jetstream\Team;

class BookController extends Controller
{
    public function index(int $id)
    {
        $subject = Subject::with('books')->findOrFail($id);
        $books = $subject->books()->orderBy('created_at', 'desc')->paginate(10);
        $admin = Auth::user()->currentTeam->id == 2;
        return Inertia::render('Books/Index', [
            'subject' => $subject,
            'books' => $books,
            'admin' => $admin,
        ]);
    }


    public function upload()
    {
        return Inertia::render('Books/Upload', [
            'subjects' => Subject::all(),
        ]);
    }

    public function store(StoreBookRequest $request) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');
        Book::create([
            'name' => $request->name,
            'author' => $request->author,
            'year' => $request->year,
            'subject_id' => $request->subject_id,
            'path_file' => $filePath,
            'description' => $request->description,
            'type' => pathinfo($filePath, PATHINFO_EXTENSION)
        ]);
        return redirect()->route('books.index', $request->subject_id);
    }
}
//Гражданская авиация: ХХI век. Сборник материалов XIV Международной молодежной научной конференции (14-15 апреля 2022 г.) : сборник статей
//Содержит материалы XIV Международной молодежной научной конференции, состоявшейся 14-15 апреля 2022 г. на базе Ульяновского института гражданской авиации имени Главного маршала авиации Б. П. Бугаева. Опубликовано 120 докладов преподавателей, студентов и аспирантов вузов Минска, Ульяновска, Новосибирска, Бугуруслана, Белгорода, Самары, Сызрани.
//сост. Доклады студентов и аспирантов  – Ульяновск.: УИ ГА
