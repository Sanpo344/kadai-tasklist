@extends('layouts.app')

@section('content')
    @if (Auth::check())
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
                        <td>{!! nl2br(e($tasks->status)) !!}</td>
                        <td>{!! nl2br(e($tasks->content)) !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    {!! link_to_route('tasks.create', 'タスクを追加', [], ['class' => 'btn btn-primary']) !!}
    @endif

@endsection