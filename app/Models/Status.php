<?php

namespace App\Models;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Models\Status
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Status whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Status whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Status extends Model
{
    use PrepareLangStrForJsonMethods;

    protected $fillable = [
        'title'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function addNewStatus($request): void
    {
        $status = new static;
        $status->fill($request->all());
        $status->title = json_encode($status->createLangString($request, 'title'));
        $status->save();
    }

    public function editStatus($request, $id): void
    {
        $status = self::find($id);
        $status->fill($request->all());
        $status->title = json_encode($status->createLangString($request, 'title'));
        $status->update($request->all());
    }

    public function getStatuses(): array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $titles = self::pluck( 'title', 'id')->all();
        $order_statuses = [];
        foreach($titles as $key => $title){
            $order_statuses[$key] = json_decode($title)->$locale;
        }
        return $order_statuses;
    }

    public function removeStatus($id): void
    {
        self::find($id)->delete();
    }
}
