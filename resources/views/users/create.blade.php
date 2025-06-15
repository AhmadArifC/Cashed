<x-layout>
    <x-slot:title>Tambah Users</x-slot:title>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name"
                                    placeholder="Masukkan Nama Users" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="text" class="form-control" id="email" placeholder="Masukkan Email"
                                    name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label></label>
                                <input type="text" class="form-control" id="password"
                                    placeholder="Masukkan Password" name="password">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layout>
