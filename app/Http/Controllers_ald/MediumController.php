<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Medium;
use App\Http\Requests\Media\Index;
use App\Http\Requests\Media\Show;
use App\Http\Requests\Media\Create;
use App\Http\Requests\Media\Store;
use App\Http\Requests\Media\Edit;
use App\Http\Requests\Media\Update;
use App\Http\Requests\Media\Destroy;


/**
 * Description of MediumController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MediumController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.media.index', ['records' => Medium::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Medium  $medium
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Medium $medium)
    {
        return view('pages.media.show', [
                'record' =>$medium,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('pages.media.create', [
            'model' => new Medium,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Medium;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Medium saved successfully');
            return redirect()->route('media.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Medium');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Medium  $medium
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Medium $medium)
    {

        return view('pages.media.edit', [
            'model' => $medium,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Medium  $medium
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Medium $medium)
    {
        $medium->fill($request->all());

        if ($medium->save()) {
            
            session()->flash('app_message', 'Medium successfully updated');
            return redirect()->route('media.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Medium');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Medium  $medium
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Medium $medium)
    {
        if ($medium->delete()) {
                session()->flash('app_message', 'Medium successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Medium');
            }

        return redirect()->back();
    }
}
