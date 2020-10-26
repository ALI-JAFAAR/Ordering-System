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

        <div class="row">
            
            @if(count($errors) >0)
            <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $error)              
                      <li>{{$error}}</li>
                    @endforeach
                  </ul>
            </div>
            @endisset
            
            @if(\Session::has('success'))
            
              <div class="alert alert-success">
            
                    <p>{{\Session::get('success')}}</p>
            
              </div>
            
            @endif
            
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <form class="border border-light p-3 custom" method="post" action="{{route('add_user')}}">
            {{csrf_field()}}
            <p class="h4 mb-4 text-center">اظافة مستخدم</p>
            <div class="row">
              <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"> -->

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                  <label for="textInput">اسم الزبون</label>
                  <input required type="text" name="name" id="textInput" class="form-control mb-4" placeholder="اسم الزبون">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                  <label for="textInput">كلمة المرور</label>
                  <input required type="text" name="password" id="textInput" class="form-control mb-4" placeholder="">
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                  <label for="textInput">رقم الزبون</label>
                  <input required type="text" name="phone" id="textInput" class="form-control mb-4" placeholder="رقم الزبون">
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                  <label for="textInput">نوع المستخدم</label>
                  <select required type="text" name="type" id="textInput" class="form-control mb-4" placeholder="">
                    <option></option>
                    <option value="1">موظف</option>
                    <option value="2">مجهز</option>
                  </select>
                </div>
                
              </div>
            <button class="btn btn-info btn-block" type="submit" name="order" style="font-size: 14pt;"> اظافة مستخدم </button>
        </form>
          </div>
      </div>

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
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th style="text-align: center;">اسم الموظف</th>
                    <th style="text-align: center;">رقم الهاتف</th>
                  </tr>
                </tfoot>
                <tbody>
                  @if($usr ??'')
                    @foreach($usr as $row)
                    <tr> 
                      <td style="text-align: center;">{{$row->name}}</td>
                      <td style="text-align: center;">{{$row->phone}}</td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
@endsection