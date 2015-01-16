@section('main')
    <div class="row island">
        <div class="column-half">
            <div class="title">
                <h1>
                    <a href="{!! route('roles.index') !!}">{!! trans('roles.titles.main') !!}</a>
                    &gt; {!! trans('roles.titles.new') !!}
                </h1>
            </div>
        </div>
    </div>

    @include('partials.errors.display')

    <div class="row">
        @include('roles.form')
    </div>
@stop
