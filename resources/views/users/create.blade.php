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
                        <h2 class="card-title">Create User</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                Name
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                Email
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                Phone
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="hidden"id="state_name" name="state_name">
                                State
                                <select name="state_id" id="state_id" readonly class="form-control">
                                    {{-- <option>Choose State</option>
                                    <option value="1">ABIA</option>
                                    <option value="2">ADAMAWA</option>
                                    <option value="3">AKWA IBOM</option>
                                    <option value="4">ANAMBRA</option>
                                    <option value="5">BAUCHI</option>
                                    <option value="6">BAYELSA</option>
                                    <option value="7">BENUE</option>
                                    <option value="8">BORNO</option>
                                    <option value="9">CROSS RIVER</option>
                                    <option value="10">DELTA</option>
                                    <option value="11">EBONYI</option>
                                    <option value="12">EDO</option>
                                    <option value="13">EKITI</option>
                                    <option value="14">ENUGU</option>
                                    <option value="37">FEDERAL CAPITAL TERRITORY</option>
                                    <option value="15">GOMBE</option>
                                    <option value="16">IMO</option>
                                    <option value="17">JIGAWA</option>
                                    <option value="18">KADUNA</option>
                                    <option value="19">KANO</option>
                                    <option value="20">KATSINA</option>
                                    <option value="21">KEBBI</option>
                                    <option value="22">KOGI</option>
                                    <option value="23">KWARA</option>
                                    <option value="24">LAGOS</option>
                                    <option value="25">NASARAWA</option>
                                    <option value="26">NIGER</option>
                                    <option value="27">OGUN</option>
                                    <option value="28">ONDO</option>
                                    <option value="29">OSUN</option>
                                    <option value="30">OYO</option>
                                    <option value="31">PLATEAU</option>
                                    <option value="32">RIVERS</option> --}}
                                    <option value="33" selected>SOKOTO</option>
                                    {{-- <option value="34">TARABA</option>
                                    <option value="35">YOBE</option>
                                    <option value="36">ZAMFARA</option> --}}
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden"id="lga_name" name="lga_name">
                                LGA
                                <select name="lga_id" id="lga_id" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden"id="ward_name" name="ward_name">
                                Ward
                                <select name="ward_id" id="ward_id" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden"id="unit_name" name="unit_name">
                                Polling Unit
                                <select name="unit_id" id="unit_id" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                Role
                                <select name="roles[]" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                Party
                                <select name="party_id" class="form-control">
                                    @foreach ($parties as $party)
                                        <option value="{{ $party->id }}">{{ $party->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                Password
                                <input type="password" name="password" id="" class="form-control">
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
        <script>
            var state = document.querySelector('#state_id');
            var lga = document.querySelector('#lga_id');
            var ward = document.querySelector('#ward_id');
            var unit = document.querySelector('#unit_id');
            let LgaOption = document.createElement('option');
            LgaOption.text = 'Choose LGA';
            lga.add(LgaOption);
            lga.selectedIndex = 0;

            let WardOption = document.createElement('option');
            WardOption.text = 'Choose Ward';
            ward.add(WardOption);
            ward.selectedIndex = 0;

            let UnitOption = document.createElement('option');
            UnitOption.text = 'Choose Polling Unit';
            unit.add(UnitOption);
            unit.selectedIndex = 0;

            state.addEventListener('change', (e) => {
                console.log(state.value);
                var text = state.options[state.selectedIndex].text;
                document.querySelector('#state_name').value = text;
                $.ajax({
                    type: "POST",
                    url: 'https://main.inecnigeria.org/wp-content/themes/independent-national-electoral-commission/custom/views/lgaView.php',
                    data: {
                        state_id: state.value
                    },
                    success: function(data) {
                        let json = JSON.parse(data);
                        $.each(json, (k, v) => {
                            opt = document.createElement('option');
                            opt.value = v.abbreviation; //or i, depending on what you need to do
                            opt.innerHTML = v.name;
                            lga.add(opt);
                        })
                    },
                });
            });

            lga.addEventListener('change', (e) => {
                console.log(lga.value);
                var text = lga.options[lga.selectedIndex].text;
                document.querySelector('#lga_name').value = text;
                $.ajax({
                    type: "POST",
                    url: 'https://main.inecnigeria.org/wp-content/themes/independent-national-electoral-commission/custom/views/wardView.php',
                    data: {
                        state_id: state.value,
                        lga_id: lga.value
                    },
                    success: function(data) {
                        let json = JSON.parse(data);
                        $.each(json, (k, v) => {
                            let opt = document.createElement("option");
                            opt.value = v.id; //or i, depending on what you need to do
                            opt.innerHTML = v.name;
                            ward.add(opt);
                        })
                    },
                });
            });
            ward.addEventListener('change', (e) => {
                console.log(ward.value);
                var text = ward.options[ward.selectedIndex].text;
                document.querySelector('#ward_name').value = text;
                $.ajax({
                    type: "POST",
                    url: 'https://main.inecnigeria.org/wp-content/themes/independent-national-electoral-commission/custom/views/pollingView.php',
                    data: {
                        state_id: state.value,
                        lga_id: lga.value,
                        ward_id: ward.value
                    },
                    success: function(data) {
                        let json = JSON.parse(data);
                        $.each(json, (k, v) => {
                            console.log(v);
                            let opt = document.createElement("option");
                            opt.value = v.id; //or i, depending on what you need to do
                            opt.innerHTML = v.name;
                            unit.add(opt);
                        })
                    },
                });
            });
            unit.addEventListener('change', (e) =>{
                var text = unit.options[unit.selectedIndex].text;
                document.querySelector('#unit_name').value = text;
            })
        </script>
    </section>
@endsection
