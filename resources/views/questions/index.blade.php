@extends('layout')

@section('content')
    <div class="container pt-4">

        <div class="border-top border-bottom h4">
            <div class="pl-3 pt-2">質問一覧</div>
        </div>
        <div class="text-right pr-2">
            <a href="{{ route('questions.create') }}" type="submit" class="px-5 btn btn-light">新しく質問する</a>
        </div>
        <div class="container">
            <hr class="border-dark mb-0" />
            <ul class="list-group list-group-flush d-flex">
                @foreach($questions as $question)
                    <li
                        class="list-group-item border-dark d-flex justify-content-between"
                    >
                        <div>
                            <a href="{{ route('questions.show', ['question' => $question]) }}">
                                {{ $question->title }}
                            </a>
                        </div>
                        {{-- cretated_atをQuestion.phpにて整形 --}}
                        <div>{{ $question->formatted_created_at }}</div>
                    </li>
                @endforeach
            </ul>
            <hr class="border-dark mt-0" />
        </div>
    </div>
@endsection
