<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'desciption',
        'price',
        'image',
        'category',
        'location'
    ];

    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (is_null($this->path)) {
                    return null;
                }

                if (preg_match("@http@", $this->path)) {
                    return $this->path;
                }


                if (env('FILESYSTEM_DISK') == 'exoscale') {
                    return Storage::disk('exoscale')->publicUrl($this->path);
                } else {
                    return Storage::url($this->path);
                }
            }
        );
    }
}
