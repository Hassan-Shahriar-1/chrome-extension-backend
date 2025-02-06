<?php

namespace App\Models;

use App\Enums\CurrencyEnum;
use App\Enums\FacebookMarketplaceCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'desciption',
        'price',
        'currency',
        'image',
        'category',
        'location'
    ];

    protected $casts = [
        'category' => FacebookMarketplaceCategory::class,
        'currency' => CurrencyEnum::class
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
