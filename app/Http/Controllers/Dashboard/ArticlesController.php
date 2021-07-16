<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class ArticlesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Article::all();

        return Inertia::render('posts', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],

        ])->validate();

        Article::create($request->all());

        return redirect()->back()
            ->with('message', 'Article Created Successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(), [

            'title' => ['required'],
            'body' => ['required'],

        ])->validate();

        if ($request->has('id')) {
            Article::find($request->input('id'))->update($request->all());

            return redirect()->back()
                ->with('message', 'Article Updated Successfully.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            Article::find($request->input('id'))->delete();

            return redirect()->back();
        }
    }
}
