@extends('layouts.app')

@section('content')
    <section class="container clearfix">
        <aside role="complementary">
            <h2>Addtional info</h2>
            <p>Information for users.</p>
        </aside>
        <article class="post content">
            <ul class="post-list">
                <li>
                    @if(Auth::check())
                        {!! Form::open(array('action' => ['Insertions\PostsController@create'], 'method' => 'get')) !!}
                        <button type="submit" >Create new post</button>
                        {!! Form::close() !!}
                    @endif

                    @foreach($posts as $post)
                    <h2><a href="{{ url('/posts/'. $post->id) }}">{{$post->title}}</a></h2>
                    <p class="meta">On {{ date("d.m.Y", strtotime($post->created_at)) }} | By: <a href="{{ url('/user/'.$post->author_id) }}">{{App\User::find($post->author_id)->name}}</a></p>
                    <div class="avatar_size">{!! HTML::image(DB::table('photos')->where('insertion_id', $post->id)->value('url')) !!}</div>
                    <div class="size_text"><p>{{$post->description}} </p></div>
                    <p><a href="{{ url('/posts/'. $post->id) }}" class="more-link">Reading continued </a></p>
                        @if(Auth::check())
                            @if (Auth::user()->id == $post->author_id)
                                {!! link_to_route('posts.edit', 'Edit', $post->id) !!}
                                {!! Form::open(array('action' => ['Insertions\PostsController@destroy', $post->id], 'method' => 'delete')) !!}
                                <button type="submit" >Delete insertion</button>
                                {!! Form::close() !!}
                            @endif
                        @endif
                    @endforeach
                </li>
            </ul>
        </article>
    </section>
@endsection