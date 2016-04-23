@extends('layouts.app')

@section('content')
    <section class="container clearfix">
        <aside role="complementary">
            <h2>{{Lang::get('messages.commercial')}}</h2>
            <p></p>
        </aside>
        <article class="post content">
            <ul class="post-list">
                <li>
                    @if(Auth::check())
                        {!! Form::open(array('action' => ['Insertions\PostsController@create'], 'method' => 'get')) !!}
                        <button type="submit" >{{Lang::get('messages.createNew')}}</button>
                        {!! Form::close() !!}
                    @endif

                    @foreach($posts as $post)
                    <h2><a href="{{ url('/posts/'. $post->id) }}">{{$post->title}}</a></h2>
                    <p class="meta">{{Lang::get('messages.on')}} {{ date("d.m.Y", strtotime($post->created_at)) }} | {{Lang::get('messages.by')}}y: <a href="{{ url('/user/'.$post->author_id) }}">{{App\User::find($post->author_id)->name}}</a></p>
                    <div class="avatar_size">{!! HTML::image(DB::table('photos')->where('insertion_id', $post->id)->value('url')) !!}</div>
                    <div class="size_text"><p>{{$post->description}} </p></div>
                    <p><a href="{{ url('/posts/'. $post->id) }}" class="more-link">{{Lang::get('messages.learnMore')}} </a></p>
                        @if(Auth::check())
                            @if (Auth::user()->id == $post->author_id)
                                {!! link_to_route('posts.edit', 'Edit', $post->id) !!}
                                {!! Form::open(array('action' => ['Insertions\PostsController@destroy', $post->id], 'method' => 'delete')) !!}
                                <button type="submit" >{{Lang::get('messages.delInsertion')}}</button>
                                {!! Form::close() !!}
                            @endif
                        @endif
                    @endforeach
                </li>
            </ul>
        </article>
    </section>
@endsection