@extends('layout')

@section('content')
    <div class="container pt-4">
        <div class="pb-4">
            <div class="border-bottom h5 pl-3">{{ $question->title }}</div>
            <div class="pl-5">
                <div class="pl-5">
                    <div>{{ $question->content }}</div>
                </div>
                <div class="d-flex justify-content-end pr-3">{{ $question->formatted_created_at }}</div>
            </div>
        </div>
        <div class="p-3 bg-light">
            <h4>回答一覧</h4>
            <div class="container">
                <div>
                    @foreach($answers as $answer)
                        <div class="border rounded mb-2 p-3">
                            <div>{{ $answer->content }}</div>
                            <div class="d-flex justify-content-end">{{ $answer->formatted_created_at }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            <hr>

            <div>
                <a href="{{ route('questions.index') }}">←質問一覧に戻る</a>
            </div>
        </div>

        <div class="pt-5">
            <div class="border-top border-bottom h4">
                <div class="pl-3 pt-2">新しく回答する</div>
            </div>
            <div>
                @if($errors->any())
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $message)
                        <li class="alert alert-warning" role="alert">
                            <div>
                                {{ $message }}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="container">
                <form action="{{ route('questions.answers.store', ['question' => $question]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>回答内容</label>
                        <textarea class="form-control" rows="3" placeholder="回答内容を入力して下さい" name="content">{{ old('content') }}</textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-light">回答する</button>
                    </div>
                    <div class="pt-3">
                        <a href="{{ route('questions.index') }}">←質問一覧に戻る</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
