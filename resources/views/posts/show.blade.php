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
                                        <p class="meta">On {{ date("d.m.Y", strtotime($post->created_at)) }} | By: <a href="{{ url('/user/'.$post->author_id) }}">{{App\User::find($post->author_id)->name}}</a></p>
                                        <div class ="avatar_size">
                                                <img src="{!! URL::asset(DB::table('photos')->where('insertion_id', $post->id)->where('main', 1)->value('url'))!!}" alt="" tabindex="0" />
                                        </div>
                                        <p>{{$post->description}} </p>
                                        <p><a href="{{ url('/posts') }}" class="more-link">Back </a></p>
                                </li>
                        </ul>
                </article>
        </section>

        @foreach(\App\Models\Comment::all() as $comment)
        <br>{{ $comment->author_id }}{{ $comment->message }}
        @endforeach
        <form action="{{$post->id}}/comments" method="POST">
                <br>Добавить комментарий:<br>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <textarea type="comment" name="message"></textarea><br>
                <input type="submit" value="Отправить" /><br>
        </form>

@endsection