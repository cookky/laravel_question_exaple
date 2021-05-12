<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Question</title>
</head>

<body class="antialiased">
    page:
    @foreach($question_all as $q)
    <a href="/question/{{$q['id']}}">
        <button type="submit">{{$q["id"]}}</button>
    </a>
    @endforeach

    <br />
    score: {{$score}}
    @foreach($question_all as $q)
    @if($q["id"] == $page)
    <form method="POST" action="/save-score">
        @csrf
        {{$q["question_name"]}} <br />

        @foreach($q['result'] as $result)

        @if($result['score'] == $question_checked['score'])
        <input type="radio" name="radio_{{$q['id']}}" value="{{$result['score']}}" checked /> {{$result["name"]}} <br />
        @else
        <input type="radio" name="radio_{{$q['id']}}" value="{{$result['score']}}" /> {{$result["name"]}} <br />
        @endif

        @endforeach

        <input type="hidden" name="score_all" value="{{$score}}" />
        <input type="hidden" name="question" value="{{$q['id']}}" />
        <input type="submit" value="ตกลง" />
    </form>
    @endif
    @endforeach

    <br>
    @if($page > count($question_all))
    info user
    @endif
</body>

</html>