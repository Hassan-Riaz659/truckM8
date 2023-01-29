@extends('layouts.admin.master')
<!-- END: Head-->

<!-- BEGIN: Body-->
@section('title') Create Load @endsection

@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- fitness target -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="table">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">First</th>
								      <th scope="col">Last</th>
								      <th scope="col">Handle</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <th scope="row">1</th>
								      <td>Mark</td>
								      <td>Otto</td>
								      <td>@mdo</td>
								    </tr>
								    <tr>
								      <th scope="row">2</th>
								      <td>Jacob</td>
								      <td>Thornton</td>
								      <td>@fat</td>
								    </tr>
								    <tr>
								      <th scope="row">3</th>
								      <td>Larry</td>
								      <td>the Bird</td>
								      <td>@twitter</td>
								    </tr>
								  </tbody>
								</table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection