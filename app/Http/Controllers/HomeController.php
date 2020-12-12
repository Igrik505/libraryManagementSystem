<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Lending;
use App\Publisher;
use App\Reader;
use App\TypeOfBook;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'lends' => Lending::all(),
        ]);
    }

    public function books()
    {
        return view('books', [
            'books' => Book::all(),
        ]);
    }

    public function readers()
    {
        return view('readers', [
            'readers' => Reader::all(),
        ]);
    }

    public function authors()
    {
        return view('authors', [
            'authors' => Author::all(),
        ]);
    }

    public function publishers()
    {
        return view('publishers', [
            'publishers' => Publisher::all(),
        ]);
    }

    public function typeOfBooks()
    {
        return view('typeOfBooks', [
            'types' => TypeOfBook::all(),
        ]);
    }

    public function users()
    {
        return view('users', [
            'users' => User::all(),
        ]);
    }

    // методи на виведення форм для створення записів в бд

    public function createLend()
    {
        return view('createLend', [
            'readers' => Reader::all(),
            'books' => Book::all(),
        ]);
    }

    public function createUser()
    {
        return view('createUser');
    }

    public function createAuthor()
    {
        return view('createAuthor');
    }

    public function createReader()
    {
        return view('createReader');
    }

    public function createPublisher()
    {
        return view('createPublisher');
    }

    public function createBook()
    {
        return view('createBook', [
            'authors' => Author::all(),
            'publishers' => Publisher::all(),
            'types' => TypeOfBook::all(),
        ]);
    }

    public function createTypeOfBook()
    {
        return view('createTypeOfBook');
    }

    // методи на збереження

    public function storeBook(Request $request)
    {
        $this->validate($request, array(
            'bookName' => 'required',
            'inventory' => 'required',
            'author' => 'required',
        ));
        $book = new Book();
        $this->setBook($book, $request);
        return redirect('/books')->with('success', __('Книжку успiшно додано'));
    }

    public function storeReader(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'number' => 'required',
        ));
        $reader = new Reader();
        $this->setReader($reader, $request);
        return redirect('/readers')->with('success', __('Читача успiшно додано'));
    }

    public function storeAuthor(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
        ));
        $author = new Author();
        $this->setAuthor($author, $request);
        return redirect('/authors')->with('success', __('Автора успiшно додано'));
    }

    public function storeType(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
        ));
        $type = new TypeOfBook();
        $this->setType($type, $request);
        return redirect('/typeOfBooks')->with('success', __('Тип книжки успiшно додано'));
    }

    public function storePublisher(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'address' => 'required',
        ));
        $publisher = new Publisher();
        $this->setPublisher($publisher, $request);
        return redirect('/publishers')->with('success', __('Видавця успiшно додано'));
    }

    public function storeUser(Request $request)
    {
        $this->validate($request, array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ));
        $user = new User();
        $this->setUser($user, $request);
        return redirect('/users')->with('success', __('Користувача успiшно додано'));
    }

    public function storeLend(Request $request)
    {
        $lend = new Lending();
        $this->setLend($lend, $request);
        return redirect('home')->with('success', __('Книжку успiшно видано'));
    }

    private function setBook($book, $request)
    {
        $book->name = $request->post('bookName');
        $book->inventoryNumber = $request->post('inventory');
        $book->author_id = $request->post('author');
        $book->publisher_id = $request->post('publisher');
        $book->typeOfBook_id = $request->post('type');
        $book->save();
    }

    private function setReader($reader, $request)
    {
        $reader->name = $request->post('name');
        $reader->phone = $request->post('number');
        $reader->save();
    }

    private function setAuthor($author, $request)
    {
        $author->name = $request->post('name');
        $author->save();
    }

    private function setPublisher($publisher, $request)
    {
        $publisher->name = $request->post('name');
        $publisher->address = $request->post('address');
        $publisher->save();
    }

    private function setLend($lend, $request)
    {
        $date = Carbon::now();
        $daysToAdd = 30;
        $date = $date->addDays($daysToAdd);
        $lend->reader_id = $request->post('reader');
        $lend->book_id = $request->post('book');
        $lend->date = Carbon::now();
        $lend->lendingEndDate = $date;
        $lend->save();
    }

    private function setType($type, $request)
    {
        $type->name = $request->post('name');
        $type->save();
    }

    private function setUser($user, $request)
    {
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->password = Hash::make($request->post('password'));
        $user->save();
    }

    public function deleteLend($id)
    {
        if ($id) {
            Lending::find($id)->delete();
            return redirect()->back()->with('success', __('Книжку успішно повернуто'));
        }
        return redirect()->back()->with('error', __('Сталася помилка'));
    }

    public function deleteAuthors($id)
    {
        if ($id) {
            Author::find($id)->delete();
            return redirect()->back()->with('success', __('Автора успішно видалено'));
        }
        return redirect()->back()->with('error', __('Сталася помилка'));
    }

    public function deleteBook($id)
    {
        if ($id) {
            Book::find($id)->delete();
            return redirect()->back()->with('success', __('Книжку успішно видалено'));
        }
        return redirect()->back()->with('error', __('Сталася помилка'));
    }

    public function deletePublisher($id)
    {
        if ($id) {
            Publisher::find($id)->delete();
            return redirect()->back()->with('success', __('Видавця успішно видалено'));
        }
        return redirect()->back()->with('error', __('Сталася помилка'));
    }

    public function deleteReader($id)
    {
        if ($id) {
            Reader::find($id)->delete();
            return redirect()->back()->with('success', __('Читача успішно повернуто'));
        }
        return redirect()->back()->with('error', __('Сталася помилка'));
    }

    public function deleteTypeOfBook($id)
    {
        if ($id) {
            TypeOfBook::find($id)->delete();
            return redirect()->back()->with('success', __('Тип книжки успішно видалено'));
        }
        return redirect()->back()->with('error', __('Сталася помилка'));
    }

    public function deleteUser($id)
    {
        if ($id) {
            User::find($id)->delete();
            return redirect()->back()->with('success', __('Користувача успішно видалено'));
        }
        return redirect()->back()->with('error', __('Сталася помилка'));
    }
}
