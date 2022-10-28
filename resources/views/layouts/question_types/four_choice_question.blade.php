<div class="question row my-4 h3 mb-5">

    @foreach ($multiselect_questions as $question)
    <p class="question-title col-12 m3-5 " style="line-height: 46px; text-align: justify">
        {{$loop->iteration . '- ' . $question->body}}
    </p>
    <div class="col-md-3 col-sm-12 d-flex align-items-center">
        <input class="form-check-input mb-2 mx-2" type="radio" name="first-question" id="first-answer">
        <label class="form-check-label" for="first-answer">
            1- first option
        </label>
    </div>

    <div class="col-md-3 col-sm-12 d-flex align-items-center">
        <input class="form-check-input mb-2 mx-2" type="radio" name="first-question" id="second-answer">
        <label class="form-check-label" for="second-answer">
            2- second option
        </label>
    </div>

    <div class="col-md-3 col-sm-12 d-flex align-items-center">
        <input class="form-check-input mb-2 mx-2" type="radio" name="first-question" id="third-answer">
        <label class="form-check-label" for="third-answer">
            3- third option
        </label>
    </div>

    <div class="col-md-3 col-sm-12 d-flex align-items-center mb-3">
        <input class="form-check-input mb-2 mx-2" type="radio" name="first-question" id="forth-answer">
        <label class="form-check-label" for="forth-answer">
            4- forth option
        </label>
    </div>
    <hr>
    @endforeach

</div>