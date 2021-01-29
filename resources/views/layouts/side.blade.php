<!-- background: linear-gradient(#74ebd5, #ACB6E5); -->
<div class="left-sidebar" style="background: linear-gradient(#74ebd5, #ACB6E5); height: 100%;">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav" style="background-color: #74ebd5; height: 0%;">
            <br>
            <ul id="sidebarnav" style="position: fixed;">
                <br>
                @if(!empty(session('menus')))
                    @foreach(session('menus') as $menu)
                    @if(!empty($menu->url))
                    <li class="white-text">
                        <a href="{{ url('/'.$menu->url) }}" >
                            <i class="{{ $menu->icon }}" ></i>
                            <span class="" >{{ $menu->name }}</span>
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="has-arrow" aria-expanded="false">
                            <i class="{{ $menu['icon'] }}"></i>
                            <span class="hide-menu">{{ $menu['head'] }}</span>
                            <!-- <span class="arrow"></span> -->
                        </a>

                        <ul aria-expanded="false" class="collapse ">
                        @foreach($menu['detail'] as $det)
                            <li>
                                <a href="{{ url('/'.$det->url) }}" class="nav-link ">
                                    <i class="{{ $det->icon }}"></i>
                                    <span class="title">{{ $det->name }}</span>
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </li>
                    @endif
                    @endforeach
                @endif
            </ul>
        </nav>
    </div>
</div>