<?php

namespace App\Http\Controllers;

use App\Models\Medium;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;



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
    public function index()
    {

        $ios = Io::all();
        return response()->json($ios);
    }

      /**
     * Get the media and contributors related to an installation.
     *
     * @param  Show  $request
     * @param  Io  $io
     * @return \Illuminate\Http\Response
     */
    public function show(Io $io)
    {
        $media = $io->media()->get();
        $contributors = [];
        foreach ($io->user as $user) {
            $user->pivot->user_id;
            $getName = User::find($user->pivot->user_id);
            $name = $getName->name;
            array_push($contributors, $name);
        }
        $response =[];
        array_push($response, $media);
        array_push($response, $contributors);
        return response()->json($response);

    }
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @param  Create  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function create(Create $request)
//    {
//
//        return view('pages.io.create', [
//            'model' => new Io,
//
//        ]);
//    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $fieldsData = json_decode($request->fields, TRUE);
        //$class = implode(',', (array) $fieldsData['classe']);
        $model= new Io;
        $model->fill($fieldsData);
      // $model->classe = $class;
        $model->save();
        if($medias = $request->file()){
            $this->crateMedia($medias, $model);
        }
        $this->validateIoForAdmin($model->id);
       // return redirect()->back();
    }

        public function validateIoForAdmin($id){
            $role = Auth::user()->role;
            if($role == 'Admin' || $role == 'super-admin'){
                Io::where('id', $id)->update(array('validee' => 1));
            }
        }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  Edit  $request
//     * @param  Io  $io
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(Edit $request, Io $io)
//    {
//        dd($request);
//        return response()->json('huihiuoihiu');
//
//    }
    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Io  $io
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Io $io)
    {
        $fieldsData = json_decode($request->fields, TRUE);
        $io->fill($fieldsData);
        if($medias = $request->file()){
            $this->crateMedia($medias, $io);
        }

        /**
         *  destroy media
         */
        $toDelet = $fieldsData['delete'];
        if ($toDelet !== NULL) {
            foreach ($toDelet as $mediaId) {
                $media = Medium::find($mediaId);
                $name = $media->file_name;
                File::delete('img/' . $name);

                Medium::destroy($mediaId);
            }
        }
        $io->save();


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

    public function crateMedia($medias, $io) {
        foreach ($medias as $images) {
            foreach ($images as $image){
                $destinationPath = 'img';
                $file_name = time() . '-' . $image->getClientOriginalName();
                $image->move($destinationPath, $file_name);
                $img = new Medium;
                $id = $io->id;
                $img->io_id = $id;
                $img->original_name = $image->getClientOriginalName();
                $img->file_name = $file_name;
                $img->type = 'img';
                $img->save();
            }


        }
    }
}
