@extends('layouts.app')

@section('content')
    {{--{{$user}}--}}
    {{--<img src="{{App\Models\Photo::where('user_id', $user->id)->first()->url}}" alt="">--}}
    {{--<div class="avatar_size"><img src="http://localhost/laravel.bookcross/storage/avatars/1.jpg" alt=""></div>--}}
        <aside role="complementary">
            <h2>{{$user->name}} {{$user->last_name}}</h2>
            <div class="avatar_size">
                @if(DB::table('photos')->where('user_id',$user->id)->value('user_id') == $user->id)
                {!! HTML::image('storage/avatars/'.$user->id.'.jpg') !!}
                    @else
                    {!! HTML::image('storage/avatars/0.jpg') !!}
                @endif
            </div>
            <br>
            @if (($user->id)==(Auth::user()->id))
                Add new avatar: <a href="{{ url('/upload') }}" role="button">tap here</a>.
            @endif
            <br><h2>Personal karma:</h2>
            <div>
                {{$user->karma}}
            </div>

            <br><h2>Sex:</h2>
            <div>
                {{$user->sex}}
            </div>

            <br><h2>Country:</h2>
            <div>
                {{$user->country}}
            </div>

            <br><h2>Tel.:</h2>
            <div>
                {{$user->phone}}
            </div>
        </aside>
        <article class="post content">
            <ul class="post-list">
                <li>
                    @if (($user->id)!=(Auth::user()->id))
                        Would you like to leave a feedback about this person?
                        @include('users.feedback')
                    @endif
                </li>
                <li>
                    <h2>Feedbacks: </h2>
                    @foreach(\App\Models\Feedback::all() as $feedback)
                        @if ($feedback->user_id == $user->id)
                            @if($feedback->author_id == DB::table('users')->where('id',$feedback->author_id)->value('id'))
                                <br><h3>{{DB::table('users')->where('id',$feedback->author_id)->value('name', 'last_name')}}</h3>
                            @endif
                            <br>{{ $feedback->message }}
                        @endif
                    @endforeach
                </li>
            </ul>
        </article>
@stop