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
                    <li><span>Result</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">View Result</h2>
                    </header>
                    <div class="card-body">
                        <form action="{{ route('datas.search') }}" method="post">
                            @csrf
                            <div class="form-group">
                                State
                                <select id="state_id" class="form-control">
                                    <option>Choose State</option>
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
                                    <option value="32">RIVERS</option>
                                    <option value="33">SOKOTO</option>
                                    <option value="34">TARABA</option>
                                    <option value="35">YOBE</option>
                                    <option value="36">ZAMFARA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                LGA
                                <select id="lga_id" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                Ward
                                <select  id="ward_id" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                Polling Unit
                                <select name="unit_id" id="unit_id" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <br>
                                <button type="submit" class="btn btn-success">Search</button>
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
                
                $.ajax({
                    type: "POST",
                    url: 'https://inecnigeria.org/wp-content/themes/independent-national-electoral-commission/custom/views/lgaView.php',
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
                $.ajax({
                    type: "POST",
                    url: 'https://inecnigeria.org/wp-content/themes/independent-national-electoral-commission/custom/views/wardView.php',
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
                $.ajax({
                    type: "POST",
                    url: 'https://inecnigeria.org/wp-content/themes/independent-national-electoral-commission/custom/views/pollingView.php',
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
               
            })
        </script>
    </section>
@endsection
