@component('mail::message')
    Bonjour ! **{{$name}}**, tu es maintenant membre de **{{$house}}** {{-- use double space for line break --}}
    La répartition des systèmes a été effectuée, et tu as été

    Click below to start working right now
    @component('mail::button', ['url' => $link])
        Go to your inbox
    @endcomponent
    Sincerely,
    Mailtrap team.
@endcomponent
