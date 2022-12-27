<x-mail::message>
{{-- Приветствие --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Упс!')
@else
# @lang('Привет!')
@endif
@endif

{{-- Вступительные строки --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Кнопка действия --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Конечные линии --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Приветствие --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('С Уважением')<br>
Ackap Maemgenov
@endif

{{-- Подкопировать --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "Если у вас возникли проблемы с нажатием кнопки \":actionText\" , скопируйте и вставьте URL ниже\n".
     'в ваш веб-браузер:',
         [
        'actionText' => $actionText,
         ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>
