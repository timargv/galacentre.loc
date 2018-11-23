<?php

namespace App\Entity\Products;

use App\Entity\Products\Product\Product;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @property mixed id
 */
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

    public function products(){
        return $this->hasMany(Product::class, 'category_id');
    }

    public function countProducts ($category)
    {
        $categoryIds = $category->descendants()->pluck('id');
        $productCount = Product::whereIn('category_id', $categoryIds)->getModels();
        return count($productCount);
    }



}
