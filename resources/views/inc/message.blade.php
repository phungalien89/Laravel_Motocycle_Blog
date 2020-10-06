@if (count($errors) > 0)
<div id="messagePanel" class="position-absolute left-0" style="height: fit-content; top: 50%; transform: translateY(-50%)">
    @php
        $count = 0;
    @endphp
    @foreach ($errors->all() as $error)
    @php
        $count++;
    @endphp
    <div class="toast" data-delay="{{$count * 2000}}">
        <div class="toast-header bg-danger">
            <span class="font-weight-bold text-white">Message</span>
            <span class="ml-auto close text-white" data-dismiss="toast" style="cursor: pointer">&times;</span>
        </div>
        <div class="toast-body">
            {{$error}}
        </div>
    </div>
    @endforeach
</div>
@endif

@if (session('info'))
<div class="position-absolute" style="top: 50%; left: 0; transform: translateY(-50%); z-index: 1;">
    <div class="toast" data-delay="{{2 * 2000}}">
        <div class="toast-header bg-success">
            <span class="font-weight-bold text-white">Message</span>
            <span class="ml-auto close text-white" data-dismiss="toast" style="cursor: pointer">&times;</span>
        </div>
        <div class="toast-body">
            {{session('info')}}
        </div>
    </div>
</div>
@endif

<script>
    $(document).ready(function(){
        $('.toast').toast({
            animation: true,
            autohide: true
        });
        $('.toast').toast('show');
    });
</script>

