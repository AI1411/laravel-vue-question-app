@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>新規作成</h2>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">一覧に戻る</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <form action="{{ route('questions.store') }}" method="post">
                            @include('questions._form', ['buttonText' => '新規作成'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
