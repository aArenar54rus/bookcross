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
                            <hgroup>
                                <h1></h1>
                                <h2>Even the icons used are texts icons, easier to use/customize and load page faster.</h2>
                            </hgroup>
                            <article role="main" class="clearfix">
                                <div class="post">
                                    <h2>Welcome!</h2>
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
                                <h2>Welcome</h2>
                                <p>In this site you and your friends can buy, sell or exchange your favorite books, magazines or etc.</p>
                                <a href="page.html" class="button left">Learn more <span class="icon">:</span></a>
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
