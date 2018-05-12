@extends('layouts.admin.admin',[
            'page_title'=>"Super Admin Table",
            'filter_option'=>false,
            'filter_option_title' => "Upload",
            'datatable'=>true,
            'addButton' => false,
            'theadings' => array('NAME','USERNAME','EMAIL'),
            'export' => false,
            'modal'=>false
        ])


@section('datatable')
        @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->username }}</td>
                <td>{{ $admin->email }}</td>
            </tr>
        @endforeach
@endsection
