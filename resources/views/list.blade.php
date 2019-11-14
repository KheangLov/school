@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6">
              Users list
            </div>
            <div class="col-md-6 text-right">
              <a href="{{ route('user_add') }}" class="btn btn-primary">{{ __('Add User') }}</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
          @endif
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 0
              @endphp
              @foreach ($users as $user)
                @php
                  $i++
                @endphp
                <tr>
                  <th>{{ $i }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    <span class="badge badge-dark">{{ ucfirst($user->role_name) }}</span>
                  </td>
                  <td>
                    <a href="{{ route('user_edit', ['id' => $user->id]) }}" class="btn btn-secondary">{{ __('Edit') }}</a>
                    <a href="{{ route('user_delete', ['id' => $user->id]) }}" class="btn btn-danger">{{ __('Delete') }}</a>
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
