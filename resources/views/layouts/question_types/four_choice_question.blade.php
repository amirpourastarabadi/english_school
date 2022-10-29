<div class="question row my-4 h3 mb-5">

    @foreach ($multiselect_questions as $question)
    <p class="question-title col-12  mt-4" style="line-height: 46px; text-align: justify">
        {{$loop->iteration . '- ' . $question->body}}
    </p>

    @foreach ($question->answers as $answer)
    <div class="col-md-3 col-sm-12 d-flex align-items-center">
        <input class="form-check-input mb-2 mx-2" type="radio" name="{{$question->getKey()}}" id="{{$answer->getKey()}}" value="{{$answer->getKey()}}">
        <label class="form-check-label" for="{{$answer->getKey()}}">
            {{$loop->iteration . '- ' . $answer->body}}
        </label>
    </div>
    @endforeach
    <hr class="mt-4">

    @endforeach

</div>