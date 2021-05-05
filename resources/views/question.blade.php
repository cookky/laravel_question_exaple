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
    <form method="POST" action="{{ route('page', ['page' => $q['id']]) }}">
        @csrf
        <button type="submit">{{$q["id"]}}</button>
    </form>
    @endforeach

    <br />
    score: {{$score}}
    @foreach($question_all as $q)
    @if($q["id"] == $page)
    <form method="POST" action="{{ route('page', ['page' => $q['id']+1]) }}">
        @csrf
        {{$q["question_name"]}} <br />

        <input type="radio" name="radio_{{$q['id']}}" value="{{$q['result_a']['score']}}" /> {{$q["result_a"]["name"]}} <br />
        <input type="radio" name="radio_{{$q['id']}}" value="{{$q['result_b']['score']}}" /> {{$q["result_b"]["name"]}} <br />
        <input type="radio" name="radio_{{$q['id']}}" value="{{$q['result_c']['score']}}" /> {{$q["result_c"]["name"]}} <br />
        <input type="radio" name="radio_{{$q['id']}}" value="{{$q['result_d']['score']}}" /> {{$q["result_d"]["name"]}} <br />

        <input type="hidden" name="score_all" value="{{$score}}" />
        <input type="hidden" name="question" value="{{$q['id']}}" />
        <input type="submit" value="ตกลง" />
    </form>
    @endif
    @endforeach
</body>

</html>