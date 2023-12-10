@extends('dashboard')
@section('content')

   <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Bank Information</h4>
                   <a class="btn btn-primary" style="float:right" href="{{route('AddBankInfo')}}">Add Bank Information</a>
                </div>
                <div class="card-body">
                 
                  <table data-bs-toggle="table"
                    data-url="https://api.github.com/users/wenzhixin/repos?type=owner&amp;sort=full_name&amp;direction=asc&amp;per_page=100&amp;page=1"
                    data-sort-name="stargazers_count" data-height="280" data-mobile-responsive="true"
                    data-sort-order="desc" class="table">
                    <thead>
                      <tr>
                        <th data-field="name" data-sortable="true">Bank Name</th>
                        <th data-field="stargazers_count" data-sortable="true" data-width="100">
                          Account Title
                        </th>
                          <th data-field="stargazers_count" data-sortable="true" data-width="100">
                         Account Number
                        </th>
                         <th data-field="stargazers_count" data-sortable="true" data-width="100">
                          DepositePurpose
                        </th>
                       
                       <th data-field="forks_count" data-sortable="true" data-width="100">
                        Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($info as $info)
                      <tr>
                        <td>
                     {{$info->BankName}}
                        </td>
                     
                        <td>
                        {{$info->AccountTitle}}
                        </td>
                        <td>
                    {{$info->AccountNumber}}
                        </td>
                        <td>
                          @if($info && $info->deposite)
                            {{$info->deposite->DepositePurpose}}
                          @else
                          null
                          @endif
                                           
                        </td>
                        <td>
                          <a href="{{route('EditBankInfo',$info->id)}}" class="btn btn-primary">Edit</a>
                            
                            <a href="#" onclick="deleteEmployee({{ $info->id }})" class="btn btn-danger">Delete</a>
                            <form  id="employee-edit-action-{{ $info->id }}" action="{{ route('DeleteBankInfo',$info->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
    <script>
        function deleteEmployee(id) {
            if (confirm("Are you sure you want to delete?")) {
                document.getElementById('employee-edit-action-'+id).submit();
            }
        }
    </script>
@endsection