<!-- Menu Area -->
@props(['mainMenuItems', 'dropDownValue', 'innerMenuItems'])
<div class="main-menu-area">
    <nav class="navbar navbar-expand-lg align-items-start">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

        <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
            <ul class="navbar-nav animated" id="nav">
                @foreach ($mainMenuItems as $item)
                    @if($item->title != 'PAGES')
                        <li class="nav-item @if($item->url == "") active @endif"><a class="nav-link" href="@if($item->url == "") / @elseif($item->url != "" && $item->url != '#') {{ '/' . $item->url }} @else # @endif">@if($item->title == 'SHOES')<span class="karl-level">hot</span>@endif{{ $item->title }}</a></li>
                    @endif
                        @if($loop->index == 0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="karlDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                <div class="dropdown-menu" aria-labelledby="karlDropdown">
                                    @foreach($innerMenuItems as $innerItem)
                                        <a class="dropdown-item" href="@if($innerItem->url == "") / @else {{ '/' . $innerItem->url }} @endif">{{$innerItem->title}}</a>
                                    @endforeach
                                </div>
                            </li>
                        @endif
                @endforeach
            </ul>
        </div>
    </nav>
</div>
