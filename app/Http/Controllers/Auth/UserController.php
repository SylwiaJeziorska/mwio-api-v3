<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Users\Index;
use App\Http\Requests\Users\Create;
use App\Http\Requests\Users\Store;
use App\Http\Requests\Users\Edit;
use App\Http\Requests\Users\Update;
use App\Http\Requests\Users\Destroy;
use Illuminate\Support\Facades\Validator;



/**
 * Description of UserController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class UserController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        //dd($users);
        return response()->json($users);    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = $request->user();
        return response()->json($user);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

//
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
//        $model=new Membre;
//        $model->fill($request->all());
//
//        if ($model->save()) {
//
//            session()->flash('app_message', 'Membre saved successfully');
//            return redirect()->route('membres.index');
//            } else {
//                session()->flash('app_message', 'Something is wrong while saving Membre');
//            }
//        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, User $user)
    {

    //
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       // dd($request['credentials']['banni']);
        $validatedData = $request->validate([
            'name' => ['string', 'max:255'],
            'password' => ['string', 'min:8', 'confirmed'],
            'prenome' => 'string|max:255|nullable',

        ]);
        $user = User::find($request['credentials']['id']);
        if(isset($request['credentials']['password'])){
            $validatedData['password'] = bcrypt($request['credentials']['password']);
            $user->update([
                'password' => $validatedData['password'],
            ]);
        }
        $user->update([
            'name' => $request['credentials']['name'],
            'prenome' => $request['credentials']['prenome'],
            'role' => $request['credentials']['role'],
            'banni' => $request['credentials']['banni']

        ]);
        $user->save();
        return response()->json([
            'user' => $user,
        ]);

    }
    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Membre  $membre
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Membre $membre)
    {
//        if ($membre->delete()) {
//                session()->flash('app_message', 'Membre successfully deleted');
//            } else {
//                session()->flash('app_error', 'Error occurred while deleting Membre');
//            }
//
//        return redirect()->back();
    }
}
