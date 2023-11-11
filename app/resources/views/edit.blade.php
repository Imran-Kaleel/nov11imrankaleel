@extends('layout.app')
@section('main')
<h5><i class="bi bi-pencil-square"></i> Edit student</h5>
<hr />
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item">Edit student</li>
    </ol>
</nav>
<div class="col-md-8">
    <form action="/student/{{$student->id}}/update" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <lable for="name" class="form-lable">Name</lable>
                <input type="text" name="name" 
                class="form-control @if($errors->has('name')) {{'is-invalid'}} @endif" 
                value="{{old('name',$student->name)}}"
                placeholder="Enter name">
                @if ($errors->has('name'))
                    <div class="invalid-feedback">{{$errors->first('name')}}</div>
                @endif
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <lable for="email" class="form-lable">Email</lable>
                <input type="email" name="email" 
                class="form-control @if($errors->has('email')) {{'is-invalid'}} @endif" 
                value="{{old('email',$student->email)}}"
                placeholder="Enter email">
                @if ($errors->has('email'))
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @endif
            </div>
            <div class="col-md-6">
                <lable for="phone" class="form-lable">Phone</lable>
                <input type="number" name="phone" value="{{old('phone',$student->phone)}}" class="form-control @if($errors->has('phone')) {{'is-invalid'}} @endif" placeholder="Enter email">
                @if ($errors->has('phone'))
                    <div class="invalid-feedback">{{$errors->first('phone')}}</div>
                @endif
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <lable for="address" class="form-lable">Address</lable>
                <textarea class="form-control @if($errors->has('address')) {{'is-invalid'}} @endif" name="address" placeholder="Enter Address" style="resize: none; height: 100px;">{{old('address',$student->address)}}</textarea>
                @if ($errors->has('address'))
                    <div class="invalid-feedback">{{$errors->first('address')}}</div>
                @endif
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <lable for="city" class="for-lable">city</lable>
                <input value="{{old('city',$student->city)}}" type="text" name="city" class="form-control @if($errors->has('city')) {{'is-invalid'}} @endif" placeholder="city">
                @if ($errors->has('city'))
                    <div class="invalid-feedback">{{$errors->first('city')}}</div>
                @endif
            </div>
            <div class="col-md-4">
                <lable for="state" class="for-lable">state</lable>
                <input value="{{old('state',$student->state)}}" type="text" name="state" class="form-control @if($errors->has('state')) {{'is-invalid'}} @endif" placeholder="state">
                @if ($errors->has('state'))
                    <div class="invalid-feedback">{{$errors->first('state')}}</div>
                @endif
            </div>
            <div class="col-md-4">
                <lable for="Country" class="for-lable">Country</lable>
                <input value="{{old('country',$student->country)}}" type="text" name="country" class="form-control @if($errors->has('country')) {{'is-invalid'}} @endif" placeholder="Country">
                @if ($errors->has('country'))
                    <div class="invalid-feedback">{{$errors->first('country')}}</div>
                @endif
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <lable for="english" class="for-lable">english</lable>
                <input value="{{old('english',$student->subject[0]->english)}}" type="text" name="english" class="form-control @if($errors->has('english')) {{'is-invalid'}} @endif" placeholder="english">
                @if ($errors->has('english'))
                    <div class="invalid-feedback">{{$errors->first('english')}}</div>
                @endif
            </div>
            <div class="col-md-4">
                <lable for="maths" class="for-lable">maths</lable>
                <input value="{{old('maths',$student->subject[0]->maths)}}" type="text" name="maths" class="form-control @if($errors->has('maths')) {{'is-invalid'}} @endif" placeholder="maths">
                @if ($errors->has('maths'))
                    <div class="invalid-feedback">{{$errors->first('maths')}}</div>
                @endif
            </div>
            <div class="col-md-4">
                <lable for="history" class="for-lable">history</lable>
                <input value="{{old('history',$student->subject[0]->history)}}" type="text" name="history" class="form-control @if($errors->has('history')) {{'is-invalid'}} @endif" placeholder="history">
                @if ($errors->has('history'))
                    <div class="invalid-feedback">{{$errors->first('history')}}</div>
                @endif
            </div>
        </div>
        <div class="my-3 float-end mb-5">
            <button type="submit" class="btn btn-primary">
                Edit student
            </button>
            <button type="reset" class="btn btn-danger">
                Clear all
            </button>
        </div>
    </form>
</div>
@endsection