<P>Hello! {{ $inviter }} invites you to join our site.</P>
@if ($message_text != '')
    <P>
        He also sends you following message:<BR>
        {{ $message_text }}
    </P>
@endif
<P>
    You can join our site by clicking the following link:

    <A href="{{ url('auth/register/?code='$code) }}">{{ url('auth/register/?code=' . $code) }}</A>
</P>