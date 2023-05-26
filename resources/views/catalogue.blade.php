@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Bean</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price/Unit</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <script>
        $(function() {
            $('.table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('catalogue') }}",
                columns: [
                    {
                        data: 'bean',
                        name: 'bean'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'sale_price',
                        name: 'sale_price',
                        render: $.fn.dataTable.render.number( ',', '.', 2, '$' )
                    },
                ]
            })
        })
    </script>
@endpush
