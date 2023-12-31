@extends('dashboard')
@section('content')

   <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Order</h4>
                </div>
                <div class="card-body">
                 
                  <table data-bs-toggle="table"
                    data-url="https://api.github.com/users/wenzhixin/repos?type=owner&amp;sort=full_name&amp;direction=asc&amp;per_page=100&amp;page=1"
                    data-sort-name="stargazers_count" data-height="280" data-mobile-responsive="true"
                    data-sort-order="desc" class="table">
                    <thead>
                      <tr>
                       
                        <th data-field="stargazers_count" data-sortable="true" data-width="100">
                        Order Name
                        </th>
                        <th data-field="forks_count" data-sortable="true" data-width="100">
                        Quantity
                        </th>
                        <th data-field="forks_count" data-sortable="true" data-width="100">
                        Total Price
                        </th>
                          <th data-field="forks_count" data-sortable="true" data-width="100">
                        Tracking Number
                        </th>
                         <th data-field="forks_count" data-sortable="true" data-width="100">
                        Order Type
                        </th>
                         <th data-field="forks_count" data-sortable="true" data-width="100">
                        IsActive
                        </th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>

@endsection