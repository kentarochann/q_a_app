@extends('layout')

@section('content')
    <div class="container pt-4">
        <div class="border-top border-bottom h4">
            <div class="pl-3 pt-2 text-danger">質問を編集する</div>
        </div>
        <div class="pl-5">
            <div class="pl-5">
                <div>タイトル：{{ $question->title }}</div>
            </div>
            <div class="pl-5">
                <div>内容：{!! nl2br(e($question->content)) !!}</div>
            </div>
            <div class="d-flex justify-content-end">
                <div class="pr-3">
                {{ $question->formatted_created_at }}
                </div>
            </div>
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
            <form action="{{ route('questions.update', ['question' => $question->id] ) }}" method="post" class="pt-3">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text"  name="title" value="{{ old('title') }}" class="form-control" placeholder="質問タイトルを編集して下さい">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea class="form-control" rows="3" placeholder="質問内容を編集して下さい" name="content">{{ old('content') }}</textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-light">質問を編集する</button>
                </div>
            </form>
            <div class="pt-3">
                <a href="{{ route('questions.show', ['question' => $question->id]) }}">←質問詳細に戻る</a>
            </div>
        </div>
    </div>
@endsection
