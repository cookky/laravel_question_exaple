<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Question</title>
</head>

<body class="antialiased">
    {{$score}}
    @foreach($question_all as $q)
    @if($q["id"] == $question)
    <form method="POST" action="/score">
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