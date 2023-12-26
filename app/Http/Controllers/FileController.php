<?php

namespace App\Http\Controllers;

use App\Models\file;
use App\Http\Requests\StorefileRequest;
use App\Http\Requests\UpdatefileRequest;
use App\Models\categorie;

class FileController extends Controller
{
    public function index() {
        $files = file::latest()->get();
        return view('home',compact('files'));
    }
    public function show(file $file) {

        return view('detail',compact('file'));
    }

    public function create(){
        $categories = categorie::latest()->get();
        return view('addfile',['categories'=>$categories]);
    }

    public function store(StorefileRequest $request){
        $formFields = $request->validated() ;
        $this->uploadImage($request,$formFields);
        $file = [
        'titre' => $request->title,
        'description' => $request->description ,
        'document' => $formFields['file'],
        'categorie_id' => $request->category,
        'downloads' => 0,
        'user_id' => 1,
        ];

        file::create($file);

        return redirect()->route('file.index')->with('success','Your compte created successfully.');

    }
    public function destroy(file $file){

        $file->delete();

        return redirect()->route('home')->with('success',' deleted successfully.');
    }

    public function edit(file $profile){

        return view('profile.edit',compact('profile'));
    }
    public function update(UpdatefileRequest $request, file $profile){

        
    }

    private function uploadImage(StorefileRequest $request,array &$formFields){
        unset($formFields['file']);
        // Store image
        if ($request->hasFile('file')) {
            $formFields['file'] = $request->file('file')->store('profile','public');
        }

    }

    public function download(file $fille){
        $filepath= $filepath = storage_path('app/public/' . $fille->document);
        $fille->update(['downloads' => $fille->downloads + 1]);
    
        $headers = array(
                  'Content-Type: application/pdf',
                );
                
    
        return response()->download($filepath, 'filename.pdf', $headers);
    }
}
