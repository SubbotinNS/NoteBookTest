<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoteBookModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class NoteBookApiController extends Controller
{

  public $valid_rules = [
    'full_name' => 'required',
    'tel_number' => 'required|numeric',
    'email' => 'required|email',
    'birth_date' => 'date',
    'photo' => 'image'
  ];

  public function notebook()
  {
      //is_null($data=NoteBookModel::get())?$status=200:$status=204;                  //get() ноль вообще не вовзращает походу
      //return response()->json($data=NoteBookModel::get(),is_null($data)?204:200);
      return response()->json(NoteBookModel::get(),200);
  }

  public function notebookadd(Request $req)
  {
    $validator = Validator::make($req->all(),$this->valid_rules);
    if($validator->fails())
      return response()->json($validator->errors(),400);
     $note=NoteBookModel::create($req->all());
     return response()->json($note,201);
  }

  public function notebookById($id)
  {
    //$note=NoteBookModel::find($id);
    if(is_null($note=NoteBookModel::find($id)))
        return response()->json(['error'=>true,"message"=>'Note not found'], 404);
    else
      return response()->json($note, 200);
  }

  public function notebookaddById(Request $req,$id)
  {
    $validator = Validator::make($req->all(),$this->valid_rules);
    if($validator->fails())
      return response()->json($validator->errors(),400);
    if(!is_null($note=NoteBookModel::find($id)))
      return response()->json(['error'=>true,"message"=>'Already exists'],400);
    else
    {
      $note = new NoteBookModel;
      $note->full_name=$req->full_name;
      $note->id=$req->id;
      $note->company=$req->company;
      $note->tel_number=$req->tel_number;
      $note->email=$req->email;
      $note->birth_date=$req->birth_date;
      $note->photo=$req->photo;
      $note->save();
      //$note = NoteBookModel::create($req->all());                 Некорректно считывается id запроса??
      return response()->json($note,201);
    }
  }

  public function notebookdeleteById(Request $req,$id)
  {
    if(is_null($note=NoteBookModel::find($id)))
        return response()->json(['error'=>true,"message"=>'Note not found'], 404);
    else
    {
      $note->delete();
      return response()->json('Note successfully deleted',200);
    }
  }
}
