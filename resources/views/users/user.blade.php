@extends('layouts.app')

@section('content')
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
                <button><a href="{{ url('/upload') }}" role="button">{{Lang::get('messages.addAvatar')}}</a>.</button>
            @endif
            <br><h2>{{Lang::get('messages.karma')}}:</h2>
            <div>
                {{$user->karma}}
            </div>

            <br><h2>{{Lang::get('messages.sex')}}:</h2>
            <div>
                {{$user->sex}}
            </div>

            <br><h2>{{Lang::get('messages.country')}}:</h2>
            <div>
                {{$user->country}}
            </div>

            <br><h2>{{Lang::get('messages.phone')}}:</h2>
            <div>
                {{$user->phone}}
            </div>
        </aside>
        <article class="post content">
            <ul class="post-list">
                <li>
                    @if (($user->id)!=(Auth::user()->id))
                        {{Lang::get('messages.addFeedback')}}
                        @include('users.feedback')
                    @endif
                </li>
                <li>
                    <h2>{{Lang::get('messages.feedbacks')}}: </h2>
                    @foreach(\App\Models\Feedback::all() as $feedback)
                        @if ($feedback->user_id == $user->id)
                            @if($feedback->author_id == DB::table('users')->where('id',$feedback->author_id)->value('id'))
                                <br><h3>{{DB::table('users')->where('id',$feedback->author_id)->value('name', 'last_name')}}</h3>
                            @endif
                            <br>{{ $feedback->message }}
                            <br><h4>{{Lang::get('messages.karma')}}: {{$feedback->karma}}</h4>
                        @endif
                    @endforeach
                </li>
            </ul>
        </article>
@stop