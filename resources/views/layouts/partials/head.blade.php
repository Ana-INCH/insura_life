<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Insura Connect')</title>
<link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
{{-- <link rel="stylesheet" href="{{ asset('css/base.css') }}"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
.table-striped > tbody > tr:nth-of-type(odd) > * {
    background-color: rgba(78, 115, 223, 0.05) !important;
}

.icon-circle {
    transition: transform 0.2s ease !important;
}

tr:hover .icon-circle {
    transform: scale(1.1) !important;
}

.table {
    --bs-table-hover-bg: rgba(78, 115, 223, 0.1) !important;
}

.bg-primary {
    background: linear-gradient(135deg, #2c3e50 10%, #5e6367 100%) !important;
}

.badge.bg-success {
    background-color: #1cc88a !important;
    padding: 6px 10px !important;
    font-weight: 500 !important;
}

.badge.bg-danger {
    background-color: #e74a3b !important;
    padding: 6px 10px !important;
    font-weight: 500 !important;
}

.badge.bg-secondary {
    padding: 6px 10px !important;
    font-size: 0.85em !important;
}

.table-bordered {
    border-radius: 10px !important;
    overflow: hidden !important;
    border-collapse: separate !important;
}

.btn.edit-supplier {
    background-color: #36b9cc !important;
    color: white !important;
    margin-right: 5px !important;
    border-radius: 5px !important;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
    transition: all 0.2s ease-in-out !important;
}

.btn.delete-supplier {
    background-color: #e74a3b !important;
    color: white !important;
    border-radius: 5px !important;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
    transition: all 0.2s ease-in-out !important;
}

a[href^="mailto:"] {
    text-decoration: none !important;
    color: #4e73df !important;
}

</style>
@stack('styles')
