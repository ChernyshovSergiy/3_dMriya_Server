<?php

namespace App\Models;

use App\Mail\Order\Printing\VerifyMail;
use App\Traits\Relations\HasOne\Executors;
use App\Traits\Relations\HasOne\Languages;
use App\Traits\Relations\HasOne\Statuses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Lang;
use Mail;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/**
 * App\Models\Printing
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $link
 * @property int $size_id
 * @property int $height
 * @property int $hollow
 * @property int $support
 * @property int $post_processing
 * @property int $material
 * @property int $quality
 * @property int $quantity
 * @property string $country
 * @property string $zip_code
 * @property string|null $state
 * @property string|null $state_abbreviation
 * @property string $city
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string $address
 * @property int $phone
 * @property string|null $verify_token
 * @property int $status_id
 * @property int|null $language_id
 * @property int|null $executor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $executor
 * @property-read \App\Models\Language $language
 * @property-read \App\Models\Status $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereExecutorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereHollow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereMaterial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing wherePostProcessing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereStateAbbreviation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereSupport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereVerifyToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Printing whereZipCode($value)
 * @mixin \Eloquent
 */
class Printing extends Model
{
    use Languages, Statuses, Executors;

    protected $fillable = [
        'name', 'email',
        'link', 'size_id',
        'height', 'hollow',
        'support', 'post_processing',
        'material', 'quality',
        'quantity', 'country',
        'zip_code', 'state',
        'state_abbreviation',
        'city', 'latitude',
        'longitude', 'address',
        'phone', 'status_id',
        'language_id', 'executor_id'
    ];
    protected $hidden = [
        'verify_token'
    ];

    protected $collection_size = [
        1 => '25mm (1") 1:72',
        2 => '40mm (1 1/2") 1:45',
        3 => '54mm (2 1/4") 1:32',
        4 => '60mm (2 1/2") 1:30',
        5 => '70mm (2 3/4") 1:25',
        6 => '75mm (3") 1:24'
    ];
    protected $material_list = [
        1 => 'plastic',
        2 => 'metal'
    ];
    protected $quality_list = [
        1 => '30',
        2 => '50',
        3 => '100',
    ];

    public function setUserLanguage($code): void
    {
        if ($code === null){
            return;
        }
        $this->language_id = Language::where('code', '=', $code)
            ->first()->id;
        $this->save();
    }

    public function setCheckbox($checkbox, $column_name): void
    {
        if ($checkbox === null) {
            return;
        }

        if ($checkbox === true) {
            $this->$column_name = 1;
        } else {
            $this->$column_name = 0;
        }
        $this->save();
    }

    public function generateToken(): void
    {
        $this->verify_token = Str::random(100);
        $this->save();
    }

    public static function addNewPrintingOrder($fields) :void
    {
        $order = new static;
        $order->fill($fields->all());
        $order->size_id = $fields->get('sizeId');
        $order->zip_code = $fields->get('zipCode');
        $order->setUserLanguage($fields->get('cLang'));
        $order->setCheckbox($fields->get('checkboxHollow'), 'hollow');
        $order->setCheckbox($fields->get('checkboxPostProcessing'), 'post_processing');
        $order->setCheckbox($fields->get('checkboxSupport'), 'support');
        $order->status_id = 2;
        $order->save();

        $order->generateToken();
        LaravelLocalization::setLocale($fields->get('cLang'));

        Mail::to($order)->send(new VerifyMail($order));

    }

    public static function adminAddNewPrintingOrder($fields) :void
    {
        $order = new static;
        $order->fill($fields->all());
        $order->save();
    }

    public function editPrintingOrder($request, $id): void
    {
        $order = self::find($id);
        $order->fill($request->all());
        $order->update($request->all());

    }


    public function verifyPrintingOrder($token): void
    {
        $order = self::where('verify_token', $token)->firstOrFail();
        $order->verify_token = null;
        $order->status_id = 3;
        $order->save();
    }

    public static function getConfirmPrintingOrders()
    {

        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
//        $request = $client->get('https://wft-geo-db.p.rapidapi.com/v1/geo/countries');
        $response = $request->getBody();
        $result = json_decode($response, true);
        dd(gettype($result), $result[0]['buy'], $result[1]);
        return self::where('status_id', '>','2')
            ->orderByDesc('created_at')
            ->get();

    }

    public function getStatus()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        return ($this->status_id !== null)
            ? json_decode($this->status->title)->$locale
            : 'don`t have status';
    }

    public function getLangName(): string
    {
        return ($this->language_id !== null)
            ? $this->language->name
            : 'don`t have language';
    }

    public function getExecutor()
    {
        return ($this->executor_id !== null)
            ? $this->executor->name
            : Lang::get('admin.not_assigned');
    }

    public function getCountry($al2){
        $locale = LaravelLocalization::getCurrentLocale();
        if ($locale === 'ua'){
            $lang = 'uk';
        }else{
            $lang = $locale;
        }
        $countries = Country::where(strtolower('lang'), '=', $lang)
//            ->orderBy('country_name')
            ->pluck('country_name', 'country_alpha2_code')
            ->all();
        return $countries[$al2];
    }

    public function getPhone($number): string
    {
        $code_number = Phone::all()
            ->where('country_alpha2_code', '=', $this->country)
            ->first()->code;
        $tel_num = (string)$number;
        return '+'.$code_number.'('
            .substr($tel_num,0,3)
            .') '
            .substr($tel_num,3,3)
            .'-'
            .substr($tel_num,-4,-2)
            .'-'
            .substr($tel_num,8,10);
    }

    public function getAddress(): string
    {
        ($this->zip_code !== null)
            ? $zip = $this->zip_code.' '
            : $zip = '';
        ($this->country !== null)
            ? $country = $this->getCountry($this->country).' ('.$this->country.') '
            : $country = '';
        ($this->state !== null)
            ? $state = $this->state.' '
            : $state = '';
        ($this->state_abbreviation !== null)
            ? $state_abb = '('.$this->state_abbreviation.') '
            : $state_abb = '';
        ($this->city !== null)
            ? $city = $this->city.' '
            : $city = '';
        ($this->address !== null)
            ? $address = $this->address.' '
            : $address = '';
        ($this->phone !== null)
            ? $phone = $this->getPhone($this->phone)
            : $phone = '';
        return $zip.$country.$state.$state_abb.$city.$address.$phone;
    }

    public function getMapLink(): string
    {
        return 'https://www.google.com/maps/place/'.$this->latitude.'+'.$this->longitude;
    }

    public function getSize(): string
    {
        return ($this->size_id !== 0)
            ? $this->collection_size[$this->size_id]
            : $this->height.'mm';
    }

    public function getMaterials(): string
    {
        return ($this->material !== 0)
            ? Lang::get('admin.'.$this->material_list[$this->material])
            : '';
    }

    public function getQuality(): string
    {
        return ($this->quality !== 0)
            ? $this->quality_list[$this->quality].' '.Lang::get('admin.micron')
            : '';
    }

    public function removeOrder($id): void
    {
        self::find($id)->delete();
    }
}
