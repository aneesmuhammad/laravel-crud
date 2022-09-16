@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Blood Donors</h2>
            </div>
            
        </div>
        <div class="col-md-3 pull-right">
                <input class="form-control" id="search" name="search" type="search" placeholder="Search using name,gender,bloodgroup" aria-label="Search">
                
        </div>

        <div class="pull-left">
                <a class="btn btn-success" href="{{ route('projects.create') }}" title="Add new Donor">Add Donor</i>
                    </a>
                    

            </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
  
      <!-- Table for view data -->

    <tbody id="content"></tbody>

    <table class="all_data table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>age</th>
            <th>Gender</th>
            <th>Bloodgroup</th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->age }}</td>
                <td>{{ $project->gender }}</td>
                <td>{{ $project->bgroup }}</td>
                <td>{{ $project->ddate }}</td>
                <td>

                    
                     <!-- Action Buttons -->

                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">

                        

                        <a href="{{ route('projects.edit', $project->id) }}">
                            Edit</i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    
 <!-- pagination control -->



    {!! $projects->links() !!}





@endsection


 <!-- search script -->

@section('script')

<script>
    $(document).ready(function(){
     $('#search').on('keyup',function(){
         $value= $(this).val();
         if($value)
         {
            $('.all_data').hide();
            $('.searchdata').show();
         }
         else{
            $('.all_data').show();
            $('.searchdata').hide();
         }
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
         $.ajax({
            type:"GET",
            url:"{{URL::to('search')}}",
            data:{'search':$value},
            success:function(data){
                $('#content').html(data);
            }
        });
    })
});
</script>

@endsection
