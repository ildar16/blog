@extends(config('settings.theme').'.layouts.site')

@section('navigation')
    {!! $navigation or "" !!}
@endsection


@section('content')
    <div id="content-index" class="content group">
        <img class="error-404-image group" src="{{ asset(config('settings.theme')) }}/images/features/404.png"
             title="Error 404" alt="404"/>
        <div class="error-404-text group">
            <p>We are sorry but the page you are looking for does not exist.<br/>You could <a href="index.html">return
                    to the home page</a> or search using the search box below.</p>

        </div>

        <form method="POST" id="searchform" action="/search" role="search">
            {{ csrf_field() }}
            <label class="screen-reader-text" for="s">Search for:</label>
            <input type="text" value="" name="q" id="s"/>
            <input type="submit" id="searchsubmit" value="Search"/>

        </form>

        <div class="container" style="text-align: center;">
            @if(isset($details))
                <h2>The Search results for your query <b> {{ $query }} </b> are :</h2>
                <table class="table table-striped" style="margin-left:auto; margin-right:auto;">
                    <thead>
                    <tr>
                        <th>Title</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $article)
                        <tr>
                            <td><a href="{{ route('articles.show',['alias'=>$article->alias]) }}">{{$article->title}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
                @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                @endif
        </div>
    </div>

@endsection

@section('footer')
    @include(config('settings.theme').'.footer')
@endsection