@extends('admin.layouts.master')
@section('page')
    Users
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Users</h4>
                    <p class="category">List of all registered users</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered at</th>
                            {{-- <th>Status</th> --}}
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)


                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            {{-- <td><span class="label label-success">Active</label></td> --}}
                            <td>
                                <button class="btn btn-sm btn-success ti-close" title="Block User"></button>

                                <a href="{{route('users.detail',$user->id)}}"><button class="btn btn-sm btn-primary ti-view-list-alt"
                                        title="Details"></button></a>
                            </td>
                        </tr>
                        @endforeach



                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
