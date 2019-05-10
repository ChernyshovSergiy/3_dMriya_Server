<?php

namespace App\Models;

use App\Traits\Methods\BuildJson;
use App\Traits\Methods\ToggleActive;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Models\Content
 *
 * @property int $id
 * @property string $title
 * @property mixed|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Content newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Content newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Content query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Content whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Content whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Content whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Content whereIsActive($value)
 */
class Content extends Model
{
    use BuildJson, ToggleActive;

    protected $fillable = [
        'title',
        'content'
    ];

    protected $hidden = [
        'id',
        'is_active',
        'created_at',
        'updated_at'
    ];

    protected $text_blocks = [
        'headline',
        'sub_headline',
        'text'
    ];

    public function getTextColumnsForTranslate(): array
    {
        return (new static)->text_blocks;
    }

    public function addContent($request): void
    {
//        dd($request->all());
        $text = new static;
        $text->fill($request->all());
        $text->content = $text
            ->setJson($request, $text->text_blocks);
        $text->save();
    }

    public function editContent($request, $id): void
    {
        $text = self::find($id);
        $text->fill($request->all());
        $text->setContent($request, $id);
        $text->update($request->all());
    }

    public function setContent($request, $id): void
    {
        if ($id === null) {
            return;
        }
        $this->content = $this->setJson($request, $this->text_blocks);
        $this->save();
    }

    public function removeContent($id): void
    {
        self::find($id)->delete();
    }
}
