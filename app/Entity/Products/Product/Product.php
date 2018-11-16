<?php

namespace App\Entity\Products\Product;

use App\Entity\Products\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Maatwebsite\Excel\Concerns\ToModel;

/**
 * @property array $sert
 * @property array $props
 * @property array $specifications
 * @property array $includes
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 */
class Product extends Model implements ToModel
{
    //
    protected $table = 'products';

    protected $fillable = [
        'galaId',
        'title',
        'name_original',
        'name_h1',
        'article',
        'user_id',
        'category_id',
        'brand_id',
        'price',
        'price_base',
        'price_old',
        'price_sp',
        'sh_description',
        'full_description',
        'min',
        'box',
        'fix',
        'new',
        'hit',
        'stk',
        'store_ekb',
        'store_msk',
        'store_nsk',
        'way',
        'sert',
        'barcode',
        'props',
        'specifications',
        'includes',
    ];

    protected $casts = [
        'sert' => 'array',
        'specifications' => 'array',
        'includes' => 'array',
        'props' => 'array',
    ];

    public function gDateF($dateGala)
    {
        return gmdate('d.m.Y', $dateGala);
    }

    public function statusDate($dateGala) {
        $isDate = gmdate('d.m.Y', $dateGala);
        if ($isDate == date('d.m.Y')) {
            $oldDate = 'text-success';
        } else {
            $oldDate = 'text-red';
        }
        return $oldDate;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

//    public function countProductGalaCentre() {
//        $json = file_get_contents('http://www.galacentre.ru/api/v2/catalog/json/?key=d27b9aa09102f001d6f6f5c5fc97d222&store=msk');
//        $data =  array_merge((array) json_decode($json));
//        $getProducts = $data['DATA'];
//        return count($getProducts);
//    }
    /**
     * @param array $row
     *
     * @return Model|Model[]|null
     */
    public function model(array $row)
    {
        return Product::where('article', '===', $row[0])->update([
            'stk' => $row[3]
        ]);
    }
}
