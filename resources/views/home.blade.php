@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">
                        <strong>Bean of the day</strong> <br />
                        {{ $bean->bean }} <br />
                        <strong>Sale Price</strong> <br />
                        <span id="currency"></span> <br />
                        <strong>Description</strong> <br />
                        {{ $bean->description }} <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
            // These options are needed to round to whole numbers if that's what you want.
            //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
            //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
        });

        var div = document.getElementById('currency')
        div.innerHTML += formatter.format({{ $bean->sale_price }});
    </script>
@endpush
