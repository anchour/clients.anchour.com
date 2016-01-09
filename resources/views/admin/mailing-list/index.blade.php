@extends('layouts.app')

@section('content')
    
    <ul>
        <li>
            <a href="{{ route('admin.mailing-list.index') }}">Mailing List</a>

            <ul>
                <li>
                    <a href="{{ route('admin.mailing-list.new.get') }}">Add new</a>
                </li>
            </ul>
        </li>
    </ul>

@stop
