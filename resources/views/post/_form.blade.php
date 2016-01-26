<!-- Title Form Input -->
<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Form Input -->
<div class="form-group">
    {!! Form::label('content', 'Content:', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Tags Form Input -->
<div class="form-group">
    {!! Form::label('tag_list', 'Tags:', ['class' => 'control-label']) !!}
    {!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control tags-field', 'multiple']) !!}
</div>

<!-- Published_at Form Input -->
<div class="form-group">
    {!! Form::label('published_at', 'Published:', ['class' => 'control-label']) !!}
    {!! Form::input('date', 'published_at', $published_at,
        ['class' => 'form-control']) !!}
</div>

{!! Form::submit($submit_title, ['class' => 'btn btn-primary']) !!}

@section('script')
    <script>
        $(document).ready(function() {
            $('.tags-field').select2({
                tags: true,
                tokenSeparators: [',']
            });
        });
    </script>
@stop
