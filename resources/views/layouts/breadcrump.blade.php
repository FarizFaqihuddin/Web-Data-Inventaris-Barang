<!-- <div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-"></i><a href="{{route('dashboard')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        @for($i = 0; $i <= count(Request::segments()); $i++)
        <li>
            <a href="">{{Request::segment($i)}}</a>
            @if($i < count(Request::segments()) & $i > 0)
                {!!'<i class="fa fa-angle-right"></i>'!!}
            @endif
        </li>
        @endfor
    </ul>

</div> -->

<div class="row page-titles">
    <!-- <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3> 
    </div> -->
    <div class="align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Dashboard </a>
            <i class="fa fa-angle-right" style="padding-left: 5px; padding-right: 5px;"></i> 
            </li>
            <!-- <li class="breadcrumb-item active"> -->
                 @for($i = 0; $i <= count(Request::segments()); $i++)
                <li class="active">
                    <a href="">{{Request::segment($i)}}</a>
                    @if($i < count(Request::segments()) & $i > 0)
                        {!!' <i class="fa fa-angle-right" style="padding-left: 5px; padding-right: 5px;"></i> '!!}
                    @endif
                </li>
                @endfor
            <!-- </li> -->
        </ol>
    </div>
</div>
