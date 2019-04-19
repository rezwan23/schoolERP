<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CollegeClass;
use App\Models\IssueBook;
use App\Models\Librarian;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('index', [
            'students'=>Student::count(),
            'teachers'  =>Teacher::count(),
            'books'  =>Book::count(),
            'classes'  =>CollegeClass::count(),
        ]);
    }

    public function profile()
    {
        return view('profile.edit', ['user'=>auth()->user()]);
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password'=>'required|confirmed',
        ]);

        if(Hash::check($request->old_password, auth()->user()->password)){
            auth()->user()->update([
                'password'  =>  Hash::make($request->password),
            ]);
            return back()->with('success-message', 'Password Changed');
        }else{
            return back()->withErrors(['error-message'=>'Old password didn\'t matched']);
        }
    }

    public function update(Request $request)
    {
        if($request->hasFile('photo')){
            $photo = $request->file('photo')->store('/');
        }
        auth()->user()->update(['name'  =>  $request->name, 'photo'=>$photo]);
        return back()->with('success-message', 'User Updated Successfully!');
    }

    public function bookIssueForm()
    {
        return view('book.issue', ['books'=>Book::all(), 'students'=>Student::all()]);
    }

    public function bookIssue(Request $request)
    {
        $previousRecord = IssueBook::where('student_id', $request->student_id)->where('is_returned', 0)->first();
        if($previousRecord){
            return back()->withErrors(['error-message'=>'Student Already Issued A Book']);
        }
        IssueBook::create(['student_id'=>$request->student_id, 'book_id'=>$request->book_id]);
        return back()->with('success-message', 'Book Issued');
    }

    public function allIssuedBooks()
    {
        return view('book.issued', ['records'=>IssueBook::all()]);
    }

    public function returnBook(IssueBook $book)
    {
        $book->markAsReturned();
        return redirect()->route('book.issued')->with('success-message', 'Book Returned');
    }
}
