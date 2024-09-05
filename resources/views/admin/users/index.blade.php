@extends('admin.layouts.app')
@section('content')

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Kullanıcılar</h1>
        <p class="mb-4">Aşağıdaki tabloda kullanıcılar listelenmektedir <a target="_blank"
                                                                       href="https://datatables.net"></a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kullanıcı Listesi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>E-Posta</th>
                            <th>Roller</th>
                            <th>Yaş</th>
                            <th>Kayıt Olma Tarihi</th>
                            <th>Yetki</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>E-Posta</th>
                            <th>Roller</th>
                            <th>Yaş</th>
                            <th>Kayıt Olma Tarihi</th>
                            <th>Yetki</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{ $role->title }}
                                @endforeach
                            </td>
                            <td>61</td>
                            <td>{{ $user->created_at->format('d-m-y') }}</td>
                            <td>$320,800</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->




@endsection
