@extends('layouts.app')

@section('content')
        <section class="container clearfix">
                {{--        <aside role="complementary">
                            <h2>Addtional info</h2>
                            <p>Information for users.</p>
                        </aside>--}}
                <article class="post content">
                        <ul class="post-list">
                                <li>
                                        <h2>{{$post->title}}</h2>
                                        <p class="meta">On {{ date("d.m.Y", strtotime($post->created_at)) }} | {{Lang::get('messages.by')}}: <a href="{{ url('/user/'.$post->author_id) }}">{{App\User::find($post->author_id)->name}}</a></p>
                                        <div class ="avatar_size">
                                                <img src="{!! URL::asset(DB::table('photos')->where('insertion_id', $post->id)->where('main', 1)->value('url'))!!}" alt="" tabindex="0" />
                                        </div>
                                        <p>{{$post->description}} </p>
                                        <p><a href="{{ url('/posts') }}" class="more-link">{{Lang::get('messages.back')}} </a></p>
                                </li>
                                @foreach(\App\Models\Comment::all() as $comment)
                                        <li>
                                        <br><h4>{!! DB::table('users')->where('id', $comment->author_id)->value('name')!!}</h4>
                                                <br>{{ $comment->message }}
                                        </li>
                                @endforeach
                                <li>
                                        <form action="{{$post->id}}/comments" method="POST">
                                                <br>{{Lang::get('messages.addComment')}}:<br>
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <textarea type="comment" name="message"></textarea><br>
                                                <input type="submit" value="{{Lang::get('messages.submit')}}" /><br>
                                        </form>
                                </li>
                        </ul>
                </article>
        </section>
@endsection