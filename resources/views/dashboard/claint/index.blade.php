@extends('layouts.app')

@section("content")
<div class="flex-center position-ref full-height">
    <!-- Sidebar -->
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
          </li>
          <li class="breadcrumb-item">Overview</li>

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
            <form class="border border-light p-3 custom" method="post" action="{{route('claint')}}">
            {{csrf_field()}}
            <p class="h4 mb-4 text-center">طلب جديد</p>
            <div class="row">
              <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"> -->

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <label for="textInput">اسم الزبون</label>
                  <input required type="text" name="name" id="textInput" class="form-control mb-4" placeholder="اسم الزبون">
                </div>

                <!--<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">-->
                  <!--<label for="textInput">رقم الطلبية</label>-->
                  <input  type="hidden" name="ord_num" id="textInput" class="form-control mb-4" value="">
                <!--</div>-->

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                  <label for="textInput">رقم الزبون</label>
                  <input required type="text" name="phone" id="textInput" class="form-control mb-4" placeholder="رقم الزبون">
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                  <label for="textInput">العنوان</label>
                  <input required type="text" name="address" id="textInput" class="form-control mb-4" placeholder="العنوان">
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                  <label for="textInput">اقرب نقطة دالة</label>
                  <input required type="text" name="point" id="textInput" class="form-control mb-4" placeholder="اقرب نقطة دالة">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                  <label for="textInput">سعر التوصيل</label>
                  <input required type="number" name="del_count" id="textInput" class="form-control mb-4" placeholder="سعر التوصيل">
                </div>
              </div>
                <div class="row">
                  <table class="table table-bordered" id="dynamic_field" style="border:none; ">
                      <tr  id="row0">
                        <td>
                          <input type="hidden" name="date" value="<?php echo date('yy-m-d');?>">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                            <label>المنتج </label>
                            <input required type="text" name="item[]" placeholder="اسم المنتج" class="form-control" />
                          </div>
                        </td>
                        <td>
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                            <label>السعر </label>
                            <input required type="number" name="total[]" placeholder="السعر" class="form-control" />
                          </div>
                        </td>
                        <td>
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                            <label>عدد القطع </label>
                            <input required type="text" name="count[]" placeholder="عدد القطع" class="form-control" />
                          </div>
                        </td>
                      </tr>
                    </table>
                </div>
                <div class="row">
                <div></div>
                <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6">
                  <div>
                    <button style="margin-right: 71%;margin-top: 4%;" type="button" name="add" id="add" class="btn btn-success end">Add More</button>
                  </div>
                </div>

                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4"></div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <label for="textInput">الملاحظات</label>
                  <textarea required rows="4" type="text" name="notes" id="textInput" class="form-control mb-4" placeholder="الملاحظات"></textarea>
                </div>
              <!-- </div> -->
            </div>
            <button class="btn btn-info btn-block" type="submit" name="order" style="font-size: 14pt;">اتمام الطلب</button>
        </form>
          </div>
        </div>
      </div>


<script>
$(document).ready(function(){
  var i=1;
  $('#add').click(function(){
    i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"><label>المنتج </label><input type="text" name="item[]" placeholder="اسم المنتج" class="form-control" /></div></td><td><div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" ><label>السعر </label><input type="text" name="total[]" placeholder="السعر" class="form-control" /></div></td><td><div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" ><label>عدد القطع </label><input type="text" name="count[]" placeholder="عدد القطع" class="form-control" /></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
  });

  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id");
    $('#row'+button_id+'').remove();
  });

});
</script>
@endsection