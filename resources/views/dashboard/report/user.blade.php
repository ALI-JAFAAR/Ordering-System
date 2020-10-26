@extends('layouts.app')

@section("content")
<div class="flex-center position-ref full-height" style="width: 100%">
    <!-- Sidebar -->
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
          </li>

        </ol>

        <form class="border border-light p-3 custom" method="post" action="{{route('user_report')}}">
          {{csrf_field()}}
            <p class="h4 mb-4 text-center">انشاء تقرير</p>
            <div class="row" >
              <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"> -->
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                  <label for="textInput">اسم المستخدم</label>
                  <select  name="user_id" id="textInput" class="form-control mb-4">
                    <option></option>
                    @foreach($data as $row)
                      <option value="{{$row->id}}">{{$row->name}}</option>                  
                    @endforeach
                  </select>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                  <label for="textInput">تايخ البداية</label>
                  <input type="date" name="from" id="textInput" class="form-control mb-4">
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                  <label for="textInput">تاريخ الانتهاء</label>
                  <input type="date" name="to" id="textInput" class="form-control mb-4" >
                </div>
              <!-- </div> -->
            </div>
            <button class="btn btn-info btn-block" type="submit" name="add" style="font-size: 14pt;color: #dc3545;">حفظ</button>
        </form>

        <!-- DataTables Example -->
        <div class="mb-3">
          <div class="card-header" style="text-align: center;font-size: 18pt;font-weight: bold;">
            <i class="fas fa-table"></i>نتائج البحث</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                <thead>
                  <tr>
                    <th style="text-align: center;">اسم الموظف</th>
                    <th style="text-align: center;">رقم الهاتف</th>
                    <th style="text-align: center;">عدد الطلبات</th>
                    <th style="text-align: center;">المبلغ الكلي</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th style="text-align: center;">اسم الموظف</th>
                    <th style="text-align: center;">رقم الهاتف</th>
                    <th style="text-align: center;">عدد الطلبات</th>
                    <th style="text-align: center;">المبلغ الكلي</th>
                  </tr>
                </tfoot>
                <tbody>
                  
                  @if($re ??'')
                    
                      @php 
                        $tot=0;
                        $user='';
                        $phone=''; 
                        $rows= count($re)

                      @endphp
                      @foreach($re as $data)
                      @php
                        $len = count($data->total); 
                      @endphp
                        @for($i=0; $i < $len; $i++)
                          
                          @php
                            $user   = $data->user->name;
                            $phone  = $data->user->phone;
                            $tot=$tot + intval($data->total[$i]);
                          @endphp

                        @endfor

                      @endforeach
                  
                  <tr> 
                    <td style="text-align: center;">{{$user}}</td>
                    <td style="text-align: center;">{{$phone}}</td>
                    <td style="text-align: center;">{{$rows}}</td>
                    <td style="text-align: center;">{{$tot}}</td>
                  </tr>

                @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>


          </div>
        </div>
      </div>
@endsection