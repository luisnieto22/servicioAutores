<?php

namespace App\Http\Controllers;

use App\Author; 
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class AuthorController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return authors list.
     *
     * @return Iluminate\Http\Response
     */
    public function index(){
        $authors = Author::all();
        return $this->successResponse($authors);
    }


    public function store(Request $request)
    {
        //Reglas de 
        $rule = [
            //max: maximo de caracteres
            'name' => 'required|max:100',
            //in:que solo acepte cierto valores
            'gender'=> 'required|in:male,female',
            'country'=> 'required|max:80'
        ];
        $this->validate($request, $rule);
        //devuelve un array asociativo
        $authors = Author::create($request->all());

        return $this->successResponse($authors, Response::HTTP_CREATED);
    }
    public function show($author){
        $author = Author::findOrFail($author);
        return $this->successResponse($author);
    }
    
    public function update(Request $request, $author){
        //Reglas de 
        $rule = [
            //max: maximo de caracteres
            'name' => 'required|max:100',
            //in:que solo acepte cierto valores
            'gender'=> 'required|in:male,female',
            'country'=> 'required|max:80'
        ];
        $this->validate($request, $rule);

        $author = Author::findOrFail($author);

        $author->fill($request->all());

        if($author->isClean()){
            return $this->errorResponse(
                'Al menos cambie un valor',
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        $author->save();
        return $this->successResponse($author);
    }
    public function destroy($author){
        $author = Author::findOrFail($author);
        $author->delete();
        return $this->successResponse($author);
    }
}
