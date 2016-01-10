@extends('layouts.app')

@section('content')

    <div class="row row--wide-gutter">
        <div class="col col-sm-6">
            <h1>
                Mailing List
            </h1>

            <mailinglist></mailinglist>
        </div>
        <div class="col col-sm-6">

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

        </div>
    </div>

@stop
