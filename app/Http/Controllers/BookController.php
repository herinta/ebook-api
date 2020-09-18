<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //native :select * from books;
        $books = DB::table('books') -> get();
        return response($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //native : insert to blablabla
        // return Book::create([
        //     "title" => $request->title,
        //     "description" => $request->description,
        //     "author" => $request->author,
        //     "publisher" => $request->publisher,
        //     "date_of_issue" => $request->date_of_issue,
        // ]);

        try{

            $title = $request->input('title');
            $description = $request->input('description');
            $author = $request->input('author');
            $publisher = $request->input('publisher');
            $dates = $request->input('date_of_issue');


            $data = new \App\Book();
            $data->title = $title;
            $data->description = $description;
            $data->author = $author;
            $data->publisher = $publisher;
            $data->date_of_issue = $dates;

            if($data->save()){
                return response()->json([
                    'status' => true,
                    'code' => 200,
                    'message' => 'Berhasil Menambah Buku',
                ], 200);
            }
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'code' => 200,
                'message' => $e->getMessage()
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Book::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // return Book::find($id)->update([
        //     "title" => $request->input('title'),
        //     "description" => $request->input('description'),
        //     "author" => $request->input('author'),
        //     "publisher" => $request->input('publisher'),
        //     "date_of_issue" => $request->input('date_of_issue'),
        // ]);

        try{

            $title = $request->input('title');
            $description = $request->input('description');
            $author = $request->input('author');
            $publisher = $request->input('publisher');
            $dates = $request->input('date_of_issue');


            $data = \App\Book::where('id',$id)->first();
            $data->title = $title;
            $data->description = $description;
            $data->author = $author;
            $data->publisher = $publisher;
            $data->date_of_issue = $dates;

            if($data->save()){
                return response()->json([
                    'status' => true,
                    'code' => 200,
                    'message' => 'Berhasil Update Buku',
                ], 200);
            }
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'code' => 200,
                'message' => $e->getMessage()
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // return Book::destroy($id);
        try{
            $data = \App\Book::where('id',$id)->first();
            if($data->delete()){
                return response()->json([
                    'status' => true,
                    'code' => 200,
                    'message' => 'Berhasil Delete Buku',
                ], 200);
            }
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'code' => 200,
                'message' => $e->getMessage()
            ], 200);
        }
    }
}