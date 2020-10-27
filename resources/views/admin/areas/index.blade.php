@extends('admin.layouts.app')

@section('title')
    التحكم بالمناطق
@endsection

@section('header')

@endsection

@section('megaMenu')
    <div class="hor-menu hor-menu-light hidden-sm hidden-xs">
        <ul class="nav navbar-nav">
            <!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
            <li class="classic-menu-dropdown" aria-haspopup="true">
                <a href="{{url('admincp')}}"> رئيسية لوحة التحكم
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
            <li class="classic-menu-dropdown active">
                @if(isset($id))
                <a href="{{url('admincp/areas')}}">
                    الدول والمناطق <span class="selected">
                @else
                <a>
                    الدول والمناطق <span class="selected">
                @endif
                    </span>
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
            <li class="classic-menu-dropdown">
                @if(isset($id))
                <a data-target="#addArea" data-toggle="modal">إضافة منطقه جديده
                @else
                <a data-target="#addArea" data-toggle="modal">إضافة دولة جديده
                @endif
                    <i class="fa fa-angle-down"></i>
                </a>

            </li>
        </ul>
    </div>

@endsection

@section('pageHeader')
    <div class="page-bar hidden-md hidden-lg">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{url('/admincp')}}">الرئيسية</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a>الأقسام</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a data-target="#addArea" data-toggle="modal">إضافة منطقه جديده</a>
                <i class="fa fa-angle-left"></i>
            </li>
        </ul>
    </div>

@endsection

@section('content')

    @include('admin.areas.add')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption col-md-9">
                            @if(isset($id))
                            <span><i class="icon-map"></i> عرض المناطق</span>
                            @else
                            <span><i class="icon-map"></i> عرض الدول</span>
                            @endif
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                            <tr>
                                <th>
                                    م
                                </th>
                                <th>
                                    المنطقه
                                </th>
                                <th>
                                    الأدوات
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($areas as $area)
                                @if(isset($id))
                                    @if($area->parent_id == $id)
                                        <tr>
                                            <td>{{$num++}}</td>
                                            <td><a href="{{url('admincp/areas/'.$area->id)}}">{{$area->name}}</a></td>
                                            <td>
                                                <a href="{{url('/admincp/areas/'.$area->id.'/edit')}}"
                                                   class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                                            </td>
                                        </tr>
                                    @endif
                                @elseif($area->parent_id == 0)
                                    <tr>
                                        <td>{{$num++}}</td>
                                        <td><a href="{{url('admincp/areas/'.$area->id)}}">{{$area->name}}</a></td>
                                        <td>
                                            <a href="{{url('/admincp/areas/'.$area->id.'/edit')}}" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->

@endsection

<!-- footer -->
@section('footer')
<script type="text/javascript">

@if(count($errors))
  $('#addArea').modal()
@endif

</script>
@endsection