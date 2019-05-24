<?php

namespace App\Models;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Methods\ToggleActive;
use Illuminate\Database\Eloquent\Model;
use Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property int $is_active
 * @property string $section
 * @property mixed $title
 * @property string $url
 * @property int $parent
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUrl($value)
 * @mixin \Eloquent
 */
class Menu extends Model
{
    use PrepareLangStrForJsonMethods, ToggleActive;

    protected $fillable = [
        'id',
        'section',
        'title',
        'url',
        'parent',
        'sort'
    ];

    protected $hidden = [
        'id',
        'is_active',
        'created_at',
        'updated_at'
    ];


    protected $menu_blocks = [
        'our_company',
        'help',
        'partner',
        '3dmriya'
    ];

    public function getTextColumnsForTranslate(): array
    {
        return (new static)->menu_blocks;
    }

    public static function addMenuPoint($request) :void
    {
        $menu = new static;
        $menu->fill($request->all());
        $menu->title = json_encode($menu->createLangString($request, 'title'));
        $menu->save();
    }

    public static function editMenuPoint($request, $id) :void
    {
        $menu = self::find($id);
        $menu->fill($request->all());
        $menu->title = json_encode($menu->createLangString($request, 'title'));
        $menu->update($request->all());
    }

    public static function removeMenuPoint($id) :void
    {
        self::where('parent', $id)->update(array('parent' => 0));

        self::find($id)->delete();
    }

    public static function getMenuPointName() :array
    {
        $title = self::all()->first();
        if (!empty($title)) {
            $locale = LaravelLocalization::getCurrentLocale();
            $titles = self::pluck('title', 'id')->all();

            foreach ($titles as $key => $title) {
                $page_names[$key] = json_decode($title)->$locale;
            }
            array_unshift($page_names, Lang::get('nav.root'));

            return $page_names;
        }
        return [Lang::get('nav.root')];
    }

    public function getParent() :string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        if ($this->parent === 0){
            return '';
        }
        $title = self::where('id', $this->parent)->first();
        if (!empty($title)) {
            return json_decode($title->title)->$locale;
        }
    }

    public function maxSortNumber() :int
    {
        return self::max('id');
    }
}
