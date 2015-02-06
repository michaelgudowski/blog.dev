<?php

use Carbon\Carbon;

class Post extends BaseModel
{
    // Dont really need this. Laravel knows a model called post in the app/model folder
    protected $table = 'posts';

    //Go inside of store on postcontroller.php
    public static $rules = array(
    	'title' => 'required|max:100',
    	'body' => 'required'
    	);

    public function getCreatedAtAttribute($value){
    	$utc = Carbon::createFromFormat($this->getDateFormat(), $value);
    	return $utc->setTimezone('America/Chicago');
    }

     public function getUpdatedAtAttribute($value){
    	$utc = Carbon::createFromFormat($this->getDateFormat(), $value);
    	return $utc->setTimezone('America/Chicago');
    }

    public function setTitleAttribute($value){
    	$this->attributes['title'] = ucfirst($value);
    }
    public function user(){
        return $this->belongsto('User');
    }

    public function uploadFile($file){
        $uploadPath = public_path() . '/uploads';
        $fileName = $this->id . '-' . $file->getClientOriginalName();

        Input::file('image')->move($uploadPath, $fileName);

        $this->img_url = '/uploads/' . $fileName;

        $this->save();
    }

}