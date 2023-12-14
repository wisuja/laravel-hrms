@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'dashboard'])

@section('_content')
    <div class="container-fluid mt-2 px-4">
        <div class="row">
            <div class="col-12">
                <h4 class="font-weight-bold">Dashboard</h4>
                <hr>
            </div>
        </div>

        @if (!$checkForAttendance)
            <div class="alert alert-warning">
                <h5 class="font-weight-bold">Don't forget to check in / out !</h5>
            </div>
        @endif

        @if (auth()->user()->isAdmin())
            <div class="row">
                <div class="col-sm-12 col-lg-6 mb-3">
                    <div class="bg-light text-dark d-flex flex-column justify-content-center align-items-center py-5 card">
                        <h4>Total Employees</h4>
                        <h1>{{ $employeesCount }}</h1>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 mb-3">
                    <div class="bg-light text-dark d-flex flex-column justify-content-center align-items-center py-5 card">
                        <h4>Job Applicants</h4>
                        <h1>{{ $recruitmentCandidatesCount }}</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <div class="bg-light text-dark card p-3 scrollable">
                        <h4 class="font-weight-bold">Contract ends soon</h4>
                        <table class="table table-light table-striped table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col" class="table-dark">#</th>
                                    <th scope="col" class="table-dark">Name</th>
                                    <th scope="col" class="table-dark">Contract ends on</th>
                                    <th scope="col" class="table-dark">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($endingEmployees as $employee)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration + $endingEmployees->firstItem() - 1 }}</th>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->end_of_contract }}</td>
                                        <td><a href="{{ route('employees-data.edit', ['employee' => $employee->id]) }}"
                                                class="btn btn-outline-dark">Renew</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $endingEmployees->links() }}
                    </div>
                </div>
            </div>
            {{-- 
    <div class="row">
      <div class="col-6 mb-3">
        <div class="bg-light text-dark card p-3">
          <h4>Last 2 Days Attendances</h4>
          <div id="attendances-chart" style="height: 300px">
          </div>
        </div>
      </div>
      <div class="col-6 mb-3">
        <div class="bg-light text-dark card p-3">
          <h4>Monthly Performance</h4>
          <div id="performance-chart" style="height: 300px">
          </div>
        </div>
      </div>
    </div> --}}
        @endif

        <div class="row">
            <div class="col-12 mb-3">
                <div class="bg-light text-dark p-3 card scrollable">
                    <h3>Announcements</h3>
                    <table class="table table-light table-striped table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="table-dark">#</th>
                                <th scope="col" class="table-dark">Name</th>
                                <th scope="col" class="table-dark">Created By</th>
                                <th scope="col" class="table-dark">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $announcement)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + $announcements->firstItem() - 1 }}</th>
                                    <td><a
                                            href="{{ route('announcements.show', ['announcement' => $announcement->id]) }}">{{ $announcement->title }}</a>
                                    </td>
                                    <td>{{ $announcement->creator->name }}</td>
                                    <td>{{ $announcement->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
        const attendancesChart = new Chartisan({
            el: '#attendances-chart',
            url: "@chart('attendances_chart')",
        });

        const performanceChart = new Chartisan({
            el: '#performance-chart',
            url: "@chart('performance_chart')",
        });
    </script>
@endsection
