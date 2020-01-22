<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $name
 * @property string $description
 * @property string $color
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $childs
 * @property-read int|null $childs_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\InputOutput[] $inputOutputs
 * @property-read int|null $input_outputs_count
 */
class Category extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'color',
        'icon'
    ];

    protected static $localCategory = [
        1 => 'Despesas da Casa',
        2 => 'Financiamentos',
        3 => 'Manutenção',
        4 => 'Cartão de Crédito'
    ];

    public static function rules(Category $category = null)
    {
        $id = ", {$category->id}" ?? '';
        return [
            'name' => 'required',
            'description' => "required|unique:categories,description{$id}"
        ];
    }

    public function childs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(__CLASS__);
    }

    public function inputOutputs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(InputOutput::class);
    }

    // Função que verifica se o menu é filho (submenu) de outro
    public function isChild(): bool
    {
        return !is_null($this->category_id);
    }

    // Verifica e, caso seja um menu pai, retorna a quantidade de filhos
    public function isFather(): int
    {
        return $this->where('category_id', $this->id)->get()->count();
    }

    // Retorna o nome do elemento Pai do submenu selecionado/listado
    public function father()
    {
        return $this->where('id',$this->category_id)->get(['name'])->first();
    }
}
