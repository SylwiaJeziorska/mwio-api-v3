<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Membre;
use App\Http\Requests\Membres\Index;
use App\Http\Requests\Membres\Show;
use App\Http\Requests\Membres\Create;
use App\Http\Requests\Membres\Store;
use App\Http\Requests\Membres\Edit;
use App\Http\Requests\Membres\Update;
use App\Http\Requests\Membres\Destroy;


/**
 * Description of MembreController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MembreController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.membres.index', ['records' => Membre::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Membre $membre)
    {
        return view('pages.membres.show', [
                'record' =>$membre,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('pages.membres.create', [
            'model' => new Membre,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Membre;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Membre saved successfully');
            return redirect()->route('membres.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Membre');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Membre $membre)
    {

        return view('pages.membres.edit', [
            'model' => $membre,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Membre $membre)
    {
        $membre->fill($request->all());

        if ($membre->save()) {
            
            session()->flash('app_message', 'Membre successfully updated');
            return redirect()->route('membres.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Membre');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Membre  $membre
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Membre $membre)
    {
        if ($membre->delete()) {
                session()->flash('app_message', 'Membre successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Membre');
            }

        return redirect()->back();
    }
}
