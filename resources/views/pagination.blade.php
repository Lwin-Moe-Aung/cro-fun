
@if($projects['data']['last_page']>1)
    <ul class="pager">

        @if($projects['data']['current_page']>1)
            <li class="previous">
                <a href="{{ url('projects/page',$projects['data']['current_page']-1) }}#project">&larr; Previous</a>
            </li>
        @endif

        @for($i=1;$i<=$projects['data']['last_page'];$i++)
            @if($projects['data']['current_page']==$i)

                <li>
                    <a style="background-color:#eee;color:black;pointer-events:none;" href="{{ url('projects/page',$i) }}#project">{{$i}}</a>
                </li>

            @else

                <li>

                    <a href="{{ url('projects/page',$i) }}#project">{{$i}}</a>


                </li>

            @endif
        @endfor
        @if($projects['data']['current_page']<$projects['data']['last_page'])
            <li class="next">
                <a href="{{ url('projects/page',$projects['data']['current_page']+1) }}#project">Next &rarr;</a>
            </li>
        @endif

    </ul>
@endif


