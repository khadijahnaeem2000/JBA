@extends('dashboard')
@section('content')

   <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Wallet</h4>
<a class="btn btn-primary" style="float:right" href="{{route('AddWallet')}}">Add Wallet</a>
                </div>
                <div class="card-body">
                 
                  <table data-bs-toggle="table"
                    data-url="https://api.github.com/users/wenzhixin/repos?type=owner&amp;sort=full_name&amp;direction=asc&amp;per_page=100&amp;page=1"
                    data-sort-name="stargazers_count" data-height="280" data-mobile-responsive="true"
                    data-sort-order="desc" class="table">
                    <thead>
                      <tr>
                        <th data-field="name" data-sortable="true">User </th>
                        <th data-field="stargazers_count" data-sortable="true" data-width="100">
                          Deposit Purpose
                        </th>
                        <th data-field="forks_count" data-sortable="true" data-width="100">
                          Amount
                        </th>
                        <th data-field="forks_count" data-sortable="true" data-width="100">
                          Status
                        </th>
                       <th data-field="forks_count" data-sortable="true" data-width="100">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($wallet as $wallet)
                      <tr>
                         @if( $wallet &&$wallet->user)
                        <td>{{$wallet->user->Name}}</td>
                        @else
                        <td>Null</td>
                        @endif
                       
                        
                      
                        @if($wallet  && $wallet->depositPurpose )
                        <td>{{$wallet->depositPurpose->DepositePurpose}}</td>
                        @else
                        <td>Null</td>
                        @endif
   

                        <td>{{$wallet->Amount}}</td>
                         <td>{{$wallet->Status}}</td>
                        <td><a href="{{route ('EditWallet',$wallet->id)}}" class="btn btn-secondary">Edit</a>
                             <a href="#" onclick="deleteEmployee({{ $wallet->id }})" class="btn btn-danger">Delete</a>
                            <form  id="employee-edit-action-{{ $wallet->id }}" action="{{ route('DeleteWallet',$wallet->id) }}" method="post">
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