@extends('layout')

@section('content')
    <div class="main_container">
        <h2>新しく回答する</h2>
        <div class="create_container">
            <div class="answer_form">
                @if($errors->any())
                    <div>
                        <ul>
                            @foreach($errors->all() as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('questions.answers.store', ['question' => $question]) }}" method="post">
                    @csrf
                    <div class="answer_content">
                        <h2 >回答内容 :</h2><br>
                        <textarea type="text" name="content">{{ old('content') }}</textarea>
                    </div>
                    <div class="answer_submit">
                        <button type="submit">追加する</button>
                    </div>
                    <a href="{{ route('questions.show', ['question' => $question]) }}">
                        ←質問詳細に戻る
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
