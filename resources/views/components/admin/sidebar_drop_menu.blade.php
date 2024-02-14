@props(['title', 'icon'])
<li class="nav-item">
    <a class="nav-link menu-link" href="#{{$title}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$title}}">
        <i class="{{$icon}}"></i> <span data-key="t-landing">{{$title}}</span>
    </a>
    <div class="collapse menu-dropdown" id="{{$title}}">
        <ul class="nav nav-sm flex-column">
            {{$slot}}
        </ul>
    </div>
</li>