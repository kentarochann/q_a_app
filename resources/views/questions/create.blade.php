@extends('layout')

@section('content')
    <div class="container pt-4">
        <div class="border-top border-bottom h4">
            <div class="pl-3 pt-2">新しく質問する</div>
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
            <form  action="{{ route('questions.store') }}" method="post" class="pt-3">
                @csrf
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text"  name="title" value="{{ old('title') }}" class="form-control" placeholder="質問タイトルを入力して下さい">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea class="form-control" rows="3" placeholder="質問内容を入力して下さい" name="content">{{ old('content') }}</textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-light">質問する</button>
                </div>
                <div class="pt-3">
                    <a href="{{ route('questions.index') }}">←質問一覧に戻る</a>
                </div>
            </form>
        </div>
    </div>
@endsection
