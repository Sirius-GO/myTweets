<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MyTweetz</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse bg-primary">
            <div class="container">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand text-white">MyTweetz</a>
                </div>
            </div>
        </nav>
<br><br>
    <div class="container">
        <form class="card" style="padding: 25px;" action="{{route('post.tweet')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
            <div class="form-group">
                <label>Tweet Text</label>
                <input type="text" name="tweet" class="form-control">
            </div>
            <div class="form-group">
                <label>Upload Images</label>
                <input type="file" name="images[]" multiple class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Create Tweet</button>
            </div>
        </form>
    </div>
    <br>
        <div class="container">
            @if(!empty($data))
                @foreach($data as $key => $tweet)
                    <div class="card bg-primary">
                        <h4>
                            {{$tweet['text']}}
                            <i class="fa fa-heart"> </i>: {{$tweet['favorite_count']}}
                            <i class="fa fa-retweet"> </i>: {{$tweet['retweet_count']}}
                        </h4>
                        @if(!empty($tweet['extended_entities']['media']))
                            @foreach($tweet['extended_entities']['media'] as $i)
                                <img src="{{$i['media_url_https']}}" style="width:100px;">
                            @endforeach
                        @endif
                    </div>
                    <br>
                @endforeach
            @else
                <p>No Tweets Found...</p>
            @endif
        </div>
    </body>
</html>
