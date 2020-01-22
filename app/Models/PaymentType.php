<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PaymentType
 *
 * @property int $id
 * @property int $installment_id
 * @property int $type
 * @property float $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentType whereInstallmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentType whereValue($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Installments[] $installments
 * @property-read int|null $installments_count
 */
class PaymentType extends Model
{
    protected $fillable = [
        'installment_id',
        'type',
        'value',
    ];

    public function installments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Installments::class);
    }
}
