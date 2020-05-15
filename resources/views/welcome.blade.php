@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <div class="col-sm-12">
                @if (count($tasks) > 0)
                    <h1>タスク管理一覧</h1>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Status</th>
                                <th>Task</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                                <td>{!! nl2br(e($task->status)) !!}</td>
                                <td>{!! nl2br(e($task->content)) !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tasks->links('pagination::bootstrap-4') }}
                @endif
                {!! link_to_route('tasks.create', 'タスクを追加', [], ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection