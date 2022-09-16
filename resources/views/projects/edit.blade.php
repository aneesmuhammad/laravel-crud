@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Project</h2>
            </div>
            
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            </strong>problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- space for update details -->


    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $project->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Age:</strong>
            <input type="number" name="age" value="{{ $project->age }}" class="form-control" placeholder="Enter Age">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gender:</strong>
            <input class="form-check-input"  type="radio" name="gender" id="inlineRadio1"  value="{{ $project->gender }}">
            <label class="form-check-label" for="inlineRadio1">male</label>
            <input class="form-check-input"  type="radio" name="gender" id="inlineRadio2" value="{{ $project->gender }}">
            <label class="form-check-label" for="inlineRadio2">female</label>   
        </div>
            <div>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <strong>blood group:</strong>
                        <select name="bgroup" set="{{ $project->bgroup }}" class="form-control" id="exampleFormControlSelect1">
                            <option> {{ $project->bgroup }}</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                            <option>o+</option>
                            <option>o-</option>
                          </select>
                </div>
            </div>
        <div class="form-group">
            <strong>Date:</strong>
            <input type="date" name="ddate" value="{{ $project->ddate }}" class="form-control" id="dob" name="dob">
        </div>
    </div>
    
     <!-- Buttons -->

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('projects.index') }}" title="back">Back</i> </a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
   
@endsection


