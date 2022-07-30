<?php

namespace App\Http\Controllers;

use App\Models\Stream;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    /**
     * Отображает список ресурсов
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $streams = Stream::all();

        return view('streams.index', compact('streams'));
    }

    /**
     * Выводит форму для создания нового ресурса
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('streams.create');
    }

    /**
     * Помещает созданный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Stream::create($request->all());

        return redirect()->route('streams.index')->with('success','stream created successfully.');
    }

    /**
     * Отображает указанный ресурс.
     *
     * @param  \App\Models\stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function show(Stream $stream)
    {
      return view('streams.show',compact('stream'));
    }

    /**
     * Выводит форму для редактирования указанного ресурса
     *
     * @param  \App\Models\stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function edit(Stream $stream)
    {
        return view('streams.edit',compact('stream'));
    }

    /**
     * Обновляет указанный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stream $stream)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $stream->update($request->all());

        return redirect()->route('streams.index')->with('success','stream updated successfully');
    }

    /**
     * Удаляет указанный ресурс из хранилища
     *
     * @param  \App\Models\stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stream $stream)
    {
      $stream->delete();

       return redirect()->route('streams.index')
                       ->with('success','stream deleted successfully');
    }
}