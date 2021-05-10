<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Io;
use App\Http\Requests\Io\Index;
use App\Http\Requests\Io\Show;
use App\Http\Requests\Io\Create;
use App\Http\Requests\Io\Store;
use App\Http\Requests\Io\Edit;
use App\Http\Requests\Io\Update;
use App\Http\Requests\Io\Destroy;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;


/**
 * Description of IoController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class IoController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        $test = Io::all();
        return response()->json($test);
    }

      /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Io  $io
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Io $io)
    {
       // $relatedMedia = $io->media()->get();
        $contributors = [];
        foreach ($io->user as $user) {
            $user->pivot->user_id;

            $getName = User::find($user->pivot->user_id);
            $name = $getName->name;
            array_push($contributors, $name);
        }
        $io->load('media');
        return response()->json($io);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('pages.io.create', [
            'model' => new Io,

        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Io;
        $model->fill($request->all());

        if ($model->save()) {

            session()->flash('app_message', 'Io saved successfully');
            return redirect()->route('io.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Io');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Io  $io
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Io $io)
    {

        return view('pages.io.edit', [
            'model' => $io,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Io  $io
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Io $io)
    {
        $io->fill($request->all());

        if ($io->save()) {

            session()->flash('app_message', 'Io successfully updated');
            return redirect()->route('io.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Io');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Io  $io
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Io $io)
    {
        if ($io->delete()) {
                session()->flash('app_message', 'Io successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Io');
            }

        return redirect()->back();
    }
}
