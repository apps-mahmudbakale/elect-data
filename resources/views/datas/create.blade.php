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
                    <li><span>Party</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Create Party</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route('parties.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                Name
                                <input type="text" name="name" class="form-control">
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
