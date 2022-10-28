<div class="question row my-4 h3 mb-5">
    @foreach ($blank_questions as $question)
    <p class="col-12 text mb-3 bg-light me-3" style="line-height: 46px; text-align: justify">
        {{$loop->iteration . '- ' . $question->body}}
    </p>
    <hr>
    @endforeach
</div>