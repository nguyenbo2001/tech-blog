<?php

namespace App\Http\Controllers;

use App\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = Term::all();

        return view('admin.terms.index', ['terms' => $terms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:terms,name|min:3|max:150',
        ]);

        $term = new Term;
        $term->name = $request->name;
        $term->slug = Str::slug($request->name, '-');
        $term->save();

        return redirect()->route('admin.terms.create')->with('message', 'Đã thêm Thể Loại');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function show(Term $term)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term)
    {
        return view('admin.terms.edit', ['term' => $term]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Term $term)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:150|unique:terms,name,'.$term->id,
        ]);

        $term->name = $request->name;
        $term->slug = Str::slug($request->name, '-');
        $term->save();

        return redirect()->route('admin.terms.edit', $term)->with('message', 'Cập nhật Thể Loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $term)
    {
        $term->delete();

        return redirect()->route('admin.terms.index')->with('message', 'Xoá Thể Loại thành công');
    }
}
