<h2>Dailty Time Record : {{ \Carbon\Carbon::today()->toDateString() }}</h2>

<table>
<tr>
    <th width="200px">Employee No.</th>
    <th width="200px" align="left">Employee Name</th>
    <th width="200px">Login</th>
    <th width="200px">Logout</th>
</tr>

@foreach($data as $user)
    <tr>
        <td width="200px" align="center">{{ $user->user->employee_no }}</td>
        <td width="200px">{{ $user->user->name }}</td>
        <td width="200px" align="center">{{ $user->created_at->toTimeString() }}</td>
        <td width="200px" align="center">{{ $user->updated_at->toTimeString() }}</td>
    </tr>
@endforeach
</table>


