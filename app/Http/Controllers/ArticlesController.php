<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;
use Laracasts\Flash\Flash;
use App\Http\Requests\ArticleRequest;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::search($request->title)->orderBy('id','DESC')->paginate(5);
        $articles->each(function($articles)
        {
            $articles->category;
            $articles->user;
        });

        return view('admin.articles.index')->with([
            'articles' => $articles ,
            'search' => $request->title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'DESC')->lists('name','id');
        $tags = Tag::orderBy('name', 'ASC')->lists('name','id');
        return view('admin.articles.create')->with([
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {   
        //Manipulacion de Imagenes...
        if($request->image)
        {
            $file = $request->file('image');
            $name = 'blogfacilito_'. time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\images\articles\\';
            $file->move($path, $name);
        }

        $article = new Article($request->all());
        $article->user_id = \Auth::user()->id;
        $article->save();

        $article->tags()->sync($request->tags); 

        $image = new Image();
        $image->name = $name;
        //$image->article_id = $article->id; //Es valido pero traeria problemas
        $image->article()->associate($article);
        $image->save();

        flash('Se ha creado el articulo; <b>'.$article->title.'</b> de forma satisfactoria')->success();
        return redirect()->route('admin.articles.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::orderBy('name','DESC')->lists('name','id');
        $tags = Tag::orderBy('name','DESC')->lists('name','id');
        $my_tags = $article->tags->lists('id')->ToArray();

        //dd($my_tags);
       return view('admin.articles.edit')->with([
        'article' => $article,
        'categories' => $categories,
        'tags' => $tags,
        'my_tags' => $my_tags
       ]);
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
        $article = Article::find($id);
        $article->fill($request->all());
        $article->save();

        $article->tags()->sync($request->tags);
        flash('El articulo '.$article->name.' ha sido actualizado exitosamente')->success();
        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        flash('El articulo '.$article->name.' ha sido eliminado exitosamente')->error();
        return redirect()->route('admin.articles.index');
    }
}
