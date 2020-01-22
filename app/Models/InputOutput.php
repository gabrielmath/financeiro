<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\InputOutput
 *
 * @property int $id
 * @property int $category_id
 * @property int $expiration_day
 * @property int $type
 * @property int $is_unique_pay
 * @property int $amount_installments
 * @property float $total_value
 * @property int $is_finalized
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InputOutput newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InputOutput newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InputOutput query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InputOutput whereAmountInstallments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InputOutput whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InputOutput whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InputOutput whereExpirationDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InputOutput whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InputOutput whereIsFinalized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InputOutput whereIsUniquePay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InputOutput whereTotalValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InputOutput whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InputOutput whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Installments[] $installments
 * @property-read int|null $installments_count
 */
class InputOutput extends Model
{
    protected $fillable = [
        'category_id',
        'expiration_day',
        'type',
        'is_unique_pay',
        'amount_installments',
        'total_value',
        'is_finalized'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function installments()
    {
        return $this->hasMany(Installments::class);
    }

}
