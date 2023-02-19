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
                    <li><span>Parties</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <a href="{{ route('parties.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i></a>
                        <h2 class="card-title">Parties</h2>
                    </header>
                    <livewire:parties/>
                </section>
            </div>
        </div>
    </section>
@endsection
