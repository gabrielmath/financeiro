<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Installments
 *
 * @property int $id
 * @property int $input_output_id
 * @property int $month
 * @property int $year
 * @property string|null $pay_day
 * @property float $value
 * @property float|null $pay_value
 * @property int|null $pay_type
 * @property int $is_ignored
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments whereInputOutputId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments whereIsIgnored($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments wherePayDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments wherePayType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments wherePayValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Installments whereYear($value)
 * @mixin \Eloquent
 * @property-read \App\Models\InputOutput $inputOutput
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PaymentType[] $paymentTypes
 * @property-read int|null $payment_types_count
 */
class Installments extends Model
{
    protected $fillable = [
        'input_output_id',
        'month',
        'year',
        'pay_day',
        'value',
        'pay_value',
        'pay_type',
        'is_ignored'
    ];

    public function inputOutput()
    {
        return $this->belongsTo(InputOutput::class);
    }

    public function paymentTypes()
    {
        return $this->hasMany(PaymentType::class);
    }
}
