<?php

namespace App\Entity\Products;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{

    use NodeTrait;

    protected $table = 'product_categories';

    protected $fillable = [
        'name',
        'name_original',
        'name_h1',
        'name_menu',
        'description',
        'status',
        'code',
        'count',
        'image',
        'date',
        'parent_id',
        'icon',
        'slug'
    ];


}
