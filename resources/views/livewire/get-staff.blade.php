

<div>
    <div>
        <label for="user_status">Filter Berdasarkan Status</label>
        <select wire:model.live="search" class="form-select" aria-label="Default select example" id="get-staff">
            <option value="Diterima">Diterima</option>
            <option value="Pending">Pending</option>
            <option value="Ditolak">Ditolak</option>
        </select>
    
        <div class="table-responsive mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="row">No</th>
                        <th scope="row">Nama Pegawai</th>
                        <th scope="row">Nomor Telepon Pegawai</th>
                        <th scope="row">Alamat Pegawai</th>
                        <th scope="row">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staff as $staff)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $staff->name }}</td>
                            <td>{{ $staff->user_phone }}</td>
                            <td>{{ $staff->user_address }}</td>
                            <td>
                                <a href="{{ url('/health-staff/' . $staff->user_id . '{user_id}/details') }}"
                                    class="btn btn-primary back-btn mr-2">Detail</a>
                                <a href="{{ url('/health-staff/' . $staff->user_id . '{user_id}/edit') }}"
                                    class="btn btn-success mr-2">Edit</a>
    
                                <form class="d-inline"
                                    action="{{ url('/health-staff/' . $staff->user_id . '/delete') }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mr-2" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
