<div>
    <label for="institution_status">Filter Berdasarkan Status</label>
    <select wire:model.live="search" class="form-select" aria-label="Default select example" id="institution_status">
        <option value="Diterima">Diterima</option>
        <option value="Pending">Pending</option>
        <option value="Ditolak">Ditolak</option>
    </select>

    <div class="table-responsive mt-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="row">No</th>
                    <th scope="row">Kode Ticket</th>
                    <th scope="row">Nama Institusi Kesehatan</th>
                    <th scope="row">Nomor Telepon Institusi Kesehatan</th>
                    <th scope="row">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($institutions as $institution)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $institution->institution_ticket_code }}</td>
                        <td>{{ $institution->institution_name }}</td>
                        <td>{{ $institution->institution_phone }}</td>
                        <td>
                            <a href="{{ url('/health-institution/' . $institution->institution_id . '/more-details') }}"
                                class="btn btn-primary back-btn mr-2">Detail</a>
                            <a href="{{ url('/health-institution/' . $institution->institution_id . '/edit') }}"
                                class="btn btn-success mr-2">Edit</a>

                            <form class="d-inline"
                                action="{{ url('/health-institution/' . $institution->institution_id . '/delete') }}"
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
