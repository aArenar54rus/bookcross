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
                    <h2>{{$advert->title}}</h2>
                    <h4>{{$advert->year}}</h4>
                    <h5>Genre:{{$advert->genre}}</h5>
                    <h5>Publishing house:{{$advert->publishing_house}}</h5>
                    <p class="meta">{{Lang::get('messages.on')}} {{ date("d.m.Y", strtotime($advert->created_at)) }} | {{Lang::get('messages.by')}}: <a href="{{ url('/user/'.$advert->author_id) }}">{{App\User::find($advert->author_id)->name}}</a></p>
                    <div class ="avatar_size">
                        <div id="gallery1">
                            <img src="{!! URL::asset(DB::table('photos')->where('advert_id', $advert->id)->where('main', 1)->value('url'))!!}" alt="" tabindex="0" />
                            <img src="{!! URL::asset(DB::table('photos')->where('advert_id', $advert->id)->where('main', 0)->value('url'))!!}" alt="" tabindex="0" /><div></div>
                        </div>
                    </div>
                    <p>{{$advert->description}} </p>
                    <p><a href="{{ url('/adverts') }}" class="more-link">{{Lang::get('messages.back')}} </a></p>
                </li>
            </ul>
        </article>
    </section>
@endsection