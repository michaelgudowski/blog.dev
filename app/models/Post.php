<?php

use Carbon\Carbon;

class Post extends BaseModel
{
    // Dont really need this. Laravel knows a model called post in the app/model folder
    protected $table = 'posts';

    //Go inside of store on postcontroller.php
    public static $rules = array(
    	'title' => 'required|max:100',
    	'content' => 'required'
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

}