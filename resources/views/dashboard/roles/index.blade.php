@extends('dashboard.layouts.master')
@section('title', __('dashboard.roles'))
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!---Internal  Owl Carousel css-->
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <!--- Internal Sweet-Alert css-->
    <link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
    <style>
        .link-icon-edit:link,
        .link-icon-edit:visited{
            text-decoration: none;
            background: #2BEE2B;
            padding: 2px 4px;
            color: #000;
            border-radius: 5px;
            font-size: 1.3rem;
            text-align: center;
            display: inline-block;
            margin: 0 10px;
        }
        .link-icon-edit:hover{
            transform: scale(1.2);
            background: #2ad02a;
        }

        .link-icon-delete:link,
        .link-icon-delete:visited{
            text-decoration: none;
            background: #e91d1d;
            padding: 2px 4px;
            color: #fff;
            border-radius: 5px;
            font-size: 1.3rem;
            text-align: center;
            display: inline-block;
            margin: 0 10px;
        }
        .link-icon-delete:hover{
            transform: scale(1.2);
            background: #D71A1A;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('dashboard.manage-users')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('dashboard.roles')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">@lang('dashboard.roles')</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-5p border-bottom-0"> # </th>
                                <th class="wd-15p border-bottom-0"> @lang('dashboard.roles') </th>
                                <th class="wd-15p border-bottom-0">@lang('dashboard.number')</th>
                                <th class="wd-10p border-bottom-0">@lang('dashboard.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $i =1;
                            @endphp
                            @foreach($roles as $row)
                            <tr>
                                <td>{{$i++ }}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->users_count}}</td>
                                <td class="text-center">
                                    <a class="link-icon-edit" href="{{route('dashboard.roles.edit', $row->id)}}"><i class="fe fe-edit"></i></a>
                                    <a class="link-icon-delete" data-target="#modaldemo{{$row->id}}" data-toggle="modal" href="#"><i class="las la-trash-alt"></i></a>
                                </td>

                                <div class="modal" id="modaldemo{{$row->id}}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content tx-size-sm">
                                            <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                <h4 class="tx-danger mg-b-20">@lang('dashboard.are-you-sure-to-delete-this')</h4>
                                                <p class="mg-b-20 mg-x-20">@lang('dashboard.you-can-not-restore-it-again')</p><a aria-label="Close" onclick="event.preventDefault(); document.getElementById('delete-form-{{$row->id}}').submit();"  class="btn ripple btn-danger pd-x-25" data-dismiss="modal" type="button">@lang('dashboard.yes')</a>
                                            </div>
                                        </div>
                                    </div>
                                    <form id="delete-form-{{$row->id}}" action="{{route('dashboard.roles.destroy', $row->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </div>


                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <!--Internal  Sweet-Alert js-->
    <script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
    <!-- Sweet-alert js  -->
    <script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/sweet-alert.js')}}"></script>
@endsection
