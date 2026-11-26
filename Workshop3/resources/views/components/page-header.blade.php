@props([
'title',
'description' => null
])

<div class="page-header">
    <div>
        <h1>{{ $title }}</h1>

        @if($description)
        <p>{{ $description }}</p>
        @endif
    </div>

    <div>
        {{$slot}}
    </div>
</div>