<?php

namespace App\Entity\Products\Product;

use App\Entity\Products\Category;
use Illuminate\Database\Eloquent\Builder;
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
 *
 * * @method Builder active()
 */
class Product extends Model implements ToModel
{
    //
    protected $table = 'products';

    public const STATUS_ACTIVE = 'Y';
    public const STATUS_CLOSED = 'N';

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
        'images',
    ];

    protected $casts = [
        'sert' => 'array',
        'specifications' => 'array',
        'includes' => 'array',
        'props' => 'array',
        'images' => 'array',
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

    public function productSort($value, $column, $query) {
        if ($value == 'desc') {
            $query->orderByDesc($column);
        } else{
            $query->orderBy($column);
        }
        return $query;
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

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
