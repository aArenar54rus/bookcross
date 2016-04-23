@extends('layouts.app')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div>
                    @if(Auth::check())
                        <section role="banner">

                            <article role="main" class="clearfix">
                                <div class="post">
                                    <h2>{{Lang::get('messages.welcome')}}</h2>
                                    <h1>You are logged in!</h1>
                                    <p>Now you can:</p>
                                    <ul>
                                        <li>Use adverts system!</li>
                                        <li>Magnificent blog/</li>
                                    </ul>
                                    <a href="page.html" class="button left">Learn more...</a>
                                </div>
                            </article>
                        </section> <!-- // banner ends -->
                    @else

                        <section role="banner">
                            <hgroup>
                                <h1>This is main page.</h1>
                                <h2>More faster and stronger.</h2>
                            </hgroup>
                        <article role="main" class="clearfix">
                            <div class="post">
                                <h2>{{Lang::get('messages.welcome')}}</h2>
                                <p>{{Lang::get('messages.inThisSite')}}</p>
                                <a href="page.html" class="button left">{{Lang::get('messages.learnMore')}}<span class="icon">:</span></a>
                            </div>
                            <aside role="complementary">
                                <a href="#demo-url"><img src="http://lorempixel.com/420/290/nature/" alt="Lorem ipsum dolor..."></a>
                            </aside>
                        </article>
                        </section>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
