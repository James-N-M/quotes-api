<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function quotes()
    {
        return $this->belongsToMany('App\Quote');
    }

    public static function search(string $search) {
        $columns = ["id", "name"];

        if (empty(trim($search))) {
            return static::select($columns)->get();
        }
        else {
            $fuzzySearch = implode("%", str_split($search));
            $fuzzySearch = "%$fuzzySearch%";

            return static::select($columns)->where("name", "like", $fuzzySearch)->get();
        }
    }
}
