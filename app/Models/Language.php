<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Language
 *
 * @property int $id
 * @property int $is_active
 * @property string $flag_country
 * @property string $code
 * @property string $iso
 * @property string $file
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereFlagCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereIso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Language extends Model
{
    protected $fillable = [
        'flag_country',
        'code',
        'iso',
        'file',
        'name'
    ];

    public function addNewLanguage($request): void
    {
        $language = new static;
        $language->fill($request->all());
        $language->save();
    }

    public function editLanguage($request, $id): void
    {
        $language = self::find($id);
        $language->fill($request->all());
        $language->update($request->all());
    }

    public function removeLanguage($id): void
    {
        self::find($id)->delete();
    }

    public function active()
    {
        $this->is_active = 1;
        $this->save();
    }

    public function notActive()
    {
        $this->is_active = 0;
        $this->save();
    }

    public function toggleActive($id)
    {
        $toggle = self::find($id);
        if ($toggle->is_active === 0)
        {
            return $toggle->active();
        }
        return $toggle->notActive();
    }
}
