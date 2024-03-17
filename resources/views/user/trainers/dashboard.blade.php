<x-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 align="center">D A S H B O A R D</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Messages
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            {{ $messages->count() }}
                        </div>
                    </div>
            </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Messages
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            {{ $messages->count() }}
                        </div>
                    </div>
            </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Courses
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            {{ $courses->count() }}
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h5 class="card-title me-auto pt-2">MESSAGES</h5>
                        </div>

                        <div class="card-body">
                            <table style="margin-top: 15px; border-top: 1px solid rgb(220, 213, 213); width: 100%;" id="example2"
                                class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th class="py-3">NO</th>
                                        <th class="py-3">NAME</th>
                                        <th class="py-3">EMAIL</th>
                                        <th class="py-3">PHONE</th>
                                        <th class="py-3">MESSAGE</th>
                                        <th class="px-4 py-3">SEND_DATE</th>
                                        <th class="py-3">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td class="py-4">{{ $i++ }}</td>
                                            <td class="py-4">{{ $message->name }}</td>
                                            <td class="py-4">{{ $message->email }}</td>
                                            <td class="py-4">{{ $message->phone }}</td>
                                            <td class="py-4">{{ $message->message }}</td>
                                            <td class="py-4">{{ $message->created_at->diffForHumans() }}</td>
                                            <td class="d-flex justify-content-center py-3">
                                                <div class="me-4">
                                                    <a class="btn btn-primary" href="">REPLIED</a>
                                                </div>
                                                <div>
                                                    <a class="btn btn-danger remove" data-id="{{ $message->id }}" href="">REMOVE</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
    </div>

</x-layout>
