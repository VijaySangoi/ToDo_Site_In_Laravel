<html>
<!---@foreach($incomplete as $ic)
    <form class ="p-0" method="get">
    <a href="{{'/edit/'.$ic->id}}" class ="btn btn-light" name="incomplete" style="width:400px;">
                        {{ $ic->task }}
        </a>
        </form>
    @endforeach--->
<!--- @foreach($complete as $cc)
        <form class="p-0" method="get">
        <a href="{{'/edit/'.$cc->id}}" class="btn btn-light" name="complete" style="width:400px;">
                            {{ $cc->task }}
            </a>
            </form>
        @endforeach--->