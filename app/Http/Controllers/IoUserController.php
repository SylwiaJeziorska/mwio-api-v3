<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IoUser;
use App\Http\Requests\IoUser\Index;
use App\Http\Requests\IoUser\Show;
use App\Http\Requests\IoUser\Create;
use App\Http\Requests\IoUser\Store;
use App\Http\Requests\IoUser\Edit;
use App\Http\Requests\IoUser\Update;
use App\Http\Requests\IoUser\Destroy;


/**
 * Description of IoUserController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class IoUserController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
       
        //return view('pages.io_user.index', ['records' => IoUser::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  IoUser  $iouser
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, IoUser $iouser)
    {
        return view('pages.io_user.show', [
                'record' =>$iouser,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('pages.io_user.create', [
            'model' => new IoUser,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new IoUser;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'IoUser saved successfully');
            return redirect()->route('io_user.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving IoUser');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  IoUser  $iouser
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, IoUser $iouser)
    {

        return view('pages.io_user.edit', [
            'model' => $iouser,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  IoUser  $iouser
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,IoUser $iouser)
    {
        $iouser->fill($request->all());

        if ($iouser->save()) {
            
            session()->flash('app_message', 'IoUser successfully updated');
            return redirect()->route('io_user.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating IoUser');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  IoUser  $iouser
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, IoUser $iouser)
    {
        if ($iouser->delete()) {
                session()->flash('app_message', 'IoUser successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting IoUser');
            }

        return redirect()->back();
    }
}
