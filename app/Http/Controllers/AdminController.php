<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $BookData = Book::all();
        $countBook = Book::count();
        $borrow = Borrowing::query()->get();
        return view('dashboard', compact('BookData', 'countBook', 'borrow'));
    }

    public function history() {
        $loans = Borrowing::query()->where('status', 'Dikembalikan')->get();
        return view('history', compact('loans'));
    }

    public function deleteHistory($id) {
        $loans = Borrowing::findOrFail($id);
        $loans->delete();
        return redirect()->route('history')->with('success', 'Berhasil menghapus history');
    }

    public function bookManagement(Request $request) {
        $books = Book::all();
        $categories = Category::all();

        return view('management-book', compact('books', 'categories'));
    }

    public function createBook() {
        $categories = Category::all();
        return view('tambah-buku', compact('categories'));
    }

    public function loanBook() {
        $data = Borrowing::query()->orderBy('status', 'desc')->whereIn('status', ['Dipinjam', 'Terlambat'])->get();
        return view('peminjaman', compact('data'));
    }

    public function createLoanBook() {
        $books = Book::all();
        return view('tambah-peminjaman', compact('books'));
    }

    public function addLoanBook(Request $request) {
        $request->validate([
            'name' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required',
            'return_date' => 'required',
        ]);

        Borrowing::create([
            'name' => $request->name,
            'book_id' => $request->book_id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date
        ]);

        return redirect()->route('book.loan')->with('success', 'Berhasil menambahkan peminjaman');
    }

    public function confirmReturn($id) {
        $loan = Borrowing::findOrFail($id);
        $loan->status = 'Dikembalikan';
        $loan->save();

        return redirect()->route('book.loan')->with('success', 'Buku berhasil dikembalikan');
    }

    public function editLoanBook($id) {
        $loan = Borrowing::findOrFail($id);
        $books = Book::all();
        return view('edit-peminjaman', compact('loan', 'books'));
    }

    public function updateLoanBook(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required',
            'return_date' => 'required',
            'status' => 'required'
        ]);

        Borrowing::findOrFail($id)->update([
            'name' => $request->name,
            'book_id' => $request->book_id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
            'status' => $request->status,
        ]);

        return redirect()->route('book.loan')->with('success', 'Berhasil edit peminjaman');
    }

    public function addBook(Request $request) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'cover' => 'required|image'
        ]);

        $cover = $request->file('cover');
        $customFileName = time().'.'.$cover->getClientOriginalExtension();
        $pathCover = $cover->storeAs('book-cover', $customFileName, 'public');

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'cover' => $pathCover
        ]);

        return redirect()->back()->with('success', 'Buku Berhasil Ditambahkan');
    }

    public function editBook($id) {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('bookEdit', compact('book', 'categories'));
    }

    public function updateBook(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'cover' => 'required|image'
        ]);

        $cover = $request->file('cover');
        $customFileName = time().'.'.$cover->getClientOriginalExtension();
        $pathCover = $cover->storeAs('book-cover', $customFileName, 'public');

        Book::findOrFail($id)->update([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'cover' => $pathCover
        ]);

        return redirect()->route('index.dashboard')->with('success', 'Berhasil edit buku');
    }

    public function showBookDetailed($id) {
        $book = Book::findOrFail($id);
        return view('detail-buku', compact('book'));
    }

    public function deleteBook($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
