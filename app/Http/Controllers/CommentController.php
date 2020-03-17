<?php

namespace App\Http\Controllers;

use App\Comment;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 'here';
        Auth::user()->comments()->attach($request->bookId, ['comment'=>$request->comment]);
        return redirect('book/'.$request->bookId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
//        $this->authorize('delete', Auth::user());
        if(Auth::user()->can('delete', $comment))
        {
            Auth::user()->comments()->detach($id);
            return  redirect()->back();
        }

    }

    public static function getComments(int $id)
    {
        $comments = new Comment;
        $comments = DB::table('comments')->where('book_id',$id)->get();
        if($comments->isEmpty())
        {
            return 'No Comments';
        }
        else
        {
            $commentat = array();
            foreach ( $comments as $comment ) {
                $commentat[] =['comment' => $comment->comment, 'id' => $comment->id];
            }
        }
        return $commentat;

    }

    public static function getCommentsOwnner(int $id)
    {
        $comments = new Comment;
        $comments = DB::table('comments')->where('book_id',$id)->get();
        if($comments->isEmpty())
        {
            return 'No Comments';
        }
        else
        {
            foreach ( $comments as $comment ) {
                $ownnersIds[] = $comment->user_id;
            }
            $ownnersNames = UserController::getCommentOwnner($ownnersIds);
        }
        return $ownnersNames;
    }
}
