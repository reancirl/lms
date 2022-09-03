@extends('layouts.app')

@section('content')
    
    <section class="content">
        <h1>Create School Years</h1>
        <form action="{{ route('time.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col">
                    <select name="start_hour" id="start_hour" class="form-control">
                        <option value="">-- Select Start Hour --</option>
                        @for($i = 1; $i <= 12; $i++)
                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT); }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT); }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col">
                    <select name="start_minute" id="start_minute" class="form-control">
                        <option value="">-- Select Start Minute --</option>
                        @for($i = 0; $i <= 59; $i++)
                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT); }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT); }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col">
                    <select name="start_am_pm" id="start_am_pm" class="form-control">
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="end_hour" id="end_hour" class="form-control">
                        <option value="">-- Select End Hour --</option>
                        @for($i = 1; $i <= 12; $i++)
                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT); }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT); }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col">
                    <select name="end_minute" id="end_minute" class="form-control">
                        <option value="">-- Select End Minute --</option>
                        @for($i = 0; $i <= 59; $i++)
                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT); }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT); }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col">
                    <select name="end_am_pm" id="end_am_pm" class="form-control">
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>        
    </section>
@endsection
