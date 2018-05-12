@extends('layouts.admin.admin',[
            'page_title'=>"Daily Login Report",
            'filter_option'=>true,
            'filter_option_title' => "Daily Login",
            'datatable'=>true,
            'addButton' => false,
            'theadings' => array('PRODUCTION DATE','EMPLOYEE NO.','EMPLOYEE NAME','LOG IN', 'LOG OUT'),
            'export' => false,
            'modal'=>true
        ])


@section('filter_option')
    @include('layouts.forms.filter_user_datefrom_dateto')
@endsection


@section('datatable')
    @foreach($user_attendance as $login)
        <tr>
            <td>{{ $login->production_date }}</td>
            <td>{{ $login->user->employee_no }}</td>
            <td>{{ $login->user->name }}</td>
            <td>{{ $login->created_at->toTimeString() }}</td>
            <td>{{ $login->updated_at->toTimeString() }}</td>
        </tr>
    @endforeach
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('#snd-mail').click(function(){
            $.get('/email/login/' + $("#email").val(),function(data) {
                console.log(data);
                alert(data);
            })
        })
    })
</script>
@endpush