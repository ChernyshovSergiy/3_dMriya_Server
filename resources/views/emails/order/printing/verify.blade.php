@component('mail::message')
# @lang(Lang::get('mail.printing_order_confirmation'))

# @lang(Lang::get('mail.hello').' '.$print_order->name)!<br>
@lang(Lang::get('mail.your_make_printing_order'))<br>
@lang(Lang::get('mail.click_to_link_modeling_order'))<br>
@component('mail::button', ['url' => env('FRONT_URL').'printing_order/'.$print_order->verify_token])
    {{ Lang::get('mail.verify_modeling_order')  }}
@endcomponent
@lang(Lang::get('mail.thank_for_using'))<br>
@lang(Lang::get('mail.order_number').' ')

# @lang(' PRG-'.$print_order->id)<br>

@lang(Lang::get('mail.did_not_order'))<br>

@lang(Lang::get('mail.regards'))!<br>
{{ Lang::get('mail.3dmriya') }}

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    Lang::get('mail.trouble_clicking')."\":actionText\"".Lang::get('mail.copy_and_paste')."\n".
    Lang::get('mail.into_browser').' [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)
@endslot
@endisset
@endcomponent
