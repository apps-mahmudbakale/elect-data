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
                    <li><a href="{{ route('parties.index') }}">Party</a></li>
                    <li><span>Edit Party</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Edit Party</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route('parties.update', $party->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                Name
                                <input type="text" name="name" value="{{ old('name', isset($party) ? $party->name : '') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <br>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>

                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
