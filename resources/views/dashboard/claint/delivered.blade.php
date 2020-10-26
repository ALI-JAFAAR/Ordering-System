@extends('layouts.app')

@section("content")


<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item">Tables</li>
        </ol>
        <!-- DataTables Example -->
        <div class="mb-3">
          <div class="card-header" style="text-align: center;font-size: 18pt;font-weight: bold;">
            <i class="fas fa-table fa-spin"></i>
            الطلبات</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                <thead>
                  <tr>
                    <th style="text-align: center;">اسم الزبون</th>
                    <th style="text-align: center;">رقم الطلب</th>
                    <th style="text-align: center;">رقم هاتف الزبون</th>
                    <th style="text-align: center;">العنوان</th>
                    <th style="text-align: center;">اقرب نقطة دالة</th>
                    <th style="text-align: center;">المبلغ بدون توصيل</th>
                    <th style="text-align: center;">المبلغ مع التوصيل</th>
                    <th style="text-align: center;">المنتجات</th>
                    <th style="text-align: center;">اسم الموظف</th>
                    <th style="text-align: center;">رقم هاتف الموظف</th>
                    <th style="text-align: center;">الملاحظات</th>
                    <th style="text-align: center;">تاريخ الطلب</th>
                    <th style="text-align: center;">حذف</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th style="text-align: center;">اسم الزبون</th>
                    <th style="text-align: center;">رقم الطلب</th>
                    <th style="text-align: center;">رقم هاتف الزبون</th>
                    <th style="text-align: center;">العنوان</th>
                    <th style="text-align: center;">اقرب نقطة دالة</th>
                    <th style="text-align: center;">المبلغ بدون توصيل</th>
                    <th style="text-align: center;">المبلغ مع التوصيل</th>
                    <th style="text-align: center;">المنتجات</th>
                    <th style="text-align: center;">اسم الموظف</th>
                    <th style="text-align: center;">رقم هاتف الموظف</th>
                    <th style="text-align: center;">الملاحظات</th>
                    <th style="text-align: center;">تاريخ الطلب</th>
                    <th style="text-align: center;">حذف</th>
                  </tr>
                </tfoot>
                <tbody>
                    
                      @foreach($data as $row)
                          
                        @php 
                        	$prc =0;
                        	$len = count($row->total);
                    	@endphp	

	                    @for($i=0; $i < $len; $i++)
	                    @php
	                    	$prc+= intval($row->total[$i]) * intval($row->count[$i])
	                    @endphp
	                    @endfor
                  
                  <tr>
                    <td style="text-align: center;">{{$row->name}}</td>

                    <td style="text-align: center;">{{$row->id}}</td>

                    <td style="text-align: center;">{{$row->phone}}</td>
                    
                    <td style="text-align: center;">{{$row->address}}</td>
                    
                    <td style="text-align: center;">{{$row->point}}</td>

                    <td style="text-align: center;">{{$prc}}</td>
                    
                    <td style="text-align: center;">{{$prc + $row->del_count}}</td>
                    <td style="text-align: center;">{{ $row->item }}</td>
                    <td style="text-align: center;">{{$row->user->name}}</td>
                    <td style="text-align: center;">{{$row->user->phone}}</td>
                    
                    <td style="text-align: center;">{{$row->notes}}</td>
                    
                    <td style="text-align: center;">{{$row->created_at}}</td>

                    <td>
                    	<a class="btn btn-secondary"  href="{{ route('status2',['id' =>$row['id']]) }}">تغيير الحالة</a>
                    </td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>








@endsection