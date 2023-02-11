@extends('layouts.app')

@section('content')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Dashboard</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Users</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <a href="{{ route('users.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i></a>
                        <h2 class="card-title">Users</h2>
                    </header>
                    <livewire:users/>
                </section>
            </div>
        </div>
    </section>
@endsection
